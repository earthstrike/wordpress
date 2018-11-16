<?php
/**
 * Add Testimonial Settings in Customizer
 *
 * @package Simple Persona
*/

/**
 * Add testimonial options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_persona_testimonial_options( $wp_customize ) {
	// Add note to Jetpack Testimonial Section.
	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_jetpack_testimonial_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Simple_Persona_Note_Control',
			'label'             => sprintf( esc_html__( 'For Testimonial Options for Simple Persona Theme, go %1$shere%2$s', 'simple-persona' ),
				'<a href="javascript:wp.customize.section( \'simple_persona_testimonials\' ).focus();">',
				'</a>'
			),
		   'section'            => 'jetpack_testimonials',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

	$wp_customize->add_section( 'simple_persona_testimonials', array(
			'panel'    => 'simple_persona_theme_options',
			'title'    => esc_html__( 'Testimonials', 'simple-persona' ),
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_testimonials_note_1',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Simple_Persona_Note_Control',
			'active_callback'   => 'simple_persona_is_ect_testimonials_inactive',
			'label'             => sprintf( esc_html__( 'For Testimonials, install %1$sEssential Content Types%2$s Plugin with Testimonial Content Type Enabled', 'simple-persona' ),
				'<a target="_blank" href="https://wordpress.org/plugins/essential-content-types/">',
				'</a>'
			),
			'section'           => 'simple_persona_testimonials',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_testimonial_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'active_callback'   => 'simple_persona_is_ect_testimonials_active',
			'choices'           => simple_persona_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'simple-persona' ),
			'section'           => 'simple_persona_testimonials',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_testimonial_position',
			'sanitize_callback' => 'simple_persona_sanitize_checkbox',
			'active_callback'   => 'simple_persona_is_testimonial_active',
			'label'             => esc_html__( 'Check to Move above Footer', 'simple-persona' ),
			'section'           => 'simple_persona_testimonials',
			'type'              => 'checkbox',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_testimonial_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Simple_Persona_Note_Control',
			'active_callback'   => 'simple_persona_is_testimonial_active',
			/* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'simple-persona' ),
				'<a href="javascript:wp.customize.section( \'jetpack_testimonials\' ).focus();">',
				'</a>'
			),
			'section'           => 'simple_persona_testimonials',
			'type'              => 'description',
		)
	);


	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_testimonial_number',
			'default'           => '3',
			'sanitize_callback' => 'simple_persona_sanitize_number_range',
			'active_callback'   => 'simple_persona_is_testimonial_active',
			'label'             => esc_html__( 'Number of items to show', 'simple-persona' ),
			'section'           => 'simple_persona_testimonials',
			'type'              => 'number',
			'input_attrs'       => array(
				'style'             => 'width: 100px;',
				'min'               => 0,
			),
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_testimonial_enable_title',
			'default'           => 1,
			'sanitize_callback' => 'simple_persona_sanitize_checkbox',
			'active_callback'   => 'simple_persona_is_testimonial_active',
			'label'             => esc_html__( 'Check to Enable Title', 'simple-persona' ),
			'section'           => 'simple_persona_testimonials',
			'type'              => 'checkbox',
		)
	);

	$number = get_theme_mod( 'simple_persona_testimonial_number', 3 );

	for ( $i = 1; $i <= $number ; $i++ ) {
		// for CPT.
		simple_persona_register_option( $wp_customize, array(
				'name'              => 'simple_persona_testimonial_cpt_' . $i,
				'sanitize_callback' => 'simple_persona_sanitize_post',
				'active_callback'   => 'simple_persona_is_testimonial_active',
				'label'             => esc_html__( 'Testimonial', 'simple-persona' ) . ' ' . $i ,
				'section'           => 'simple_persona_testimonials',
				'type'              => 'select',
				'choices'           => simple_persona_generate_post_array( 'jetpack-testimonial' ),
			)
		);
	} // End for().
}
add_action( 'customize_register', 'simple_persona_testimonial_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'simple_persona_is_testimonial_active' ) ) :
	/**
	* Return true if testimonial is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_testimonial_active( $control ) {
		$enable = $control->manager->get_setting( 'simple_persona_testimonial_option' )->value();

		//return true only if previewed page on customizer matches the type of content option selected
		return ( simple_persona_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'simple_persona_is_ect_testimonials_active' ) ) :
	/**
	* Return true if service is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_ect_testimonials_active( $control ) {
		return ( class_exists( 'Essential_Content_Jetpack_Testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_Testimonial' ) );
	}
endif;

if ( ! function_exists( 'simple_persona_is_ect_testimonials_inactive' ) ) :
	/**
	* Return true if service is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_ect_testimonials_inactive( $control ) {
		return ! ( class_exists( 'Essential_Content_Jetpack_Testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_Testimonial' ) );
	}
endif;
