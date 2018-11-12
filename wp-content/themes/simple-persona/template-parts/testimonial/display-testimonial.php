<?php
/**
 * The template for displaying testimonial items
 *
 * @package Simple Persona
 */
?>

<?php
$enable = get_theme_mod( 'simple_persona_testimonial_option', 'disabled' );

if ( ! simple_persona_check_section( $enable ) ) {
	// Bail if featured content is disabled
	return;
}


// Get Jetpack options for testimonial.
$jetpack_defaults = array(
	'page-title' => esc_html__( 'Testimonials', 'simple-persona' ),
);

// Get Jetpack options for testimonial.
$jetpack_options = get_theme_mod( 'jetpack_testimonials', $jetpack_defaults );

$headline = isset( $jetpack_options['page-title'] ) ? $jetpack_options['page-title'] : esc_html__( 'Testimonials', 'simple-persona' );

$subheadline = isset( $jetpack_options['page-content'] ) ? $jetpack_options['page-content'] : '';

$classes[] = 'section testimonial-section';

$classes[] = 'layout-one';

if ( ! $headline && ! $subheadline ) {
	$classes[] = 'no-headline';
}

?>

<div id="testimonial-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( $headline || $subheadline ) : ?>
		<div class="section-heading-wrap">
			<?php if ( $headline ) : ?>
			<h2 class="section-title"><?php echo wp_kses_post( $headline ); ?></h2>
			<?php endif; ?>

			<?php if ( $subheadline ) : ?>
			<p class="section-subtitle"><?php echo wp_kses_post( $subheadline ); ?></p>
			<?php endif; ?>
		</div><!-- .section-heading-wrap -->
		<?php endif; ?>

		<div class="section-content-wrap">
			<!-- prev/next links -->
			<div id="content-controls">
				<button class="cycle-prev" aria-label="<?php esc_attr_e( 'Previous', 'simple-persona' ); ?>"><?php echo simple_persona_get_svg( array( 'icon' => 'angle-down' ) ); ?><span class="screen-reader-text"><?php esc_html_e( 'Previous Slide', 'simple-persona' ); ?></span></button>
				<button class="cycle-next" aria-label="<?php esc_attr_e( 'Next', 'simple-persona' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Next Slide', 'simple-persona' ); ?></span><?php echo simple_persona_get_svg( array( 'icon' => 'angle-down' ) ); ?></button>
			</div><!-- #content-controls -->

			<div class="cycle-slideshow"
				data-cycle-log="false"
				data-cycle-pause-on-hover="true"
				data-cycle-swipe="true"
				data-cycle-auto-height=container
				data-cycle-loader=false
				data-cycle-slides=".testimonial_slider_wrap"
				>

				<!-- empty element for pager links -->
				<div class="cycle-pager"></div>

			<?php
			get_template_part( 'template-parts/testimonial/post-types', 'testimonial' );
			?>
			</div><!-- .cycle-slideshow -->
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- .testimonial-section -->
