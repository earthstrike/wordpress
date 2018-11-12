<?php
/**
 * Featured Content options
 *
 * @package Simple Persona
 */

/**
 * Add featured content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_persona_featured_content_options( $wp_customize ) {
	$wp_customize->add_section( 'simple_persona_featured_content', array(
			'title' => esc_html__( 'Featured Content', 'simple-persona' ),
			'panel' => 'simple_persona_theme_options',
		)
	);

	// Add note to ECT Featured Content Section
    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_featured_content_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Simple_Persona_Note_Control',
            'active_callback'   => 'simple_persona_is_ect_featured_content_inactive',
            'label'             => sprintf( esc_html__( 'For Featured Content, install %1$sEssential Content Types%2$s Plugin with Featured Content Type Enabled', 'simple-persona' ),
                '<a target="_blank" href="https://wordpress.org/plugins/essential-content-types/">',
                '</a>'
            ),
           'section'            => 'simple_persona_featured_content',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	// Add color scheme setting and control.
	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_featured_content_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'active_callback'   => 'simple_persona_is_ect_featured_content_active',
			'choices'           => simple_persona_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'simple-persona' ),
			'section'           => 'simple_persona_featured_content',
			'type'              => 'select',
		)
	);

    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_featured_content_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Simple_Persona_Note_Control',
            'active_callback'   => 'simple_persona_is_featured_content_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'simple-persona' ),
                 '<a href="javascript:wp.customize.control( \'featured_content_title\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'simple_persona_featured_content',
            'type'              => 'description',
        )
    );

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_featured_content_number',
			'default'           => 3,
			'sanitize_callback' => 'simple_persona_sanitize_number_range',
			'active_callback'   => 'simple_persona_is_featured_content_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'simple-persona' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of Featured Content', 'simple-persona' ),
			'section'           => 'simple_persona_featured_content',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_featured_content_show',
			'default'           => 'excerpt',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'active_callback'   => 'simple_persona_is_featured_content_active',
			'choices'           => simple_persona_content_show(),
			'label'             => esc_html__( 'Display Content', 'simple-persona' ),
			'section'           => 'simple_persona_featured_content',
			'type'              => 'select',
		)
	);


	$number = get_theme_mod( 'simple_persona_featured_content_number', 3 );

	//loop for featured post content
	for ( $i = 1; $i <= $number ; $i++ ) {

		simple_persona_register_option( $wp_customize, array(
				'name'              => 'simple_persona_featured_content_cpt_' . $i,
				'sanitize_callback' => 'simple_persona_sanitize_post',
				'active_callback'   => 'simple_persona_is_featured_content_active',
				'label'             => esc_html__( 'Featured Content', 'simple-persona' ) . ' ' . $i ,
				'section'           => 'simple_persona_featured_content',
				'type'              => 'select',
                'choices'           => simple_persona_generate_post_array( 'featured-content' ),
			)
		);
	}

	simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_featured_content_text',
            'default'           => esc_html__( 'View More', 'simple-persona' ),
            'sanitize_callback' => 'sanitize_text_field',
            'active_callback'   => 'simple_persona_is_featured_content_active',
            'label'             => esc_html__( 'Button Text', 'simple-persona' ),
            'section'           => 'simple_persona_featured_content',
            'type'              => 'text',
        )
    );

    simple_persona_register_option( $wp_customize, array(
            'name'              => 'simple_persona_featured_content_link',
            'sanitize_callback' => 'esc_url_raw',
            'active_callback'   => 'simple_persona_is_featured_content_active',
            'label'             => esc_html__( 'Button Link', 'simple-persona' ),
            'section'           => 'simple_persona_featured_content',
        )
    );

}
add_action( 'customize_register', 'simple_persona_featured_content_options', 10 );

/** Active Callback Functions **/
if( ! function_exists( 'simple_persona_is_featured_content_active' ) ) :
	/**
	* Return true if featured content is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_featured_content_active( $control ) {
		$enable = $control->manager->get_setting( 'simple_persona_featured_content_option' )->value();

		return ( simple_persona_check_section( $enable ) );
	}
endif;


if( ! function_exists( 'simple_persona_is_featured_cpt_content_active' ) ) :
	/**
	* Return true if page content is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_featured_cpt_content_active( $control ) {
		$type = $control->manager->get_setting( 'simple_persona_featured_content_type' )->value();

		return ( simple_persona_is_featured_content_active( $control ) && 'featured-content' === $type );
	}
endif;

if ( ! function_exists( 'simple_persona_is_ect_featured_content_active' ) ) :
    /**
    * Return true if featured_content is active
    *
    * @since Simple Persona 0.1
    */
    function simple_persona_is_ect_featured_content_active( $control ) {
        return ( class_exists( 'Essential_Content_Featured_Content' ) || class_exists( 'Essential_Content_Pro_Featured_Content' ) );
    }
endif;

if ( ! function_exists( 'simple_persona_is_ect_featured_content_inactive' ) ) :
    /**
    * Return true if featured_content is active
    *
    * @since Simple Persona 0.1
    */
    function simple_persona_is_ect_featured_content_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Featured_Content' ) || class_exists( 'Essential_Content_Pro_Featured_Content' ) );
    }
endif;
