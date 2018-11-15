<?php
/**
 * Customizer functionality
 *
 * @package Simple Persona
 */

/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Simple Persona 0.1
 *
 * @see simple_persona_header_style()
 */
function simple_persona_custom_header_and_background() {
	$default_background_color = '#1a1a1a';
	$default_text_color       = '#777777';

	/**
	 * Filter the arguments used when adding 'custom-background' support in Simple Persona.
	 *
	 * @since Simple Persona 0.1
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'simple_persona_custom_background_args', array(
		'default-color' => $default_background_color,
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support in Simple Persona.
	 *
	 * @since Simple Persona 0.1
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'simple_persona_custom_header_args', array(
		'default-image'      	 => get_parent_theme_file_uri( '/assets/images/header-image.jpg' ),
		'default-text-color'     => $default_text_color,
		'width'                  => 1920,
		'height'                 => 954,
		'flex-height'            => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'simple_persona_header_style',
		'video'                  => true,
	) ) );

	register_default_headers( array(
	'default-image' => array(
		'url'           => '%s/assets/images/header-image.jpg',
		'thumbnail_url' => '%s/assets/images/header-image-275x155.jpg',
		'description'   => esc_html__( 'Default Header Image', 'simple-persona' ),
		),
	) );
}
add_action( 'after_setup_theme', 'simple_persona_custom_header_and_background' );

/**
 * Customize video play/pause button in the custom header.
 *
 * @param array $settings header video settings.
 */
function simple_persona_video_controls( $settings ) {
	$settings['l10n']['play'] = '<span class="screen-reader-text">' . esc_html__( 'Play background video', 'simple-persona' ) . '</span>' . simple_persona_get_svg( array(
		'icon' => 'play',
	) );
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . esc_html__( 'Pause background video', 'simple-persona' ) . '</span>' . simple_persona_get_svg( array(
		'icon' => 'pause',
	) );
	return $settings;
}
add_filter( 'header_video_settings', 'simple_persona_video_controls' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Simple Persona 0.1
 * @see simple_persona_customize_register()
 *
 * @return void
 */
function simple_persona_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Simple Persona 0.1
 * @see simple_persona_customize_register()
 *
 * @return void
 */
function simple_persona_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
