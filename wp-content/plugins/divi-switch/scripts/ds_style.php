<?php

function ds_customizer_css(){ 

$ds_color_dark = get_option('ds_default_color_dark','#303030');
$ds_color_light = get_option('ds_default_color_light','#F1F1F1');
$ds_color_blue = get_option('ds_default_color_blue','#247BA0');
$ds_color_red = get_option('ds_default_color_red','#EF233C');
$ds_color_yellow = get_option('ds_default_color_yellow','#FF8500');
$ds_color_green = get_option('ds_default_color_green','#9BC53D');
$ds_header_bg = get_option('ds_header_bg');
$ds_footer_bg = get_option('ds_footer_bg'); 
$ds_replace_close = get_option('ds_rep_close'); 
$ds_replace_menu = get_option('ds_rep_menu'); 
?>
<style id="divi-switch">

/* ------------------ Customizer CSS Settings -------------- */

#main-header { background-image: url('<?php echo $ds_header_bg; ?>') ; }

#main-footer { background-image: url('<?php echo $ds_footer_bg; ?>') ; }

.ds_mobile_side_light .mobile_nav.opened .mobile_menu_bar:before { content: "\4d"; color: <?php echo $ds_color_dark; ?>; }

.ds_mobile_side_light .et_mobile_menu li a { color: <?php echo $ds_color_dark; ?>; }

.ds_mobile_side_dark .mobile_nav.opened #mobile_menu { transform: rotateY(0deg); -webkit-transform: rotateY(0deg); transform-origin: right; -webkit-transform-origin: right; background: <?php echo $ds_color_dark; ?>; transition: .8s ease-in-out; }

.ds_flat_buttons .button-dark a { background: <?php echo $ds_color_dark; ?>; padding: 10px 14px !important; border-radius: 4px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; }

/** MENU BUTTONS FLAT **/

.ds_flat_buttons .button-light a { background: <?php echo $ds_color_light; ?>; padding: 10px 14px !important; border-radius: 4px; margin-top: -10px; color: <?php echo $ds_color_dark; ?>; }

.ds_flat_buttons .button-blue a { background: <?php echo $ds_color_blue; ?>; padding: 10px 14px !important; border-radius: 4px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; }

.ds_flat_buttons .button-yellow a { background: <?php echo $ds_color_yellow; ?>; padding: 10px 14px !important; border-radius: 4px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; }

.ds_flat_buttons .button-red a { background: <?php echo $ds_color_red; ?>; padding: 10px 14px !important; border-radius: 4px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; }

.ds_flat_buttons .button-green a { background: <?php echo $ds_color_green; ?>; padding: 10px 14px !important; border-radius: 4px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; }

/** MENU BUTTONS 3D **/
.ds_3d_buttons .button-dark-3d a { background: <?php echo $ds_color_dark; ?>; padding: 10px 14px !important; border-radius: 2px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; border-bottom: 3px solid rgba(0, 0, 0, 0.2) }

.ds_3d_buttons .button-light-3d a { background: <?php echo $ds_color_light; ?>; padding: 10px 14px !important; border-radius: 2px; margin-top: -10px; color: <?php echo $ds_color_dark; ?>; border-bottom: 3px solid rgba(0, 0, 0, 0.2) }

.ds_3d_buttons .button-blue-3d a { background: <?php echo $ds_color_blue; ?>; padding: 10px 14px !important; border-radius: 2px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; border-bottom: 3px solid rgba(0, 0, 0, 0.2) }

.ds_3d_buttons .button-yellow-3d a { background: <?php echo $ds_color_yellow; ?>; padding: 10px 14px !important; border-radius: 2px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; border-bottom: 3px solid rgba(0, 0, 0, 0.2) }

.ds_3d_buttons .button-red-3d a { background: <?php echo $ds_color_red; ?>; padding: 10px 14px !important; border-radius: 2px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; border-bottom: 3px solid rgba(0, 0, 0, 0.2) }

.ds_3d_buttons .button-green-3d a { background: <?php echo $ds_color_green; ?>; padding: 10px 14px !important; border-radius: 2px; margin-top: -10px; color: <?php echo $ds_color_light; ?>; border-bottom: 3px solid rgba(0, 0, 0, 0.2) }

/** TURN PRE TEXT INTO A CODE BOX **/
.ds_pretext_code .entry-content pre { background: <?php echo $ds_color_dark; ?>; color: <?php echo $ds_color_light; ?>; padding: 10px 16px; border-radius: 2px; border-top: 4px solid #ffa900; -moz-box-shadow: inset 0 0 10px #000000; box-shadow: inset 0 0 10px #000000; }

/** 'MENU' instead of burger **/

.ds_menu_word_replace .mobile_menu_bar:before { font-family: "Open Sans" !important; content: "CLOSE"; font-size: 1.1em; color: <?php echo $ds_color_dark; ?>;
border: solid 2px <?php echo $ds_color_dark; ?>; padding: 4px 10px; border-radius: 3px; font-weight: 600; }

.ds_select_page_light .mobile_menu_bar:after { position: absolute; content: "Select page"; text-align: left; width: 100%; left: 10px; top: 15px; 
color: <?php echo $ds_color_dark; ?>; }

.ds_select_page_light .mobile_menu_bar:before { color: <?php echo $ds_color_dark; ?> !important; }

/** Select Page Styles ** dark **/

.ds_select_page_dark .mobile_menu_bar { background: <?php echo $ds_color_dark; ?>; padding-bottom: 0px !important; padding-left: 120px;
border-radius: 4px; margin-bottom: 18px; }

/********************************** PRELOADERS  **************************/

/** Dark **/

.home.load-dark:before { display: block; content: ""; position: fixed; top: 0; left: 0; right: 0; bottom: 0; align-content: center; text-align: center; 
background: <?php echo $ds_color_dark; ?>; line-height: 100%; -webkit-animation: curtain 3.5s forwards; animation: curtain 3.5s forwards; }

.home.load-dark:after { font-family: "etModules"; font-size: 3.4em; content: "\e02d"; position: fixed;
color: <?php echo $ds_color_light; ?>; text-align: center; left: 50%; margin-left: -50px; width: 100px; top: 45%;
    -webkit-animation: wheel 3s forwards; animation: wheel 3s forwards; }

/**light**/

.home.load-light:before { display: block; content: ""; position: fixed; top: 0; left: 0; right: 0; bottom: 0; align-content: center; text-align: center;
background: <?php echo $ds_color_light; ?>; line-height: 100%; -webkit-animation: curtain 3.5s forwards; animation: curtain 3.5s forwards; }

.home.load-light:after { font-family: "etModules"; font-size: 3.4em; content: "\e02d"; position: fixed;
color: <?php echo $ds_color_dark; ?>; text-align: center; left: 50%; margin-left: -50px; width: 100px; top: 45%; -webkit-animation: wheel 3s forwards;
animation: wheel 3s forwards; }

.ds-material-button .et_pb_scroll_top.et-pb-icon {
    bottom: 30px;
    right: 30px;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    padding-top: 8px;
    -webkit-box-shadow: 0px 0px 30px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 30px -6px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 30px -6px rgba(0,0,0,0.75);
    transition: .5s ease all;
    background: <?php echo $ds_color_dark; ?>;
}

.ds_mobile_side_light .mobile_nav.opened #mobile_menu { transform: rotateY(0deg); -webkit-transform: rotateY(0deg); transform-origin: right; -webkit-transform-origin: right; background: <?php echo $ds_color_light; ?>; transition: .8s ease-in-out; }

.ds_mobile_side_dark .mobile_nav.opened .mobile_menu_bar:before { content: "M"; color: <?php echo $ds_color_light; ?>; }

.ds_mobile_side_dark .et_mobile_menu li a { color: <?php echo $ds_color_light; ?>; }

.ds_select_page_light .mobile_menu_bar {
    background: <?php echo $ds_color_light; ?>;
    padding-bottom: 0px !important;
    padding-left: 120px;
    border-radius: 4px;
    margin-bottom: 18px;
}

/** 'MENU' infront of burger **/
.ds_menu_word .mobile_menu_bar:after { content: "<?php echo $ds_replace_menu; ?>"; font-size: 1.2em; position: absolute; right: 32px; top: 15px; }

.ds_menu_word_replace .mobile_nav.closed .mobile_menu_bar:before { content: "<?php echo $ds_replace_menu; ?>"; }

.ds_menu_word_replace .mobile_nav.opened .mobile_menu_bar:before { content: "<?php echo $ds_replace_close; ?>"; }

</style>
<?php
}

add_action( 'wp_head', 'ds_customizer_css' );