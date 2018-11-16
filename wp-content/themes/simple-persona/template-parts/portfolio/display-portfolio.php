<?php
/**
 * The template for displaying portfolio items
 *
 * @package Simple Persona
 */
?>

<?php
$enable = get_theme_mod( 'simple_persona_portfolio_option', 'disabled' );

if ( ! simple_persona_check_section( $enable ) ) {
	// Bail if portfolio section is disabled.
	return;
}

$title     = get_theme_mod( 'simple_persona_portfolio_headline', esc_html__( 'Portfolio', 'simple-persona' ) );
$sub_title = get_theme_mod( 'simple_persona_portfolio_subheadline', esc_html__( 'My recent works', 'simple-persona' ) );

	$title     = get_option( 'jetpack_portfolio_title', esc_html__( 'Projects', 'simple-persona' ) );
	$sub_title = get_option( 'jetpack_portfolio_content' );

$classes[] = 'section';

$classes[] = get_theme_mod( 'simple_persona_portfolio_content_layout', 'layout-three' );
?>
<div id="portfolio-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( '' != $title || $sub_title ) : ?>
			<div class="section-heading-wrap">
				<?php if ( '' != $title ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post( $title ); ?></h2>
				<?php endif; ?>

				<?php if ( $sub_title ) : ?>
					<p class="section-subtitle"><?php echo wp_kses_post( $sub_title ); ?></p>
				<?php endif; ?>
			</div><!-- .section-heading-wrap -->
		<?php endif; ?>

		<div class="section-content-wrap grid">
			<?php
				get_template_part( 'template-parts/portfolio/post-types', 'portfolio' );
			?>
		</div><!-- .section-content-wrap -->

		<?php
			$target = get_theme_mod( 'simple_persona_portfolio_target' ) ? '_blank': '_self';
			$link   = get_theme_mod( 'simple_persona_portfolio_link', '#' );
			$text   = get_theme_mod( 'simple_persona_portfolio_text', esc_html__( 'View More', 'simple-persona' ) );

			if ( $text ) :
		?>
			<p class="view-more">
				<a class="button" target="<?php echo $target; ?>" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $text ); ?></a>
			</p>
		<?php endif; ?>
	</div><!-- .wrapper -->
</div><!-- #portfolio-section -->
