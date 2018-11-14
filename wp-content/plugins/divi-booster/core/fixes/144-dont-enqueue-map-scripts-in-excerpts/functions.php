<?php 
if (!defined('ABSPATH')) { exit(); } // No direct access

add_action('loop_start', 'db144_loop_start');
add_action('loop_end', 'db144_loop_end', 100);

// Suppress google map script loading by map modules
function db144_loop_start($query) {
	if (db144_map_modules_in_excerpts($query)) { 
		add_filter('et_pb_enqueue_google_maps_script', 'db144_return_false');
	}
}

// Re-enable map script loading once loop done
function db144_loop_end($query) {
	if (db144_map_modules_in_excerpts($query)) { 
		remove_filter('et_pb_enqueue_google_maps_script', 'db144_return_false');
	}
}

function db144_map_modules_in_excerpts($query) {
	
	// Don't affect admin
	if (is_admin()) { return false; }
	
	// Don't affect visual builder
	if (!function_exists('et_core_is_fb_enabled') || et_core_is_fb_enabled()) { return false; }
	
	// Don't affect single posts
	if (is_singular()) { return false; }
	
	// Don't affect secondary queries
	if (!$query->is_main_query()) { return false; }
	
	// Don't affect Divi > Theme Options > General > Blog Style Mode, which shows full post content in loop
	if (!function_exists('et_get_option') || et_get_option('divi_blog_style', 'false') === 'on') { return false; }
	
	return true;
}

function db144_return_false() { return false; }
