<?php 
if (!defined('ABSPATH')) { exit(); } // No direct access

function db004_add_setting($plugin) {  
	$plugin->setting_start(); 
	$plugin->techlink('https://divibooster.com/add-a-full-width-image-above-the-divi-header/'); 
	$plugin->checkbox(__FILE__); ?> Add image before header: <?php $plugin->imagepicker(__FILE__, 'url'); ?>
	<div style="margin-left: 50px">Link to URL: <?php $plugin->textpicker(__FILE__, 'linkurl'); ?></div>
	<?php
	$plugin->setting_end(); 
} 
$wtfdivi->add_setting('general-layout', 'db004_add_setting');
