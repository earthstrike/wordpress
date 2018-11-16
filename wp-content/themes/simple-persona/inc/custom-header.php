<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Simple Persona
 */

if ( ! function_exists( 'simple_persona_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see simple_persona_custom_header_setup().
	 */
	function simple_persona_header_style() {
		$header_image = simple_persona_featured_overall_image();

	    if ( $header_image ) : ?>
	        <style type="text/css" rel="header-image">
	            .custom-header:before {
	                background-image: url(<?php echo esc_url( $header_image ); ?>);
					background-position: center top;
					background-repeat: no-repeat;
					background-size: cover;
	            }
	        </style>
	    <?php
	    endif;

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;

if ( ! function_exists( 'simple_persona_featured_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own simple_persona_featured_image(), and that function will be used instead.
	 *
	 * @since Simple Persona 0.1
	 */
	function simple_persona_featured_image() {
		$thumbnail = 'simple-persona-slider';

		if ( is_post_type_archive( 'jetpack-testimonial' ) ) {
			$jetpack_options = get_theme_mod( 'jetpack_testimonials' );

			if ( isset( $jetpack_options['featured-image'] ) && '' !== $jetpack_options['featured-image'] ) {
				$image = wp_get_attachment_image_src( (int) $jetpack_options['featured-image'], $thumbnail );
				return $image['0'];
			} else {
				return false;
			}
		} elseif ( is_post_type_archive( 'jetpack-portfolio' ) || is_post_type_archive( 'featured-content' ) || is_post_type_archive( 'ect-service' ) ) {
			$option = '';

			if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
				$option = 'jetpack_portfolio_featured_image';
			} elseif ( is_post_type_archive( 'featured-content' ) ) {
				$option = 'featured_content_featured_image';
			} elseif ( is_post_type_archive( 'ect-service' ) ) {
				$option = 'ect_service_featured_image';
			}

			$featured_image = get_option( $option );

			if ( '' !== $featured_image ) {
				$image = wp_get_attachment_image_src( (int) $featured_image, $thumbnail );
				return $image[0];
			} else {
				return get_header_image();
			}
		} elseif ( is_header_video_active() && has_header_video() ) {
			return true;
		} else {
			return get_header_image();
		}
	} // simple_persona_featured_image
endif;

if ( ! function_exists( 'simple_persona_featured_page_post_image' ) ) :
	/**
	 * Template for Featured Header Image from Post and Page
	 *
	 * To override this in a child theme
	 * simply create your own simple_persona_featured_imaage_pagepost(), and that function will be used instead.
	 *
	 * @since Simple Persona 0.1
	 */
	function simple_persona_featured_page_post_image() {

		if ( is_home() && $blog_id = get_option('page_for_posts') ) {  
        return get_the_post_thumbnail_url( $blog_id, 'simple-persona-slider' );  
      } 
       elseif ( ! has_post_thumbnail() ) { 
			return simple_persona_featured_image();
		}

		$thumbnail = 'simple-persona-slider';

			return get_the_post_thumbnail_url( get_the_id(), $thumbnail );
	} // simple_persona_featured_page_post_image
endif;


if ( ! function_exists( 'simple_persona_featured_overall_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own simple_persona_featured_pagepost_image(), and that function will be used instead.
	 *
	 * @since Simple Persona 0.1
	 */
	function simple_persona_featured_overall_image() {
		global $post;
		$enable = get_theme_mod( 'simple_persona_header_media_option', 'entire-site-page-post' );

		// Check Enable/Disable header image in Page/Post Meta box
		if ( is_singular() ) {
			//Individual Page/Post Image Setting
			$individual_featured_image = get_post_meta( $post->ID, 'simple-persona-header-image', true );

			if ( 'disable' === $individual_featured_image || ( 'default' === $individual_featured_image && 'disable' === $enable ) ) {
				return;
			} elseif ( 'enable' == $individual_featured_image && 'disable' === $enable ) {
				return simple_persona_featured_page_post_image();
			}
		}

		// Check Homepage
		if ( 'homepage' === $enable ) {
			if ( is_front_page() ) {
				return simple_persona_featured_image();
			}
		} elseif ( 'exclude-home' === $enable ) {
			// Check Excluding Homepage
			if ( ! is_front_page() ) {
				return simple_persona_featured_image();
			}
		} elseif ( 'exclude-home-page-post' === $enable ) {
			if ( is_front_page() ) {
				return false;
			} elseif ( is_singular() ) {
				return simple_persona_featured_page_post_image();
			} else {
				return simple_persona_featured_image();
			}
		} elseif ( 'entire-site' === $enable ) {
			// Check Entire Site
			return simple_persona_featured_image();
		} elseif ( 'entire-site-page-post' === $enable ) {
			// Check Entire Site (Post/Page)
			if ( is_singular() || ( is_home() && ! is_front_page() ) ) {
				return simple_persona_featured_page_post_image();
			} else {
				return simple_persona_featured_image();
			}
		} elseif ( 'pages-posts' === $enable ) {
			// Check Page/Post
			if ( is_singular() ) {
				return simple_persona_featured_page_post_image();
			}
		}

		return false;
	} // simple_persona_featured_overall_image
endif;

if ( ! function_exists( 'simple_persona_header_media_text' ) ):
	/**
	 * Display Header Media Text
	 *
	 * @since Simple Persona 0.1
	 */
	function simple_persona_header_media_text() {
		if ( ! simple_persona_has_header_media_text() ) {
			// Bail early if header media text is disabled on front page
			return false;
		}
		?>
		<div class="custom-header-content sections header-media-section">
			<?php simple_persona_header_title( '<h2 class="entry-title">', '</h2>' ); ?>

			<?php simple_persona_header_description( '<div class="site-header-text">', '</div>' ); ?>

			<?php if ( is_front_page() ) :
				$header_media_title    = get_theme_mod( 'simple_persona_header_media_title', esc_html__( 'Header Media', 'simple-persona' ) );
				$header_media_url      = get_theme_mod( 'simple_persona_header_media_url', '#' );
				$header_media_url_text = get_theme_mod( 'simple_persona_header_media_url_text', esc_html__( 'More', 'simple-persona' ) );
			?>

				<?php if ( $header_media_url_text ) : ?>
					<span class="more-link">
						<a href="<?php echo esc_url( $header_media_url ); ?>" target="<?php echo get_theme_mod( 'simple_persona_header_url_target' ) ? '_blank' : '_self'; ?>" class="readmore button"><?php echo esc_html( $header_media_url_text ); ?><span class="screen-reader-text"><?php echo wp_kses_post( $header_media_title ); ?></span></a>
					</span>
				<?php endif; ?>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/header/breadcrumb' ); ?>
		</div><!-- .custom-header-content -->
		<?php
	} // simple_persona_header_media_text.
endif;

if ( ! function_exists( 'simple_persona_has_header_media_text' ) ):
	/**
	 * Return Header Media Text fro front page
	 *
	 * @since Simple Personal Trainer 0.1
	 */
	function simple_persona_has_header_media_text() {
		$header_media_title    = get_theme_mod( 'simple_persona_header_media_title', esc_html__( 'Header Media', 'simple-persona' ) );
		$header_media_text     = get_theme_mod( 'simple_persona_header_media_text', esc_html__( 'Go to Theme Customizer', 'simple-persona' ) );
		$header_media_url      = get_theme_mod( 'simple_persona_header_media_url', '#' );
		$header_media_url_text = get_theme_mod( 'simple_persona_header_media_url_text', esc_html__( 'More', 'simple-persona' ) );

		if ( is_front_page() && ! $header_media_title && ! $header_media_text && ! $header_media_url && ! $header_media_url_text ) {
			// Bail early if header media text is disabled
			return false;
		}

		return true;
	} // simple_persona_has_header_media_text.
endif;

if ( ! function_exists( 'simple_persona_header_title' ) ) :
	/**
	 * Display header media text
	 */
	function simple_persona_header_title( $before = '', $after = '' ) {
		if ( is_front_page() ) {
			echo $before . wp_kses_post( get_theme_mod( 'simple_persona_header_media_title', esc_html__( 'Header Media', 'simple-persona' ) ) ) . $after;
		} elseif ( is_singular() ) {
			the_title( $before, $after );
		} elseif ( is_404() ) {
			echo $before . esc_html__( 'Nothing Found', 'simple-persona' ) . $after;
		} elseif ( is_search() ) {
			/* translators: %s: search query. */
			echo $before . sprintf( esc_html__( 'Search Results for: %s', 'simple-persona' ), '<span>' . get_search_query() . '</span>' ) . $after;
		} else {
			the_archive_title( $before, $after );
		}
	}
endif;

if ( ! function_exists( 'simple_persona_header_description' ) ) :
	/**
	 * Display header media description
	 */
	function simple_persona_header_description( $before = '', $after = '' ) {
		if ( is_front_page() ) {
			echo $before . '<p>' . wp_kses_post( get_theme_mod( 'simple_persona_header_media_text', esc_html__( 'Go to Theme Customizer', 'simple-persona' ) ) ) . '</p>' . $after;
		} elseif ( is_404() ) {
			echo $before . '<p>' . esc_html__( 'Oops! That page can&rsquo;t be found', 'simple-persona' ) . '</p>' . $after;
		} else {
			the_archive_description( $before, $after );
		}
	}
endif;

