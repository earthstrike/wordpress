<?php
/**
 * The template for displaying featured content
 *
 * @package Simple Persona
 */
?>

<?php
$enable_content = get_theme_mod( 'simple_persona_featured_content_option', 'disabled' );

if ( ! simple_persona_check_section( $enable_content ) ) {
	// Bail if featured content is disabled.
	return;
}

$featured_posts = simple_persona_get_featured_posts();

if ( empty( $featured_posts ) ) {
	return;
}


$title     = get_option( 'featured_content_title', esc_html__( 'Contents', 'simple-persona' ) );
$sub_title = get_option( 'featured_content_content' );

$layout = get_theme_mod( 'simple_persona_featured_content_layout', 'layout-three' );

$classes[] = 'layout-three';
$classes[] = 'featured-content';
$classes[] = 'section';
?>

<div id="featured-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( '' !== $title || $sub_title ) : ?>
			<div class="section-heading-wrap">
				<?php if ( '' !== $title ) : ?>
						<h2 class="section-title"><?php echo wp_kses_post( $title ); ?></h2>
				<?php endif; ?>

				<?php if ( $sub_title ) : ?>
					<p class="section-subtitle">
						<?php echo wp_kses_post( $sub_title ); ?>
					</p>
				<?php endif; ?>
			</div><!-- .section-heading-wrap -->
		<?php endif; ?>

		<div class="section-content-wrap">

			<?php
			$slider = get_theme_mod( 'simple_persona_featured_content_slider', 1 );

			if ( $slider ) : ?>

			<!-- prev/next for SVG links -->
			<div id="content-controls">
				<button id="featured-content-slider-prev" class="cycle-prev" aria-label="<?php esc_attr_e( 'Previous', 'simple-persona' ); ?>"><?php echo simple_persona_get_svg( array( 'icon' => 'angle-down' ) ); ?><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'simple-persona' ); ?></span></button>
				<button id="featured-content-slider-next" class="cycle-next" aria-label="<?php esc_attr_e( 'Next', 'simple-persona' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Next', 'simple-persona' ); ?></span><?php echo simple_persona_get_svg( array( 'icon' => 'angle-down' ) ); ?></button>
			</div><!-- #content-controls -->

			<div class="cycle-slideshow"
					data-cycle-log="false"
					data-cycle-pause-on-hover="true"
					data-cycle-swipe="true"
					data-cycle-auto-height=container
					data-cycle-slides=".slider_wrap"
					data-cycle-loader="true"
					data-cycle-prev="#featured-content-slider-prev"
					data-cycle-next="#featured-content-slider-next"
					>

				<!-- empty element for pager links -->
				<div class="cycle-pager"></div>
			<?php endif; ?>


				<div class="slider_wrap">
					<?php
					$layout_num = 3;

						$i = 1;

					foreach ( $featured_posts as $post ) {
						setup_postdata( $post );

						// Include the featured content template.
						get_template_part( 'template-parts/featured-content/content', 'featured' );

						if ( 0 === $i % $layout_num ) {
							echo '
				</div><!-- .slider_wrap -->

				<div class="slider_wrap">';
							}

							$i++;

						wp_reset_postdata();
					}
					?>
				</div><!-- .slider_wrap -->

			<?php if ( $slider ) : ?>
			</div><!-- .cycle-slideshow -->
			<?php endif; ?>

			<?php
				$target = get_theme_mod( 'simple_persona_featured_content_target' ) ? '_blank': '_self';
				$link   = get_theme_mod( 'simple_persona_featured_content_link', '#' );
				$text   = get_theme_mod( 'simple_persona_featured_content_text', esc_html__( 'View More', 'simple-persona' ) );

				if ( $text ) :
			?>
				<p class="view-more">
					<a class="button" target="<?php echo $target; ?>" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $text ); ?></a>
				</p>
			<?php endif; ?>
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- #featured-content-section -->
