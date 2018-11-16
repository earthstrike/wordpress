<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package Simple Persona
 */
?>

<?php
$show_content = get_theme_mod( 'simple_persona_featured_content_show', 'excerpt' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-wrap">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
		<?php
		// Output the featured image.
		if ( has_post_thumbnail() ) {

			$thumbnail = 'simple-persona-featured';

			the_post_thumbnail( $thumbnail );
		} else {
			if ( 'layout-one' === $layout ) {
				echo '<img src="' . esc_url( trailingslashit( get_template_directory_uri() ) ) . 'assets/images/no-thumb-1920x954.jpg"/>';
			} else {
				echo '<img src="' . esc_url( trailingslashit( get_template_directory_uri() ) ) . 'assets/images/no-thumb-697x392.jpg"/>';
			}
		}
		?>
		</a>

		<div class="entry-container">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>' ); ?>
			</header>
			<?php
			if ( 'excerpt' === $show_content ) {
				$excerpt = get_the_excerpt();

				echo '<div class="entry-summary"><p>' . $excerpt . '</p></div><!-- .entry-summary -->';
			} elseif ( 'full-content' === $show_content ) {
				$content = apply_filters( 'the_content', get_the_content() );
				$content = str_replace( ']]>', ']]&gt;', $content );
				echo '<div class="entry-content">' . wp_kses_post( $content ) . '</div><!-- .entry-content -->';
			} ?>
		</div><!-- .entry-container -->
	</div><!-- .inner-wrap -->
</article>
