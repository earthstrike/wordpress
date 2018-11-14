<?php
add_filter('dbmo_et_pb_slide_whitelisted_fields', 'dbmo_et_pb_slide_register_fields');
add_filter('dbmo_et_pb_slide_fields', 'dbmo_et_pb_slide_add_fields');
add_filter('db_pb_slide_content', 'db_pb_slide_filter_content', 10, 2);
add_action('wp_head', 'db_pb_slide_css');

function dbmo_et_pb_slide_register_fields($fields) {
	$fields[] = 'button_text_2';
	$fields[] = 'button_link_2';
	$fields[] = 'db_background_url';
	return $fields;
}

function dbmo_et_pb_slide_add_fields($fields) {
	
	$new_fields = array(); 
	
	foreach($fields as $k=>$v) {
		$new_fields[$k] = $v;
		
		// Add second button text option
		if ($k === 'button_text') { 
			$new_fields['button_text_2'] = array(
				'label' => 'Button #2 Text',
				'type' => 'text',
				'option_category' => 'basic_option',
				'description' => 'Define the text for the second slide button. '.divibooster_module_options_credit(),
				'default' => '',
				'toggle_slug'=>'main_content'
			);
		}
		
		// Add second button link option
		if ($k === 'button_link') {
			$new_fields['button_link_2'] = array(
				'label' => db_divi_version('3.16', '>=')?'Button #2 Link URL':'Button #2 URL',
				'type' => 'text',
				'option_category' => 'basic_option',
				'description' => 'Input a destination URL for the second slide button. '.divibooster_module_options_credit(),
				'default' => '#',
				'toggle_slug'=>db_divi_version('3.16', '>=')?'link_options':'link', //'link'
			);
		}
		
	}
	
	// Add background link URL option
	$new_fields['db_background_url'] = array(
		'label' => 'Background Link URL',
		'type' => 'text',
		'option_category' => 'basic_option',
		'description' => 'Input a destination URL for clicks on the slide background. '.divibooster_module_options_credit(),
		'default' => '',
		'toggle_slug'=>'background'
	);
	
	return $new_fields;
}

// Tidy up URLs (adding http if missing, etc)
function db_canonicalize_url($url) {
	
	// If scheme missing, add http
	if (!parse_url($url, PHP_URL_SCHEME) && // No scheme
		!in_array(substr($url, 0, 1), array('#', '/')) // Not hash or root / protocol relative
	) {
		$url = 'http://'.$url;
	}
	
	return $url;
}

// Process slide options
function db_pb_slide_filter_content($content, $args) {
	
	$args = wp_parse_args($args, array(
		'button_text_2' => '',
		'button_link_2' => '#'
	));

	// Add second button to slide
	$button_2_text = $args['button_text_2'];
	
	if ($button_2_text !== '') {
		
		$url = db_canonicalize_url($args['button_link_2']);
		
		// Add button - old Divi markup
		$content = preg_replace(
			'#(<a href=".*?" class="(et_pb_more_button[^"]+et_pb_button[^"]*)">.*?</a>)#', 
			'\\1<a href="'.esc_attr($url).'" class="\\2 db_pb_button_2">'.esc_html($button_2_text).'</a>', 
			$content); 
			
		// Add button - new Divi markup	
		$content = preg_replace(
			'#(<a class="(et_pb_button[^"]+et_pb_more_button[^"]*)" href=".*?">.*?</a>)#', 
			'\\1<a class="\\2 db_pb_button_2" href="'.esc_attr($url).'">'.esc_html($button_2_text).'</a>',
			$content); 
	}
	
	// Make slide background clickable link
	if (!empty($args['db_background_url'])) {
		 
		$url = db_canonicalize_url($args['db_background_url']);
		
		// Add jquery to make correct slide clickable
		preg_match('#div class="et_pb_slide\b[^"]*?\b(et_pb_slide_\d+)\b#', $content, $m);

		if (!empty($m[1])) {
			
			$slide = esc_html($m[1]);
			$url = esc_attr($url);
			$content.=<<<END
<script>
jQuery(function($){
	$(".$slide").click(function(){
		var url = "$url";
		if (url.indexOf('#') == 0 || url.indexOf('.') == 0) {
			et_pb_smooth_scroll($(url), false, 800);
		} else {
			document.location=url;
		}
	});
});
</script>
<style>.$slide:hover{cursor:pointer;}</style>
END;
		}
	
	}
	
	return $content;
}


function db_pb_slide_css() { ?><style>#et_builder_outer_content .db_pb_button_2,.db_pb_button_2{margin-left:30px}</style><?php }
