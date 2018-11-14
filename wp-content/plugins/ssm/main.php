<?php
/*
Plugin Name: Section Styles Manager PRO
Plugin URI: https://www.boltthemes.com/product/divi-section-style-manager/
Description: Section styles for the divi theme
Author: Bolt Themes
Version: 2.4.6
Author URI: https://www.boltthemes.com/
*/
require plugin_dir_path( __FILE__ ) .  '/update/update-checker.php';
$MyUpdateChecker = PucFactory::buildUpdateChecker(
    'https://boltthemes.com/updates/?action=get_metadata&slug=ssmpro',
    __FILE__, 
    'ssmpro'
);
require plugin_dir_path( __FILE__ ) . 'includes/customizer.php';
require plugin_dir_path( __FILE__ ) . 'includes/customizecss.php';

add_action( 'admin_menu', 'ssm_pro_menu' );

function ssm_pro_menu() {
	add_theme_page( 'Section Style Manager', 'Section Style Manager', 'manage_options', 'editor.php', 'ssmadmin'); 
}
function ssmadmin(){
	include "editor.php";
}

function BTSSM_css_and_js() {

	// Front end CSS
    wp_enqueue_style('front-end-css', plugin_dir_url( __FILE__ ) . 'includes/css/frontend.css');

    // Front end JS
    wp_register_script('front-end-js', plugin_dir_url( __FILE__ ) . 'includes/js/frontend.js');

}

function BTSSM_admin_css() {

    // Back End CSS
    wp_enqueue_style('back-end-css', plugin_dir_url( __FILE__ ) . 'includes/css/backend.css');
    wp_register_script('back-end-js', plugin_dir_url( __FILE__ ) . 'includes/js/backend.js');
     wp_register_script('back-end-js2', plugin_dir_url( __FILE__ ) . 'clipboard.min.js');

}

add_action( 'wp_enqueue_scripts', 'BTSSM_css_and_js' ); // Front End Assets
add_action('admin_enqueue_scripts', 'BTSSM_admin_css'); // Admin Assets  