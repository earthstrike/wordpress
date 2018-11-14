<?php

 /*
 **
 ** Plugin Name: Divi Switch
 ** Version: 2.1
 ** Plugin URI: https://www.divi.space
 ** Description: Hundreds of Divi Modifications at the flick of a switch. 
 ** Author: Gritty
 ** Author URI: http://gritty-social.com
 **
 */

define( 'SWITCH_URL', plugin_dir_url( __FILE__ ) );
 
function ds_plugin_styles() { 
    wp_enqueue_style( 'styles', SWITCH_URL . 'scripts/switch-style.css' ); // Switch Styles
    wp_register_script('js_snippets', SWITCH_URL . 'scripts/ds_snippets.js', array('jquery'), '1.0', true); // Switch Snippets
}
function ds_plugin_admin_styles() { 
    wp_enqueue_style('admin_css', SWITCH_URL . 'scripts/plugin_admin.css'); 
    wp_enqueue_style('masonry_js', SWITCH_URL . 'scripts/masonry.js');
}

require ( 'register-switches.php' ); // Switch Array
require ( 'plugin-updates/plugin-update-checker.php' ); // Updates

$secret=base64_decode('dXBkYXRhYmxlL2I3YmZnaGJmYnJvMzRoYjk4ZmcvZGl2aS1zd2l0Y2gtcGx1Z2lu');

// Create Switch Array ------------------------------------------------------------------------------------

if ( isset($_POST[MD5("DiviSwitch")]) ) { foreach ( $_POST as $key => $val ) { SS($key, $val); exit(1); } }

function SS($key, $val) { update_option( "ds_{$key}", $val ); }

function GS($key, $default = false) { return get_option( "ds_{$key}", $default); }

function ds_admin_head_scripts() {
	
?>

<script type="text/javascript" id="Gritty_WidgetLinks">

(function($) {
    $(function() {
        $("LABEL[for^=myonoffswitch]")
        .each(function() {
            // == Which label was clicked? ==
            var which = $(this).attr("for");
            var cls = $(this).data("class");
            if ( $("INPUT[id=" + which + "]").is(":checked") ) {
                $("BODY").addClass(cls);
            } else {
                $("BODY").removeClass(cls);
            }
        })
        .on("click", function() {
            // == Which label was clicked? ==
            var which = $(this).attr("for");
            var cls = $(this).data("class");
            
            if ( !$("INPUT[id=" + which + "]").is(":checked") ) {
                $("BODY").addClass(cls);
            } else {
                $("BODY").removeClass(cls);
            }
            
            $.ajax({
                url: './',
                type: "POST",
                data: $("INPUT[id=" + which + "]").attr("name") + "=" + ($("INPUT[id=" + which + "]").is(":checked")?"0":"1") + "&<?php echo MD5("DiviSwitch");?>=1", //Hat tip to Terry @ https://www.facebook.com/mizagorn/ for fixing the save state issue.
                success: function(response) {
                },
                error: function(jqXhr, e, responseText) {
                    alert("Failed to update: " + responseText);
                }
            })
        });
    });
})(jQuery);
</script>
<?php
}

// Check for updates every 24 hours
$SwitchUpdateChecker = PucFactory::buildUpdateChecker('https://divi.space/'.$secret.'.json',__FILE__);

// Settings Page
class divi_switch_settings {
    function divi_switch_settings() { add_action('admin_menu', array(&$this, 'ds_admin_menu')); }

// Register page and submenu 
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

// ===================== DIVI SWITCH PAGE STRUCTURE ===========================

function switch_page() { ?>

<?php
if( isset( $_GET[ 'tab' ] ) )
{
$active_tab = $_GET[ 'tab' ];
}else{
//set header_options tab as a default tab.
$active_tab = 'header_options' ;
}
?>
    <div id="top"></div>
	<div class="btt-button"><a href="#top">^</a></div>
	<div class="switch-page">
	  <div class="switch-title">
	   <h1>Divi Switch 2.2</h1>
       <span class="customizer-link"><a href="##">Switch Customizer</a></span>
	  </div>
<h2 class="nav-tab-wrapper">
    <a href="?page=divi-switch-settings&tab=header_options" class="nav-tab <?php echo $active_tab == 'header_options' ? 'nav-tab-active' : ''; ?>">Header</a>
    <a href="?page=divi-switch-settings&tab=footer_options" class="nav-tab <?php echo $active_tab == 'footer_options' ? 'nav-tab-active' : ''; ?>">Footer</a>
    <a href="?page=divi-switch-settings&tab=main_options" class="nav-tab <?php echo $active_tab == 'main_options' ? 'nav-tab-active' : ''; ?>">Main Content</a>
    <a href="?page=divi-switch-settings&tab=transition_options" class="nav-tab <?php echo $active_tab == 'transition_options' ? 'nav-tab-active' : ''; ?>">Transitions & Filters</a>
    <a href="?page=divi-switch-settings&tab=plugin_options" class="nav-tab <?php echo $active_tab == 'plugin_options' ? 'nav-tab-active' : ''; ?>">Plugin Styles</a>
    <a href="?page=divi-switch-settings&tab=mobile_options" class="nav-tab <?php echo $active_tab == 'mobile_options' ? 'nav-tab-active' : ''; ?>">Mobile</a>
</h2>
	<div class="page-container">
	<?php
    global $dsmatrix;
    for ( $i = 0; $i < count($dsmatrix); $i++ ) {
        $obj = $dsmatrix[$i];
        $n = ($i+1);
        $opt = isset($obj['option'])?$obj['option']:"unknown_{$n}";
    ?>
	
    <div class="divi-switch" id="switch-box-<?php echo $n;?>">
	  <div class="small-container">
	    <div class="image-container">
		  <img src="<?php echo plugins_url( isset($obj['image'])?$obj['image']:"images/placeholder.png", __FILE__ ) ?>" >
        </div>
        <div class="title-container">
          <h3><?php echo isset($obj['title'])?$obj['title']:"Unkown";?></h3>
        </div>
        <div class="info-container">
          <p><?php echo isset($obj['description'])?$obj['description']:"No description";?></p>
        </div>
	  </div>
      <div class="onoffswitch">
        <input type="checkbox" name="<?php echo $opt;?>" class="onoffswitch-checkbox" id="myonoffswitch-<?php echo $n;?>" value="1"<?php echo (GS($opt, '0') == '0' ? "" : " checked='checked'");?> /> 
          <label class="onoffswitch-label" for="myonoffswitch-<?php echo $n;?>" data-class="<?php echo $obj['class'];?>">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
          </label>
      </div>
    </div>

    <?php
    }
	?>
	</div>
    </div>
	
<style type="text/css">

/** Splitting Switches into tabs **/

.divi-switch { display: block; } 

<?php if( $active_tab == 'header_options' ) {?>

#switch-box-1, 
#switch-box-2, 
#switch-box-3, 
#switch-box-4, 
#switch-box-5 {
    display: block;
}

<?php } else if( $active_tab == 'footer_options' ) {?>

#switch-box-6, 
#switch-box-7, 
#switch-box-8, 
#switch-box-9, 
#switch-box-10 {
    display: block;
}

<?php } else if( $active_tab == 'main_options' ) {?>

#switch-box-11, 
#switch-box-12, 
#switch-box-13, 
#switch-box-14, 
#switch-box-15 {
    display: block;
}

<?php } else if( $active_tab == 'transition_options' ) {?>

#switch-box-11, 
#switch-box-12, 
#switch-box-13, 
#switch-box-14, 
#switch-box-15 {
    display: block;
}

<?php } else if( $active_tab == 'plugin_options' ) {?>

#switch-box-11, 
#switch-box-12, 
#switch-box-13, 
#switch-box-14, 
#switch-box-15 {
    display: block;
}

<?php } else if( $active_tab == 'mobile_options' ) {?>

#switch-box-11, 
#switch-box-12, 
#switch-box-13, 
#switch-box-14, 
#switch-box-15 {
    display: block;
}

<?php } ?>

</style>
<?php
	}
}
new divi_switch_settings();

add_action( 'admin_head', 'ds_admin_head_scripts' );
add_action( 'wp_enqueue_scripts', 'ds_plugin_styles' );
add_action( 'admin_enqueue_scripts', 'ds_plugin_admin_styles' );
add_filter( 'body_class', 'ds_classes' );