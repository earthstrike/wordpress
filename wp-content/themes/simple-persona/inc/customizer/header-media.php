<?php
/**
 * Header Media Options
 *
 * @package Simple Persona
 */

/**
 * Add Header Media options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_persona_header_media_options( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->description = esc_html__( 'If you add video, it will only show up on Homepage/FrontPage. Other Pages will use Header/Post/Page Image depending on your selection of option. Header Image will be used as a fallback while the video loads ', 'simple-persona' );

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_header_media_option',
			'default'           => 'entire-site-page-post',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'simple-persona' ),
				'exclude-home'           => esc_html__( 'Excluding Homepage', 'simple-persona' ),
				'exclude-home-page-post' => esc_html__( 'Excluding Homepage, Page/Post Featured Image', 'simple-persona' ),
				'entire-site'            => esc_html__( 'Entire Site', 'simple-persona' ),
				'entire-site-page-post'  => esc_html__( 'Entire Site, Page/Post Featured Image', 'simple-persona' ),
				'pages-posts'            => esc_html__( 'Pages and Posts', 'simple-persona' ),
				'disable'                => esc_html__( 'Disabled', 'simple-persona' ),
			),
			'label'             => esc_html__( 'Enable on', 'simple-persona' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_header_media_title',
			'sanitize_callback' => 'wp_kses_post',
			'default'           => esc_html__( 'Header Media', 'simple-persona' ),
			'label'             => esc_html__( 'Header Media Title', 'simple-persona' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

    simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_header_media_text',
			'sanitize_callback' => 'wp_kses_post',
			'default'           => esc_html__( 'Go to Theme Customizer', 'simple-persona' ),
			'label'             => esc_html__( 'Header Media Text', 'simple-persona' ),
			'section'           => 'header_image',
			'type'              => 'textarea',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_header_media_url',
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Header Media Url', 'simple-persona' ),
			'section'           => 'header_image',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_header_media_url_text',
			'default'           => esc_html__( 'More', 'simple-persona' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Header Media Url Text', 'simple-persona' ),
			'section'           => 'header_image',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_header_url_target',
			'sanitize_callback' => 'simple_persona_sanitize_checkbox',
			'label'             => esc_html__( 'Check to Open Link in New Window/Tab', 'simple-persona' ),
			'section'           => 'header_image',
			'type'              => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'simple_persona_header_media_options' );
