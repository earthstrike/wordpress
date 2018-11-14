<?php
 /*
 ** Plugin Name: Divi Switch
 ** Version: 2.3.0
 ** Plugin URI: https://www.divi.space
 ** Description: Hundreds of Divi Modifications at the flick of a switch. 
 ** Author: Gritty
 ** Author URI: http://gritty-social.com
 */

define( 'SWITCH_URL', plugin_dir_url( __FILE__ ) );
 
function ds_plugin_styles() { 
    wp_enqueue_style( 'styles', SWITCH_URL . 'scripts/switch-style.css' ); // Switch Styles
    wp_enqueue_script( 'ds-jquery', SWITCH_URL . 'scripts/ds_snippets.js', array( 'jquery' ), '1.0.0', true ); // jQuery
}

function ds_plugin_admin_styles() { 
    wp_enqueue_style('admin_css', SWITCH_URL . 'scripts/plugin_admin.css'); 
}

require ( 'scripts/ds_style.php' ); // Variable CSS
require ( 'register-switches.php' ); // Switch Array
require ( 'plugin-updates/plugin-update-checker.php' ); // Update Script

$secret=base64_decode('dXBkYXRhYmxlL2I3YmZnaGJmYnJvMzRoYjk4ZmcvZGl2aS1zd2l0Y2gtcGx1Z2lu'); // Find Updates

// Create Switch Array ------------------------------------------------------------------------------------

if ( isset($_POST[MD5("DiviSwitch")]) ) {
    foreach ( $_POST as $key => $val ) {
        if ( preg_match("/^(0|1)$/", $val ) ) SS($key, $val);
        exit(1);
    }
}

function SS($key, $val) { update_option( "ds_{$key}", $val ); }
function GS($key, $default = false) { return get_option( "ds_{$key}", $default); }
function ds_admin_head_scripts() {   
?>
<script type="text/javascript" id="Gritty_WidgetLinks">

(function($) {
    $(function() {
        $("LABEL[for^=myonoffswitch]")
        .each(function() {
            // ------------------------------ Which label was clicked? -----------------------------------
            var which = $(this).attr("for");
            var cls = $(this).data("class");
            if ( $("INPUT[id=" + which + "]").is(":checked") ) {
                $("BODY").addClass(cls);
            } else {
                $("BODY").removeClass(cls);
            }

            $(this).parents(".onoffswitch").on("click", function() {
                if (!$("INPUT[id=" + which + "]").is(":checked")) {
                    $("BODY").addClass(cls);
                } else {
                    $("BODY").removeClass(cls);
                }

                var val = $("INPUT[id=" + which + "]").is(":checked") ? "1" : "0";
                console.info("Set " + which + " to " + val)

                $.ajax({
                    url: './',
                    type: "POST",
                    data: $("INPUT[id=" + which + "]").attr("name") + "=" + val + "&<?php echo MD5("DiviSwitch");?>=1", //Hat tip to Terry @ https://www.facebook.com/mizagorn/ for fixing the save state issue.
                    success: function (response) {
                    },
                    error: function (jqXhr, e, responseText) {
                        console.log(arguments);
                        alert("Oops. Something went wrong: " + responseText);
                    }
                });
            });
        });
    });
})(jQuery);
</script>
<?php
}

// End Create Switch Array ------------------------------------------------------------------------------------

$SwitchUpdateChecker = PucFactory::buildUpdateChecker('https://divi.space/'.$secret.'.json',__FILE__);

// Settings Menu Item -----------------------------------------------------------------------------------------

function ds_admin_bar_button($admin_bar){
    if ( current_user_can( 'manage_options' ) ) {

        $admin_bar->add_menu( array(
        'id'    => 'dswitch',
        'title' => 'Divi Switch',
        'href'  => '/wp-admin/admin.php?page=divi-switch-settings',
        'meta'  => array('title' => __('Divi Switch'),           
        ),
        ));
    }
}

class divi_switch_settings {

    public function __construct () { add_action('admin_menu', array(&$this, 'ds_admin_menu')); }

    function ds_admin_menu() {

    $page = add_submenu_page('admin.php', 'Divi Switch', 'Divi Switch', 'manage_options', 'divi-switch-settings', array(&$this, 'switch_page'));

    add_submenu_page(
        'et_divi_options',
    __( 'Divi Switch', 'Divi' ), 
    __( 'Divi Switch', 'Divi' ),
        'manage_options', 
        'admin.php?page=divi-switch-settings', 
        'divi-switch-settings');
}

// Switch Settings Page ------------------------------------------------------------------

function switch_page() { 

if( isset( $_GET[ 'tab' ] ) ) {

$active_tab = $_GET[ 'tab' ];

} else {

// Default Tab = Header Options ----------------------------------------------------------

$active_tab = 'header_options' ;

} ?>

<div class="btt-button"><a href="#top">^</a></div>
<div class="switch-page">
    <div class="switch-title">
       <h1>Divi Switch 2.2</h1>
       <span class="customizer-link"><a href="<?php echo admin_url( 'customize.php?autofocus[panel]=divi_switch_options' ); ?>">Switch Customizer</a></span>
    </div>
    <h2 class="nav-tab-wrapper">
        <a href="?page=divi-switch-settings&tab=header_options" class="nav-tab <?php echo $active_tab == 'header_options' ? 'nav-tab-active' : ''; ?>">Header</a>
        <a href="?page=divi-switch-settings&tab=footer_options" class="nav-tab <?php echo $active_tab == 'footer_options' ? 'nav-tab-active' : ''; ?>">Footer</a>
        <a href="?page=divi-switch-settings&tab=main_options" class="nav-tab <?php echo $active_tab == 'main_options' ? 'nav-tab-active' : ''; ?>">Main Content</a>
        <a href="?page=divi-switch-settings&tab=transition_options" class="nav-tab <?php echo $active_tab == 'transition_options' ? 'nav-tab-active' : ''; ?>">Transitions & Filters</a>
        <a href="?page=divi-switch-settings&tab=mobile_options" class="nav-tab <?php echo $active_tab == 'mobile_options' ? 'nav-tab-active' : ''; ?>">Mobile</a>
    </h2>
    <div class="page-container">
    <?php
    // Switch Matrix -----------------------------------------------------------
    global $dsmatrix;
    for ( $i = 0; $i < count($dsmatrix); $i++ ) {
        $obj = $dsmatrix[$i];
        $n = ($i+1);
        $opt = isset($obj['option'])?$obj['option']:"unknown_{$n}";
    ?>
    <script>
    // Toggle Descriptions -----------------------------------------------------
    jQuery(document).ready(function($){
        $("#switch-box-<?php echo $n;?> .ds-open-info").click(function(){
        $("#switch-box-<?php echo $n;?> .ds-description").toggleClass("visible");
        });
        $("#switch-box-<?php echo $n;?> .ds-open-info").click(function(){
        $("#switch-box-<?php echo $n;?> .ds-open-info").toggleClass("open");
        });
    });
    </script>
    <style>
    .ds-description { max-height: 0; opacity: 0; }
    .ds-description.visible { max-height: none; opacity: 1; }
    .ds-open-info { cursor: pointer; }
    </style>
    <div class="divi-switch" id="switch-box-<?php echo $n;?>">
        <div class="image-container">
            <img src="<?php echo plugins_url( isset($obj['image'])?$obj['image']:"images/placeholder.png", __FILE__ ) ?>" >
        </div>
        <div class="title-area">
            <h3><?php echo isset($obj['title'])?$obj['title']:"Unkown";?></h3>
            <p><?php echo isset($obj['more'])?$obj['more']:"No code selected";?></p>
        </div>
        <div class="onoffswitch">
            <input type="checkbox" name="<?php echo $opt;?>" class="onoffswitch-checkbox" id="myonoffswitch-<?php echo $n;?>" value="true"<?php echo (GS($opt, '0') == '0' ? "" : " checked='checked'");?> /> 
            <label class="onoffswitch-label" for="myonoffswitch-<?php echo $n;?>" data-class="<?php echo $obj['class'];?>">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>
        <span class="more-button ds-open-info"></span>
        <div class="ds-description info-container">
          <p><?php echo isset($obj['description'])?$obj['description']:"No description";?></p>
        </div>
    </div>

<?php
}
?>
</div>
</div>
    
<style type="text/css">

/** Splitting Switches into tabs **/

.divi-switch { display: none; } 

<?php if( $active_tab == 'header_options' ) {?>

#switch-box-1, #switch-box-2, #switch-box-3, #switch-box-5, #switch-box-6, #switch-box-7, #switch-box-8, #switch-box-9, #switch-box-10,
#switch-box-11, #switch-box-63, #switch-box-64 { display: block; }

<?php } else if( $active_tab == 'footer_options' ) {?>

#switch-box-20, #switch-box-21, #switch-box-22 { display: block; }

<?php } else if( $active_tab == 'main_options' ) {?>

#switch-box-34, #switch-box-57, #switch-box-58, #switch-box-59, #switch-box-60, #switch-box-61, #switch-box-65, #switch-box-66,
#switch-box-23, #switch-box-24, #switch-box-25, #switch-box-26, #switch-box-27, #switch-box-28, #switch-box-29, #switch-box-30,
#switch-box-32, #switch-box-33, #switch-box-34, #switch-box-35, #switch-box-36, #switch-box-37, #switch-box-38, #switch-box-39,
#switch-box-40, #switch-box-41 { display: block; }

<?php } else if( $active_tab == 'transition_options' ) {?>

#switch-box-42, #switch-box-43, #switch-box-44, #switch-box-45, #switch-box-46, #switch-box-47, #switch-box-48, #switch-box-49,
#switch-box-50, #switch-box-51, #switch-box-52, #switch-box-53, #switch-box-54, #switch-box-55, #switch-box-56, #switch-box-56,
#switch-box-62 { display: block; }

<?php } else if( $active_tab == 'mobile_options' ) {?>

#switch-box-4, #switch-box-12, #switch-box-13, #switch-box-14, #switch-box-15, #switch-box-16, #switch-box-17, #switch-box-18,
#switch-box-19 { display: block; }

<?php } ?>
</style>
<?php
}
}
new divi_switch_settings();

// --------------------------------------- CUSTOMIZER ----------------------------------------------

function ds_switch_options($wp_customize) {
 
$wp_customize->add_panel( 'divi_switch_options', array(
    'priority'    => 30,
    'capability'  => 'edit_theme_options',
    'title'       => __('Divi Switch Options', 'Divi Switch'),
    'description' => __('Fine tune your Divi Switch options', 'Divi Switch'),
));
 
$wp_customize->add_section('ds_default_colors', array(
    'priority'    => 5,
    'title'       => __('Default Colors', 'Divi Switch'),
    'panel'       => 'divi_switch_options',
));

$wp_customize->add_section('ds_advanced_options', array(
    'priority'    => 10,
    'title'       => __('Advanced Options', 'Divi Switch'),
    'panel'       => 'divi_switch_options',
));

$wp_customize->add_setting( 'ds_default_color_dark', array(
    'default'           => '#303030',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'et_sanitize_alpha_color',
));

$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_default_color_dark', array(
    'label'     => esc_html__( 'Dark', 'Divi Switch' ),
    'section'   => 'ds_default_colors',
    'settings'  => 'ds_default_color_dark',
)));

$wp_customize->add_setting( 'ds_default_color_light', array(
    'default'           => '#F1F1F1',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'et_sanitize_alpha_color',
));

$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_default_color_light', array(
    'label'     => esc_html__( 'Light', 'Divi Switch' ),
    'section'   => 'ds_default_colors',
    'settings'  => 'ds_default_color_light',
)));

$wp_customize->add_setting( 'ds_default_color_blue', array(
    'default'           => '#247BA0',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'et_sanitize_alpha_color',
));

$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_default_color_blue', array(
    'label'     => esc_html__( 'Blue', 'Divi Switch' ),
    'section'   => 'ds_default_colors',
    'settings'  => 'ds_default_color_blue',
)));

$wp_customize->add_setting( 'ds_default_color_yellow', array(
    'default'           => '#FF8500',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'et_sanitize_alpha_color',
));

$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_default_color_yellow', array(
    'label'     => esc_html__( 'Yellow', 'Divi Switch' ),
    'section'   => 'ds_default_colors',
    'settings'  => 'ds_default_color_yellow',
)));

$wp_customize->add_setting( 'ds_default_color_red', array(
    'default'           => '#EF233C',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'et_sanitize_alpha_color',
));

$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_default_color_red', array(
    'label'     => esc_html__( 'Red', 'Divi Switch' ),
    'section'   => 'ds_default_colors',
    'settings'  => 'ds_default_color_red',
)));

$wp_customize->add_setting( 'ds_default_color_green', array(
    'default'           => '#9BC53D',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'et_sanitize_alpha_color',
));

$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_default_color_green', array(
    'label'     => esc_html__( 'Green', 'Divi Switch' ),
    'section'   => 'ds_default_colors',
    'settings'  => 'ds_default_color_green',
)));

$wp_customize->add_setting( 'ds_header_bg', array(
    'type'          => 'option',
    'capability'    => 'edit_theme_options',
));

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'ds_header_bg', array(
    'label'    => __( 'Header Background Image', 'Divi Switch' ),
    'section'  => 'ds_advanced_options',
    'settings' => 'ds_header_bg',
)));

$wp_customize->add_setting( 'ds_footer_bg', array(
    'type'          => 'option',
    'capability'    => 'edit_theme_options',
));

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'ds_footer_bg', array(
    'label'    => __( 'Footer Background Image', 'Divi Switch' ),
    'section'  => 'ds_advanced_options',
    'settings' => 'ds_footer_bg',
)));

$wp_customize->add_setting('ds_rep_close', array(
    'default'    => 'CLOSE',
    'type'       => 'option',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control('ds_rep_close', array(
    'label'    => __('Replace the word CLOSE on certain menu switches', 'divi switch'),
    'section'  => 'ds_advanced_options',
    'type'     => 'option',
    'settings' => 'ds_rep_close'
));

$wp_customize->add_setting('ds_rep_menu', array(
    'default'    => 'MENU',
    'type'       => 'option',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control('ds_rep_menu', array(
    'label'    => __('Replace the word MENU on certain menu switches', 'divi switch'),
    'section'  => 'ds_advanced_options',
    'type'     => 'option',
    'settings' => 'ds_rep_menu'
));

$wp_customize->add_setting('ds_cf7_submit', array(
    'default'    => '#f0853b',
    'type'       => 'option',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control('ds_cf7_submit', array(
    'label'    => __('CF7 Submit Button Color', 'divi switch'),
    'section'  => 'ds_advanced_options',
    'type'     => 'option',
    'settings' => 'ds_cf7_submit'
));

$wp_customize->add_setting('ds_cf7_submit_hover', array(
    'default'    => '#FFFF00',
    'type'       => 'option',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control('ds_cf7_submit_hover', array(
    'label'    => __('CF7 Submit Button Color', 'divi switch'),
    'section'  => 'ds_advanced_options',
    'type'     => 'option',
    'settings' => 'ds_cf7_submit_hover'
));

}

add_action('customize_register', 'ds_switch_options');


//---------------------------------------------------
add_filter( 'body_class', 'ds_classes' );
add_action( 'admin_head', 'ds_admin_head_scripts' );
add_action( 'wp_enqueue_scripts', 'ds_plugin_styles' );
add_action( 'admin_enqueue_scripts', 'ds_plugin_admin_styles' );
add_action('admin_bar_menu', 'ds_admin_bar_button', 100);