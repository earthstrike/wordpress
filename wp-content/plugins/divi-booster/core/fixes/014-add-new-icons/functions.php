<?php 
if (!defined('ABSPATH')) { exit(); } // No direct access

// === Feature === 

function wtfdivi014_register_icons($icons) {
	global $wtfdivi;
	list($name, $option) = $wtfdivi->get_setting_bases(__FILE__);
	if (!isset($option['urlmax'])) { $option['urlmax']=0; }
	for($i=0; $i<=$option['urlmax']; $i++) {
		if (!empty($option["url$i"])) {
			$icons[] = "wtfdivi014-url$i";
		}
	}
	return $icons;
}
// Register the icons
// - Added with priority of 50 so added after Divi Icon King which would drop them otherwise
add_filter('et_pb_font_icon_symbols', 'wtfdivi014_register_icons', 50); 

// add admin CSS
function wtfdivi014_admin_css() { 
	global $wtfdivi;
	list($name, $option) = $wtfdivi->get_setting_bases(__FILE__);
	if (!isset($option['urlmax'])) { $option['urlmax']=0; }
	for($i=0; $i<=$option['urlmax']; $i++) {
		if (!empty($option["url$i"])) { ?>
			[data-icon="wtfdivi014-url<?php echo $i; ?>"]::before { background: url('<?php echo htmlentities(@$option["url$i"]); ?>') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover;-o-background-size: cover;background-size:cover; content:'a' !important; width:16px !important; height:16px !important; color:rgba(0,0,0,0) !important; }
		<?php 
		}
	} 
}
add_action('db_admin_css', 'wtfdivi014_admin_css');

// add visual buider settings css
function wtfdivi014_visual_builder_css() { 
	global $wtfdivi;
	list($name, $option) = $wtfdivi->get_setting_bases(__FILE__);
	if (!isset($option['urlmax'])) { $option['urlmax']=0; }
	for($i=0; $i<=$option['urlmax']; $i++) {
		if (!empty($option["url$i"])) { ?>
			.et-fb-font-icon-list li[data-icon="wtfdivi014-url<?php echo $i; ?>"]:after { background: url('<?php echo htmlentities(@$option["url$i"]); ?>') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover;-o-background-size: cover;background-size:cover; content:'a' !important; width:16px !important; height:16px !important; color:rgba(0,0,0,0) !important; }
		<?php 
		}
	}
}
add_action('db_vb_css', 'wtfdivi014_visual_builder_css');

function db014_user_css($plugin) { 
	list($name, $option) = $plugin->get_setting_bases(__FILE__);
	if (!isset($option['urlmax'])) { $option['urlmax']=0; }
	for($i=0; $i<=$option['urlmax']; $i++) {
		if (!empty($option["url$i"])) { ?>
			
			.et_pb_custom_button_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"]:before, 
			.et_pb_custom_button_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"]:after { 
				background-image: url('<?php echo htmlentities(@$option["url$i"]); ?>') !important; 
				background-size: auto 1em;
				background-repeat: no-repeat;
				min-width: 20em;
				height: 100%;
				content: "" !important;
				background-position: left center;
				position: absolute;
				top: 0;
			}
			.et_pb_custom_button_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"] { 
				overflow: hidden;
			}
			.et_pb_posts .et_pb_inline_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"]:before,
			.et_pb_portfolio_item .et_pb_inline_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"]:before {
				content: '' !important;
				-webkit-transition: all 0.4s;
				-moz-transition: all 0.4s;
				transition: all 0.4s;
			}
			.et_pb_posts .entry-featured-image-url:hover .et_pb_inline_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"] img,
			.et_pb_portfolio_item .et_portfolio_image:hover .et_pb_inline_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"] img { 
				margin-top:0px; transition: all 0.4s;
			}
			.et_pb_posts .entry-featured-image-url .et_pb_inline_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"] img, 
			.et_pb_portfolio_item .et_portfolio_image .et_pb_inline_icon[data-icon="wtfdivi014-url<?php echo $i; ?>"] img { 
				margin-top: 14px; 
			}
	
		<?php
		} 
	} 
	?>

	.db014_custom_hover_icon { 
		width:auto !important; max-width:32px !important; min-width:0 !important;
		height:auto !important; max-height:32px !important; min-height:0 !important;
		position:absolute;
		top:50%;
		left:50%;
		-webkit-transform: translate(-50%,-50%); -moz-transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%); transform: translate(-50%,-50%); 
	}
	
	/* Hide extra icons */
	.et_pb_gallery .et_pb_gallery_image .et_pb_inline_icon[data-icon^="wtfdivi014"]:before,
	.et_pb_blog_grid .et_pb_inline_icon[data-icon^="wtfdivi014"]:before,
	.et_pb_image .et_pb_image_wrap .et_pb_inline_icon[data-icon^="wtfdivi014"]:before	{ 
		display:none; 
	}
<?php 
}
add_action('wp_head.css', 'db014_user_css');


function db014_user_js() { 
	global $wtfdivi;
	list($name, $option) = $wtfdivi->get_setting_bases(__FILE__);
	?>
	
	function db014_update_icons() { 
		<?php
		if (!isset($option['urlmax'])) { $option['urlmax']=0; }
		for($i=0; $i<=$option['urlmax']; $i++) {
			if (!empty($option["url$i"])) { ?>
				$('.et-pb-icon').filter(function(){ return $(this).text() == 'wtfdivi014-url<?php echo $i; ?>'; }).toggleClass('db-custom-icon', true).html('<img src="<?php esc_html_e(@$option["url$i"]); ?>"/>');
				$('.et_pb_inline_icon').filter(function(){ return $(this).attr('data-icon') == 'wtfdivi014-url<?php echo $i; ?>'; }).toggleClass('db-custom-icon', true).html('<img class="db014_custom_hover_icon" src="<?php esc_html_e(@$option["url$i"]); ?>"/>');
			<?php } else { ?>
				$('.et-pb-icon').filter(function(){ return $(this).text() == 'wtfdivi014-url<?php echo $i; ?>'; }).toggleClass('db-custom-icon', true).hide();
				$('.et_pb_inline_icon').filter(function(){ return $(this).attr('data-icon') == 'wtfdivi014-url<?php echo $i; ?>'; }).toggleClass('db-custom-icon', true).hide();
			<?php
			}
		} 
		?>
	}

	db014_update_icons();
<?php 
}
add_action('db_user_jquery', 'db014_user_js');

function db014_visual_builder_js_admin() { ?>
	
	$(document).on('db_vb_builder_data_retrieved', db014_update_icons);
	
	// Handle option updates
	$(document).on('mouseup', '.et-fb-option--et-font_icon_select li, .et-fb-option--yes-no_button, .et-fb-modal__footer button', function() {
		setTimeout(db014_update_icons, 100);
	});
	
	// Handle module re-ordering
	$(document).on('dragend', '.et-pb-module', function() {
		setTimeout(db014_update_icons, 100);
	});
	
<?php 
}
add_action('db_vb_jquery', 'db014_visual_builder_js_admin');

/* === Divi Icon King compatibility === */

add_action('db_admin_jquery', 'wtfdivi014_add_divi_icon_king_filter_link');
add_action('db_vb_jquery', 'wtfdivi014_add_divi_icon_king_filter_link');

function wtfdivi014_add_divi_icon_king_filter_link() {
	?>
	// Add filter link if Divi Icon King used
	$(document).on( 'click', '.dikg_icon_filter__btn', function() {
		$('[data-icon^=wtfdivi]').attr('data-family', 'divi-booster').removeClass('gtm-divi-king-icon--elegant-themes').toggleClass('gtm-divi-king-icon--divi-booster', true);
		if ($('.dikg_icon_filter__control_option[data-value=divi-booster]').length === 0) {
			$('.dikg_icon_filter__control_option[data-value=elegant-themes]').after($('<span class="dikg_icon_filter__control_option dikg_icon_filter__control_option--inactive dikg_icon_filter__control_family dikg_icon_filter__control_option--active" data-value="divi-booster">Divi Booster</span>'));
		}
	});
	<?php
}
