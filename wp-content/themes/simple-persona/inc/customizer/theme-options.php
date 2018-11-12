<?php
/**
 * Theme Options
 *
 * @package Simple Persona
 */

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_persona_theme_options( $wp_customize ) {
	$wp_customize->add_panel( 'simple_persona_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'simple-persona' ),
		'priority' => 130,
	) );

	// Breadcrumb Option.
	$wp_customize->add_section( 'simple_persona_breadcrumb_options', array(
			'description' => esc_html__( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance.', 'simple-persona' ),
			'panel'       => 'simple_persona_theme_options',
			'title'       => esc_html__( 'Breadcrumb', 'simple-persona' ),
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_breadcrumb_option',
			'default'           => 1,
			'sanitize_callback' => 'simple_persona_sanitize_checkbox',
			'label'             => esc_html__( 'Check to enable Breadcrumb', 'simple-persona' ),
			'section'           => 'simple_persona_breadcrumb_options',
			'type'              => 'checkbox',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_breadcrumb_on_homepage',
			'sanitize_callback' => 'simple_persona_sanitize_checkbox',
			'label'             => esc_html__( 'Check to enable Breadcrumb on Homepage', 'simple-persona' ),
			'section'           => 'simple_persona_breadcrumb_options',
			'type'              => 'checkbox',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_breadcrumb_seperator',
			'default'           => '/',
			'sanitize_callback' => 'wp_kses_data',
			'input_attrs'       => array(
				'style' => 'width: 100px;'
			),
			'label'             => esc_html__( 'Separator between Breadcrumbs', 'simple-persona' ),
			'section'           => 'simple_persona_breadcrumb_options',
			'type'              => 'text'
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_latest_posts_title',
			'default'           => esc_html__( 'News', 'simple-persona' ),
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Latest Posts Title', 'simple-persona' ),
			'section'           => 'simple_persona_theme_options',
		)
	);

	// Layout Options
	$wp_customize->add_section( 'simple_persona_layout_options', array(
		'title' => esc_html__( 'Layout Options', 'simple-persona' ),
		'panel' => 'simple_persona_theme_options',
		)
	);

	/* Layout Type */
	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_layout_type',
			'default'           => 'fluid',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'label'             => esc_html__( 'Site Layout', 'simple-persona' ),
			'section'           => 'simple_persona_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'fluid' => esc_html__( 'Fluid', 'simple-persona' ),
				'boxed' => esc_html__( 'Boxed', 'simple-persona' ),
			),
		)
	);

	/* Default Layout */
	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_default_layout',
			'default'           => 'no-sidebar',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'label'             => esc_html__( 'Default Layout', 'simple-persona' ),
			'section'           => 'simple_persona_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar' => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'simple-persona' ),
				'no-sidebar'    => esc_html__( 'No Sidebar', 'simple-persona' ),
			),
		)
	);

	/* Homepage/Archive Layout */
	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_homepage_archive_layout',
			'default'           => 'no-sidebar',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'label'             => esc_html__( 'Homepage/Archive Layout', 'simple-persona' ),
			'section'           => 'simple_persona_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar' => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'simple-persona' ),
				'no-sidebar'    => esc_html__( 'No Sidebar', 'simple-persona' ),
			),
		)
	);

	/* Archive Content Layout */
	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_content_layout',
			'default'           => 'excerpt-image-left',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'label'             => esc_html__( 'Archive Content Layout', 'simple-persona' ),
			'section'           => 'simple_persona_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'excerpt-image-left'     => esc_html__( 'Show Excerpt( Image Left)', 'simple-persona' ),
				'full-content'           => esc_html__( 'Show Full Content ( No Featured Image )', 'simple-persona' ),
			),
		)
	);

	/* Single Page/Post Image */
	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_single_layout',
			'default'           => 'disabled',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'label'             => esc_html__( 'Single Page/Post Image', 'simple-persona' ),
			'section'           => 'simple_persona_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'disabled'                 => esc_html__( 'Disabled', 'simple-persona' ),
				'post-thumbnail'           => esc_html__( 'Enable', 'simple-persona' ),
			),
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'simple_persona_excerpt_options', array(
		'panel'     => 'simple_persona_theme_options',
		'title'     => esc_html__( 'Excerpt Options', 'simple-persona' ),
	) );

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_excerpt_length',
			'default'           => '20',
			'sanitize_callback' => 'absint',
			'description' => esc_html__( 'Excerpt length. Default is 30 words', 'simple-persona' ),
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 5,
				'style' => 'width: 60px;',
			),
			'label'    => esc_html__( 'Excerpt Length (words)', 'simple-persona' ),
			'section'  => 'simple_persona_excerpt_options',
			'type'     => 'number',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_excerpt_more_text',
			'default'           => esc_html__( 'Continue reading...', 'simple-persona' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Read More Text', 'simple-persona' ),
			'section'           => 'simple_persona_excerpt_options',
			'type'              => 'text',
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'simple_persona_search_options', array(
		'panel'     => 'simple_persona_theme_options',
		'title'     => esc_html__( 'Search Options', 'simple-persona' ),
	) );

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_search_text',
			'default'           => esc_html__( 'Search', 'simple-persona' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Search Text', 'simple-persona' ),
			'section'           => 'simple_persona_search_options',
			'type'              => 'text',
		)
	);

	// Homepage / Frontpage Options.
	$wp_customize->add_section( 'simple_persona_homepage_options', array(
		'description' => esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'simple-persona' ),
		'panel'       => 'simple_persona_theme_options',
		'title'       => esc_html__( 'Homepage / Frontpage Options', 'simple-persona' ),
	) );

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_recent_posts_heading',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'News', 'simple-persona' ),
			'label'             => esc_html__( 'Recent Posts Heading', 'simple-persona' ),
			'section'           => 'simple_persona_homepage_options',
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_recent_posts_subheading',
			'sanitize_callback' => 'wp_kses_post',
			'default'           => esc_html__( 'From the blog', 'simple-persona' ),
			'label'             => esc_html__( 'Recent Posts Sub Heading', 'simple-persona' ),
			'section'           => 'simple_persona_homepage_options',
			'type'              => 'textarea'
		)
	);

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_front_page_category',
			'sanitize_callback' => 'simple_persona_sanitize_category_list',
			'custom_control'    => 'Simple_Persona_Multi_Categories_Control',
			'label'             => esc_html__( 'Categories', 'simple-persona' ),
			'section'           => 'simple_persona_homepage_options',
			'type'              => 'dropdown-categories',
		)
	);

	// Pagination Options.
	$pagination_type = get_theme_mod( 'simple_persona_pagination_type', 'default' );

	$nav_desc = '';

	/**
	* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	*/
	$nav_desc = sprintf(
		wp_kses(
			__( 'For infinite scrolling, use %1$sCatch Infinite Scroll Plugin%2$s with Infinite Scroll module Enabled.', 'simple-persona' ),
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
				),
				'br'=> array()
			)
		),
		'<a target="_blank" href="https://wordpress.org/plugins/catch-infinite-scroll/">',
		'</a>'
	);

	$wp_customize->add_section( 'simple_persona_pagination_options', array(
		'description'     => $nav_desc,
		'panel'           => 'simple_persona_theme_options',
		'title'           => esc_html__( 'Pagination Options', 'simple-persona' ),
		'active_callback' => 'simple_persona_scroll_plugins_inactive',
	) );

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_pagination_type',
			'default'           => 'default',
			'sanitize_callback' => 'simple_persona_sanitize_select',
			'choices'           => simple_persona_get_pagination_types(),
			'label'             => esc_html__( 'Pagination type', 'simple-persona' ),
			'section'           => 'simple_persona_pagination_options',
			'type'              => 'select',
		)
	);

	/* Scrollup Options */
	$wp_customize->add_section( 'simple_persona_scrollup', array(
		'panel'    => 'simple_persona_theme_options',
		'title'    => esc_html__( 'Scrollup Options', 'simple-persona' ),
	) );

	simple_persona_register_option( $wp_customize, array(
			'name'              => 'simple_persona_disable_scrollup',
			'sanitize_callback' => 'simple_persona_sanitize_checkbox',
			'label'             => esc_html__( 'Disable Scroll Up', 'simple-persona' ),
			'section'           => 'simple_persona_scrollup',
			'type'              => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'simple_persona_theme_options' );


/**
 * Returns an array of avaliable fonts registered for Simple Persona
 *
 * @since Simple Persona 0.1
 */
function simple_persona_avaliable_fonts() {
	$avaliable_fonts = array(
		'arial-black' => array(
			'value' => 'arial-black',
			'label' => '"Arial Black", Gadget, sans-serif',
		),
		'allan' => array(
			'value' => 'allan',
			'label' => '"Allan", sans-serif',
		),
		'allerta' => array(
			'value' => 'allerta',
			'label' => '"Allerta", sans-serif',
		),
		'amaranth' => array(
			'value' => 'amaranth',
			'label' => '"Amaranth", sans-serif',
		),
		'amatic-sc' => array(
			'value' => 'amatic-sc',
			'label' => '"Amatic SC", cursive',
		),
		'arial' => array(
			'value' => 'arial',
			'label' => 'Arial, Helvetica, sans-serif',
		),
		'bitter' => array(
			'value' => 'bitter',
			'label' => '"Bitter", sans-serif',
		),
		'cabin' => array(
			'value' => 'cabin',
			'label' => '"Cabin", sans-serif',
		),
		'cantarell' => array(
			'value' => 'cantarell',
			'label' => '"Cantarell", sans-serif',
		),
		'century-gothic' => array(
			'value' => 'century-gothic',
			'label' => '"Century Gothic", sans-serif',
		),
		'courier-new' => array(
			'value' => 'courier-new',
			'label' => '"Courier New", Courier, monospace',
		),
		'crimson-text' => array(
			'value' => 'crimson-text',
			'label' => '"Crimson Text", sans-serif',
		),
		'cuprum' => array(
			'value' => 'cuprum',
			'label' => '"Cuprum", sans-serif',
		),
		'dancing-script' => array(
			'value' => 'dancing-script',
			'label' => '"Dancing Script", sans-serif',
		),
		'droid-sans' => array(
			'value' => 'droid-sans',
			'label' => '"Droid Sans", sans-serif',
		),
		'droid-serif' => array(
			'value' => 'droid-serif',
			'label' => '"Droid Serif", sans-serif',
		),
		'exo' => array(
			'value' => 'exo',
			'label' => '"Exo", sans-serif',
		),
		'exo-2' => array(
			'value' => 'exo-2',
			'label' => '"Exo 2", sans-serif',
		),
		'georgia' => array(
			'value' => 'georgia',
			'label' => 'Georgia, "Times New Roman", Times, serif',
		),
		'helvetica' => array(
			'value' => 'helvetica',
			'label' => 'Helvetica, "Helvetica Neue", Arial, sans-serif',
		),
		'helvetica-neue' => array(
			'value' => 'helvetica-neue',
			'label' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
		),
		'istok-web' => array(
			'value' => 'istok-web',
			'label' => '"Istok Web", sans-serif',
		),
		'impact' => array(
			'value' => 'impact',
			'label' => 'Impact, Charcoal, sans-serif',
		),
		'josefin-sans' => array(
			'value' => 'josefin-sans',
			'label' => '"Josefin Sans", sans-serif',
		),
		'lato' => array(
			'value' => 'lato',
			'label' => '"Lato", sans-serif',
		),
		'lucida-sans-unicode' => array(
			'value' => 'lucida-sans-unicode',
			'label' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		),
		'lucida-grande' => array(
			'value' => 'lucida-grande',
			'label' => '"Lucida Grande", "Lucida Sans Unicode", sans-serif',
		),
		'lobster' => array(
			'value' => 'lobster',
			'label' => '"Lobster", sans-serif',
		),
		'lora' => array(
			'value' => 'lora',
			'label' => '"Lora", serif',
		),
		'monaco' => array(
			'value' => 'monaco',
			'label' => 'Monaco, Consolas, "Lucida Console", monospace, sans-serif',
		),
		'montserrat' => array(
			'value' => 'montserrat',
			'label' => '"Montserrat", sans-serif',
		),
		'nobile' => array(
			'value' => 'nobile',
			'label' => '"Nobile", sans-serif',
		),
		'noto-serif' => array(
			'value' => 'noto-serif',
			'label' => '"Noto Serif", serif',
		),
		'neuton' => array(
			'value' => 'neuton',
			'label' => '"Neuton", serif',
		),
		'open-sans' => array(
			'value' => 'open-sans',
			'label' => '"Open Sans", sans-serif',
		),
		'oswald' => array(
			'value' => 'oswald',
			'label' => '"Oswald", sans-serif',
		),
		'palatino' => array(
			'value' => 'palatino',
			'label' => 'Palatino, "Palatino Linotype", "Book Antiqua", serif',
		),
		'patua-one' => array(
			'value' => 'patua-one',
			'label' => '"Patua One", sans-serif',
		),
		'playfair-display' => array(
			'value' => 'playfair-display',
			'label' => '"Playfair Display", sans-serif',
		),
		'pt-sans' => array(
			'value' => 'pt-sans',
			'label' => '"PT Sans", sans-serif',
		),
		'pt-serif' => array(
			'value' => 'pt-serif',
			'label' => '"PT Serif", serif',
		),
		'quattrocento-sans' => array(
			'value' => 'quattrocento-sans',
			'label' => '"Quattrocento Sans", sans-serif',
		),
		'roboto' => array(
			'value' => 'roboto',
			'label' => '"Roboto", sans-serif',
		),
		'roboto-slab' => array(
			'value' => 'roboto-slab',
			'label' => '"Roboto Slab", serif',
		),
		'rubik' => array(
			'value' => 'rubik',
			'label' => '"Rubik", serif',
		),
		'sans-serif' => array(
			'value' => 'sans-serif',
			'label' => 'Sans Serif, Arial',
		),
		'source-sans-pro' => array(
			'value' => 'source-sans-pro',
			'label' => '"Source Sans Pro", sans-serif',
		),
		'tahoma' => array(
			'value' => 'tahoma',
			'label' => 'Tahoma, Geneva, sans-serif',
		),
		'trebuchet-ms' => array(
			'value' => 'trebuchet-ms',
			'label' => '"Trebuchet MS", "Helvetica", sans-serif',
		),
		'times-new-roman' => array(
			'value' => 'times-new-roman',
			'label' => '"Times New Roman", Times, serif',
		),
		'ubuntu' => array(
			'value' => 'ubuntu',
			'label' => '"Ubuntu", sans-serif',
		),
		'varela' => array(
			'value' => 'varela',
			'label' => '"Varela", sans-serif',
		),
		'verdana' => array(
			'value' => 'verdana',
			'label' => 'Verdana, Geneva, sans-serif',
		),
		'yanone-kaffeesatz' => array(
			'value' => 'yanone-kaffeesatz',
			'label' => '"Yanone Kaffeesatz", sans-serif',
		),
	);

	return apply_filters( 'simple_persona_avaliable_fonts', $avaliable_fonts );
}

if( ! function_exists( 'simple_persona_scroll_plugins_inactive' ) ) :
	/**
	* Return true if infinite scroll functionality exists
	*
	* @since Simple Persona 0.1
	*/
	function simple_persona_scroll_plugins_inactive( $control ) {
		if ( ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) || class_exists( 'Catch_Infinite_Scroll' ) ) {
			// Support infinite scroll plugins.
			return false;
		}

		return true;
	}
endif;
