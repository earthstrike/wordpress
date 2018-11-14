<?php 

// Hook - visual builder <head> tag
function db_vb_head() {
	if (function_exists('et_fb_enabled') && et_fb_enabled()) {
		do_action('db_vb_head');
	}
}
add_action('wp_head', 'db_vb_head');