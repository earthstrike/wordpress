<?php
/**
 * Add Portfolio Settings in Customizer
 *
 * @package Simple Persona
 */

/**
 * Add portfolio options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_persona_portfolio_options( $wp_customize ) {
    // Add note to Jetpack Portfolio Section
    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_jetpack_portfolio_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Simple_Persona_Note_Control',
            'label'             => sprintf( esc_html__( 'For Portfolio Options for Simple Persona Theme, go %1$shere%2$s', 'simple-persona' ),
                 '<a href="javascript:wp.customize.section( \'simple_persona_portfolio\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'jetpack_portfolio',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	$wp_customize->add_section( 'simple_persona_portfolio', array(
            'panel'    => 'simple_persona_theme_options',
            'title'    => esc_html__( 'Portfolio', 'simple-persona' ),
        )
    );

    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_portfolio_note_1',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Simple_Persona_Note_Control',
            'active_callback'   => 'simple_persona_is_ect_portfolio_inactive',
            'label'             => sprintf( esc_html__( 'For Portfolio, install %1$sEssential Content Types%2$s Plugin with Portfolio Content Type Enabled', 'simple-persona' ),
                '<a target="_blank" href="https://wordpress.org/plugins/essential-content-types/">',
                '</a>'
            ),
            'section'           => 'simple_persona_portfolio',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_portfolio_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'simple_persona_sanitize_select',
            'active_callback'   => 'simple_persona_is_ect_portfolio_active',
			'choices'           => simple_persona_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'simple-persona' ),
			'section'           => 'simple_persona_portfolio',
			'type'              => 'select',
		)
	);

    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_portfolio_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Simple_Persona_Note_Control',
            'active_callback'   => 'simple_persona_is_portfolio_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'simple-persona' ),
                 '<a href="javascript:wp.customize.control( \'jetpack_portfolio_title\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'simple_persona_portfolio',
            'type'              => 'description',
        )
    );


    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_portfolio_number',
            'default'           => '3',
            'sanitize_callback' => 'simple_persona_sanitize_number_range',
            'active_callback'   => 'simple_persona_is_portfolio_active',
            'label'             => esc_html__( 'Number of items to show', 'simple-persona' ),
            'section'           => 'simple_persona_portfolio',
            'type'              => 'number',
            'input_attrs'       => array(
                'style'             => 'width: 100px;',
                'min'               => 0,
            ),
        )
    );


    $number = get_theme_mod( 'simple_persona_portfolio_number', 6 );

    for ( $i = 1; $i <= $number ; $i++ ) {

        //for CPT
        simple_persona_register_option( $wp_customize, array(
                'name'              => 'simple_persona_portfolio_cpt_' . $i,
                'sanitize_callback' => 'simple_persona_sanitize_post',
                'active_callback'   => 'simple_persona_is_portfolio_active',
                'label'             => esc_html__( 'Portfolio', 'simple-persona' ) . ' ' . $i ,
                'section'           => 'simple_persona_portfolio',
                'type'              => 'select',
                'choices'           => simple_persona_generate_post_array( 'jetpack-portfolio' ),
            )
        );
    } // End for().

    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_portfolio_text',
            'default'           => esc_html__( 'View More', 'simple-persona' ),
            'sanitize_callback' => 'sanitize_text_field',
            'active_callback'   => 'simple_persona_is_portfolio_active',
            'label'             => esc_html__( 'Button Text', 'simple-persona' ),
            'section'           => 'simple_persona_portfolio',
            'type'              => 'text',
        )
    );

    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_portfolio_link',
            'sanitize_callback' => 'esc_url_raw',
            'active_callback'   => 'simple_persona_is_portfolio_active',
            'label'             => esc_html__( 'Button Link', 'simple-persona' ),
            'section'           => 'simple_persona_portfolio',
        )
    );

    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_portfolio_target',
            'sanitize_callback' => 'simple_persona_sanitize_checkbox',
            'active_callback'   => 'simple_persona_is_portfolio_active',
            'label'             => esc_html__( 'Check to Open Link in New Window/Tab', 'simple-persona' ),
            'section'           => 'simple_persona_portfolio',
            'type'              => 'checkbox',
        )
    );
}
add_action( 'customize_register', 'simple_persona_portfolio_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'simple_persona_is_portfolio_active' ) ) :
    /**
    * Return true if portfolio is active
    *
    * @since Simple Persona 0.1
    */
    function simple_persona_is_portfolio_active( $control ) {
        $enable = $control->manager->get_setting( 'simple_persona_portfolio_option' )->value();

        //return true only if previwed page on customizer matches the type of content option selected
        return ( simple_persona_is_ect_portfolio_active( $control ) && simple_persona_check_section( $enable ) );
    }
endif;

if ( ! function_exists( 'simple_persona_is_ect_portfolio_inactive' ) ) :
    /**
    * Return true if service is active
    *
    * @since Simple Personal Trainer 0.1
    */
    function simple_persona_is_ect_portfolio_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_Testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_Testimonial' ) );
    }
endif;

if ( ! function_exists( 'simple_persona_is_ect_portfolio_active' ) ) :
    /**
    * Return true if service is active
    *
    * @since Simple Personal Trainer 0.1
    */
    function simple_persona_is_ect_portfolio_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_Testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_Testimonial' ) );
    }
endif;
