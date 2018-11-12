<?php
/**
 * Simple Persona functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Simple Persona
 */

if ( ! function_exists( 'simple_persona_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function simple_persona_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Simple Persona, use a find and replace
		 * to change 'simple-persona' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'simple-persona', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'assets/css/editor-style.css', simple_persona_fonts_url() ) );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 470, 470, true ); // Ratio 1:1

		// Used in portfolio
		add_image_size( 'simple-persona-archive-top', 990, 557, true ); // Ratio 16:9

		// Used in Archive: Excerpt image top and Full content image top
		add_image_size( 'simple-persona-archive-top', 990, 557 ); // Ratio 16:9

		// Used in hero content
		add_image_size( 'simple-persona-hero', 592, 592, true ); // Ratio 1:1

		// Used in featured content
		add_image_size( 'simple-persona-featured', 697, 392, true ); // Ratio 16:9

		// Used in featured slider
		add_image_size( 'simple-persona-slider', 1920, 884, true );

		// Used in testimonials
		add_image_size( 'simple-persona-testimonial', 180, 180, true ); // Ratio 1:1


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'      => esc_html__( 'Primary', 'simple-persona' ),
			'social-menu' => esc_html__( 'Social Menu', 'simple-persona' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'simple_persona_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	}
endif;
add_action( 'after_setup_theme', 'simple_persona_setup' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 */
function simple_persona_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-2' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-4' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-5' ) ) {
		$count++;
	}

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class ) {
		echo 'class="widget-area footer-widget-area ' . esc_attr( $class ) . '"';
	}
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simple_persona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simple_persona_content_width', 990 );
}
add_action( 'after_setup_theme', 'simple_persona_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simple_persona_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simple-persona' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'simple-persona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'simple-persona' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'simple-persona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'simple-persona' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'simple-persona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'simple-persona' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'simple-persona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	if ( class_exists( 'Catch_Instagram_Feed_Gallery_Widget' ) ||  class_exists( 'Catch_Instagram_Feed_Gallery_Widget_Pro' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Instagram', 'simple-persona' ),
			'id'            => 'sidebar-instagram',
			'description'   => esc_html__( 'Appears above footer. This sidebar is only for Widget from plugin Catch Instagram Feed Gallery Widget and Catch Instagram Feed Gallery Widget Pro', 'simple-persona' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'simple_persona_widgets_init' );

if ( ! function_exists( 'simple_persona_fonts_url' ) ) :
	/**
	 * Register Google fonts for Simple Persona
	 *
	 * Create your own simple_persona_fonts_url() function to override in a child theme.
	 *
	 * @since Simple Persona 0.1
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function simple_persona_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by PT Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'PT Sans font: on or off', 'simple-persona' ) ) {
			$fonts[] = 'PT Sans:400,700,900,400italic,700italic,900italic';
		}

		/* translators: If there are characters in your language that are not supported by Open Sans Display, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'simple-persona' ) ) {
			$fonts[] = 'Open Sans:400,700,900,400italic,700italic,900italic';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return esc_url( $fonts_url );
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Simple Persona 0.1
 */
function simple_persona_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'simple_persona_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function simple_persona_scripts() {
	wp_enqueue_style( 'simple-persona-fonts', simple_persona_fonts_url(), array(), null );

	wp_enqueue_style( 'simple-persona-style', get_stylesheet_uri() );

	wp_enqueue_script( 'simple-persona-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20180103', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight.min.js', array( 'jquery' ), '20180103', true );

	$deps[] = 'jquery';

	$enable = get_theme_mod( 'simple_persona_featured_content_option', 'homepage' );

	if ( simple_persona_check_section( $enable ) ) {
		$deps[] = 'jquery-match-height';
	}

	$enable = get_theme_mod( 'simple_persona_portfolio_option', 'homepage' );

	if ( simple_persona_check_section( $enable ) ) {
		$deps[] = 'jquery-masonry';
	}

	wp_enqueue_script( 'simple-persona-script', get_template_directory_uri() . '/assets/js/functions.min.js', $deps, '20180103', true );

	wp_localize_script( 'simple-persona-script', 'personaScreenReaderText', array(
		'expand'   => esc_html__( 'expand child menu', 'simple-persona' ),
		'collapse' => esc_html__( 'collapse child menu', 'simple-persona' ),
		'icon'     => simple_persona_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	) );

	//Slider Scripts
	$enable_slider       = simple_persona_check_section( get_theme_mod( 'simple_persona_slider_option', 'disabled' ) );
	$enable_testimonial  = get_theme_mod( 'simple_persona_testimonial_option', 'homepage' );

	$enable_testimonial_slider = get_theme_mod( 'simple_persona_testimonial_slider', 1 );

	$testimonial_slider = simple_persona_check_section( $enable_testimonial ) && $enable_testimonial_slider;

	if ( $enable_slider || $testimonial_slider ) {
		wp_enqueue_script( 'jquery-cycle2', get_template_directory_uri() . '/assets/js/jquery.cycle/jquery.cycle2.min.js', array( 'jquery' ), '2.1.5', true );

		$transition_effects = array(
			get_theme_mod( 'simple_persona_slider_transition_effects', 'fade' ),
		);

		/**
		 * Condition checks for additional slider transition plugins
		 */
		// Scroll Vertical transition plugin addition.
		if ( in_array( 'scrollVert', $transition_effects, true ) ) {
			wp_enqueue_script( 'jquery-cycle2-scrollVert', get_template_directory_uri() . '/assets/js/jquery.cycle/jquery.cycle2.scrollVert.min.js', array( 'jquery-cycle2' ), '2.1.5', true );
		}

		// Flip transition plugin addition.
		if ( in_array( 'flipHorz', $transition_effects, true ) || in_array( 'flipVert', $transition_effects, true ) ) {
			wp_enqueue_script( 'jquery-cycle2-flip', get_template_directory_uri() . '/assets/js/jquery.cycle/jquery.cycle2.flip.min.js', array( 'jquery-cycle2' ), '2.1.5', true );
		}

		// Shuffle transition plugin addition.
		if ( in_array( 'tileSlide', $transition_effects, true ) || in_array( 'tileBlind', $transition_effects, true ) ) {
			wp_enqueue_script( 'jquery-cycle2-tile', get_template_directory_uri() . '/assets/js/jquery.cycle/jquery.cycle2.tile.min.js', array( 'jquery-cycle2' ), '2.1.5', true );
		}

		// Shuffle transition plugin addition.
		if ( in_array( 'shuffle', $transition_effects, true ) ) {
			wp_enqueue_script( 'jquery-cycle2-shuffle', get_template_directory_uri() . '/assets/js/jquery.cycle/jquery.cycle2.shuffle.min.js', array( 'jquery-cycle2' ), '2.1.5', true );
		}
	}

	// Enqueue fitvid if JetPack is not installed.
	if ( ! class_exists( 'Jetpack' ) ) {
		wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/assets/js/fitvids.min.js', array( 'jquery' ), '1.1', true );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_persona_scripts' );

if ( ! function_exists( 'simple_persona_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 *
	 * @since Simple Persona 0.1
	 */
	function simple_persona_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		// Getting data from Customizer Options
		$length	= get_theme_mod( 'simple_persona_excerpt_length', 30 );

		return absint( $length );
	}
endif; //simple_persona_excerpt_length
add_filter( 'excerpt_length', 'simple_persona_excerpt_length', 999 );

if ( ! function_exists( 'simple_persona_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a option from customizer
	 *
	 * @return string option from customizer prepended with an ellipsis.
	 */
	function simple_persona_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		$more_tag_text = get_theme_mod( 'simple_persona_excerpt_more_text',  esc_html__( 'Continue reading', 'simple-persona' ) );

		$link = sprintf( '<a href="%1$s" class="more-link"><span class="more-button">%2$s</span></a>',
			esc_url( get_permalink() ),
			/* translators: %s: Name of current post */
			wp_kses_data( $more_tag_text ). '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
			);

		return $link;
	}
endif;
add_filter( 'excerpt_more', 'simple_persona_excerpt_more' );

if ( ! function_exists( 'simple_persona_custom_excerpt' ) ) :
	/**
	 * Adds Continue reading link to more tag excerpts.
	 *
	 * function tied to the get_the_excerpt filter hook.
	 *
	 * @since Simple Persona 0.1
	 */
	function simple_persona_custom_excerpt( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$more_tag_text = get_theme_mod( 'simple_persona_excerpt_more_text', esc_html__( 'Continue reading', 'simple-persona' ) );

			$link = sprintf( '<a href="%1$s" class="more-link"><span class="more-button">%2$s</span></a>',
				esc_url( get_permalink() ),
				/* translators: %s: Name of current post */
				wp_kses_data( $more_tag_text ). '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
			);

			$link = ' &hellip; ' . $link;

			$output .= $link;
		}

		return $output;
	}
endif; //simple_persona_custom_excerpt
add_filter( 'get_the_excerpt', 'simple_persona_custom_excerpt' );

if ( ! function_exists( 'simple_persona_more_link' ) ) :
	/**
	 * Replacing Continue reading link to the_content more.
	 *
	 * function tied to the the_content_more_link filter hook.
	 *
	 * @since Simple Persona 0.1
	 */
	function simple_persona_more_link( $more_link, $more_link_text ) {
		$more_tag_text = get_theme_mod( 'simple_persona_excerpt_more_text', esc_html__( 'Continue reading', 'simple-persona' ) );

		return ' &hellip; ' . str_replace( $more_link_text, wp_kses_data( $more_tag_text ), $more_link );
	}
endif; //simple_persona_more_link
add_filter( 'the_content_more_link', 'simple_persona_more_link', 10, 2 );

/**
 * SVG icons functions and filters
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Implement the Custom Header feature
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Color Scheme additions
 */
require get_template_directory() . '/inc/header-background-color.php';

/**
 * Include Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Include Slider
 */
require get_template_directory() . '/inc/featured-slider.php';

/**
 * Load Jetpack compatibility file
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Metabox
 */
require get_template_directory() . '/inc/metabox/metabox.php';

/**
 * Load Social Widgets
 */
require get_template_directory() . '/inc/widget-social-icons.php';

/**
 * Load TGMPA
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function simple_persona_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// Catch Web Tools.
		array(
			'name' => 'Catch Web Tools', // Plugin Name, translation not required.
			'slug' => 'catch-web-tools',
		),
		// Catch IDs
		array(
			'name' => 'Catch IDs', // Plugin Name, translation not required.
			'slug' => 'catch-ids',
		),
		// To Top.
		array(
			'name' => 'To top', // Plugin Name, translation not required.
			'slug' => 'to-top',
		),
		// Catch Gallery.
		array(
			'name' => 'Catch Gallery', // Plugin Name, translation not required.
			'slug' => 'catch-gallery',
		),
	);

	if ( ! class_exists( 'Catch_Infinite_Scroll_Pro' ) ) {
		$plugins[] = array(
			'name' => 'Catch Infinite Scroll', // Plugin Name, translation not required.
			'slug' => 'catch-infinite-scroll',
		);
	}

	if ( ! class_exists( 'Essential_Content_Types_Pro' ) ) {
		$plugins[] = array(
			'name' => 'Essential Content Types', // Plugin Name, translation not required.
			'slug' => 'essential-content-types',
		);
	}

	if ( ! class_exists( 'Essential_Widgets_Pro' ) ) {
		$plugins[] = array(
			'name' => 'Essential Widgets', // Plugin Name, translation not required.
			'slug' => 'essential-widgets',
		);
	}

	if ( ! class_exists( 'Catch_Instagram_Feed_Gallery_Widget_Pro' ) ) {
		$plugins[] = array(
			'name' => 'Catch Instagram Feed Gallery & Widget', // Plugin Name, translation not required.
			'slug' => 'catch-instagram-feed-gallery-widget',
		);
	}

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'simple-persona',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'simple_persona_register_required_plugins' );
