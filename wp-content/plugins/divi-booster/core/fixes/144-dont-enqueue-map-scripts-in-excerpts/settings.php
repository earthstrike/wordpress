<?php 
if (!defined('ABSPATH')) { exit(); } // No direct access

function db144_add_setting($plugin) {  
	$plugin->setting_start(); 
	$plugin->techlink('https://divibooster.com/divi-speedup-stop-map-module-excerpts-loading-google-maps-scripts/'); 
	$plugin->checkbox(__FILE__); ?> Stop map module excerpts from unnecessarily loading maps scripts<?php
	$plugin->setting_end(); 
} 
$wtfdivi->add_setting('general-speed', 'db144_add_setting');

