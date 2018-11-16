<?php
/**
 * The template used for displaying projects on index view
 *
 * @package Simple Persona
 */
?>

<?php
$layout       = get_theme_mod( 'simple_persona_portfolio_content_layout', 'layout-three' );
?>

<article id="portfolio-post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<div class="portfolio-content-image featured-image">
		<?php
			// Output the featured image.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'simple-persona-portfolio' );
			} else {
				echo '<img src="' . esc_url( trailingslashit( get_template_directory_uri() ) ) . 'assets/images/no-thumb-660x660.jpg"/>';
			}
		?>
	</div><!-- .portfolio-thumbnail -->

	<div class="entry-container caption">
		<div class="inner-wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<div class="entry-meta">
					<?php simple_persona_cat_list(); ?>
				</div>
			</header>

			<div class="entry-content">
				<a class="more-link" href="<?php the_permalink(); ?>">
					<span class="more-button"><?php echo wp_kses_post( get_theme_mod( 'simple_persona_excerpt_more_text', esc_html__( 'Continue reading...', 'simple-persona' ) ) ); ?></span>
				</a>
			</div>
		</div>
	</div><!-- .entry-container -->
</article>
