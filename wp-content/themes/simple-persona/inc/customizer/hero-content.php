<?php
/**
 * Hero Content Options
 *
 * @package Simple Persona
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_persona_hero_content_options( $wp_customize ) {
	$wp_customize->add_section( 'simple_persona_hero_content_options', array(
			'title' => esc_html__( 'Hero Content', 'simple-persona' ),
			'panel' => 'simple_persona_theme_options',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_hero_content_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'choices'           => simple_persona_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'simple-persona' ),
			'section'           => 'simple_persona_hero_content_options',
			'type'              => 'select',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_hero_content',
			'default'           => '0',
			'sanitize_callback' => 'simple_persona_sanitize_post',
			'active_callback'   => 'simple_persona_is_hero_content_active',
			'label'             => esc_html__( 'Page', 'simple-persona' ),
			'section'           => 'simple_persona_hero_content_options',
			'type'              => 'dropdown-pages',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_disable_hero_content_title',
			'sanitize_callback' => 'simple_persona_sanitize_checkbox',
			'active_callback'   => 'simple_persona_is_hero_content_active',
			'label'             => esc_html__( 'Check to disable title', 'simple-persona' ),
			'section'           => 'simple_persona_hero_content_options',
			'type'              => 'checkbox',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_hero_content_show',
			'default'           => 'full-content',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'active_callback'   => 'simple_persona_is_hero_content_active',
			'choices'           => simple_persona_content_show(),
			'label'             => esc_html__( 'Display Content', 'simple-persona' ),
			'section'           => 'simple_persona_hero_content_options',
			'type'              => 'select',
		)
	);

}
add_action( 'customize_register', 'simple_persona_hero_content_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'simple_persona_is_hero_content_active' ) ) :
	/**
	* Return true if hero content is active
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_is_hero_content_active( $control ) {
		$enable = $control->manager->get_setting( 'simple_persona_hero_content_visibility' )->value();

		return ( simple_persona_check_section( $enable ) );
	}
endif;
