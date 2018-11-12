<?php
/**
 * Featured Slider Options
 *
 * @package Simple Persona
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_persona_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'simple_persona_featured_slider', array(
			'panel' => 'simple_persona_theme_options',
			'title' => esc_html__( 'Featured Slider', 'simple-persona' ),
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'choices'           => simple_persona_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'simple-persona' ),
			'section'           => 'simple_persona_featured_slider',
			'type'              => 'select',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_slider_transition_effect',
			'default'           => 'fade',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'active_callback'   => 'simple_persona_is_slider_active',
			'choices'           => simple_persona_slider_transition_effects(),
			'label'             => esc_html__( 'Transition Effect', 'simple-persona' ),
			'section'           => 'simple_persona_featured_slider',
			'type'              => 'select',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_slider_transition_delay',
			'default'           => '4',
			'sanitize_callback' => 'absint',
			'active_callback'   => 'simple_persona_is_slider_active',
			'description'       => esc_html__( 'seconds(s)', 'simple-persona' ),
			'input_attrs'       => array(
				'style' => 'width: 40px;',
			),
			'label'             => esc_html__( 'Transition Delay', 'simple-persona' ),
			'section'           => 'simple_persona_featured_slider',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_slider_transition_length',
			'default'           => '1',
			'sanitize_callback' => 'absint',

			'active_callback'   => 'simple_persona_is_slider_active',
			'description'       => esc_html__( 'seconds(s)', 'simple-persona' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
			),
			'label'             => esc_html__( 'Transition Length', 'simple-persona' ),
			'section'           => 'simple_persona_featured_slider',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_slider_image_loader',
			'default'           => 'false',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'active_callback'   => 'simple_persona_is_slider_active',
			'choices'           => simple_persona_slider_image_loader(),
			'label'             => esc_html__( 'Image Loader', 'simple-persona' ),
			'section'           => 'simple_persona_featured_slider',
			'type'              => 'select',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'simple_persona_sanitize_number_range',

			'active_callback'   => 'simple_persona_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'simple-persona' ),
			'input_attrs'       => array(
				'style' => 'width: 45px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'simple-persona' ),
			'section'           => 'simple_persona_featured_slider',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_slider_content_show',
			'default'           => 'excerpt',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'active_callback'   => 'simple_persona_is_slider_active',
			'choices'           => simple_persona_content_show(),
			'label'             => esc_html__( 'Display Content', 'simple-persona' ),
			'section'           => 'simple_persona_featured_slider',
			'type'              => 'select',
		)
	);

	$slider_number = get_theme_mod( 'simple_persona_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {

		// Page Sliders
		simple_persona_register_option( $wp_customize, array(
				'name'              =>'simple_persona_slider_page_' . $i,
				'sanitize_callback' => 'simple_persona_sanitize_post',
				'active_callback'   => 'simple_persona_is_slider_active',
				'label'             => esc_html__( 'Page', 'simple-persona' ) . ' # ' . $i,
				'section'           => 'simple_persona_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);

	} // End for().
}
add_action( 'customize_register', 'simple_persona_slider_options' );


/**
 * Returns an array of feature slider transition effects
 *
 * @since Simple Persona 0.1
 */
function simple_persona_slider_transition_effects() {
	$options = array(
		'fade'       => esc_html__( 'Fade', 'simple-persona' ),
		'fadeout'    => esc_html__( 'Fade Out', 'simple-persona' ),
		'none'       => esc_html__( 'None', 'simple-persona' ),
		'scrollHorz' => esc_html__( 'Scroll Horizontal', 'simple-persona' ),
		'scrollVert' => esc_html__( 'Scroll Vertical', 'simple-persona' ),
		'flipHorz'   => esc_html__( 'Flip Horizontal', 'simple-persona' ),
		'flipVert'   => esc_html__( 'Flip Vertical', 'simple-persona' ),
		'tileSlide'  => esc_html__( 'Tile Slide', 'simple-persona' ),
		'tileBlind'  => esc_html__( 'Tile Blind', 'simple-persona' ),
		'shuffle'    => esc_html__( 'Shuffle', 'simple-persona' ),
	);

	return apply_filters( 'simple_persona_slider_transition_effects', $options );
}


/**
 * Returns an array of featured slider image loader options
 *
 * @since Simple Persona 0.1
 */
function simple_persona_slider_image_loader() {
	$options = array(
		'true'  => esc_html__( 'True', 'simple-persona' ),
		'wait'  => esc_html__( 'Wait', 'simple-persona' ),
		'false' => esc_html__( 'False', 'simple-persona' ),
	);

	return apply_filters( 'simple_persona_slider_image_loader', $options );
}


/**
 * Returns an array of featured content show registered
 *
 * @since Simple Persona 0.1
 */
function simple_persona_content_show() {
	$options = array(
		'excerpt'      => esc_html__( 'Show Excerpt', 'simple-persona' ),
		'full-content' => esc_html__( 'Full Content', 'simple-persona' ),
		'hide-content' => esc_html__( 'Hide Content', 'simple-persona' ),
	);
	return apply_filters( 'simple_persona_content_show', $options );
}


/**
 * Returns an array of featured content show registered
 *
 * @since Simple Persona 0.1
 */
function simple_persona_meta_show() {
	$options = array(
		'show-meta' => esc_html__( 'Show Meta', 'simple-persona' ),
		'hide-meta' => esc_html__( 'Hide Meta', 'simple-persona' ),
	);
	return apply_filters( 'simple_persona_content_show', $options );
}

/** Active Callback Functions */

if( ! function_exists( 'simple_persona_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_slider_active( $control ) {
		$enable = $control->manager->get_setting( 'simple_persona_slider_option' )->value();

		return ( simple_persona_check_section( $enable ) );
	}
endif;

if( ! function_exists( 'simple_persona_is_page_slider_active' ) ) :
	/**
	* Return true if page slider is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_page_slider_active( $control ) {
		$type = $control->manager->get_setting( 'simple_persona_slider_type' )->value();

		return ( simple_persona_is_slider_active( $control ) && 'page' === $type );
	}
endif;
