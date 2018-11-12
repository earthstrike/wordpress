<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simple Persona
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<div class="hentry-inner">
		<?php simple_persona_archive_image(); ?>

		<div class="entry-container">
			<header class="entry-header">
				<?php if ( is_sticky() ) { ?>
					<span class="sticky-label"><?php esc_html_e( 'Featured', 'simple-persona' ); ?></span>
				<?php } ?>

				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php simple_persona_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				$archive_layout = get_theme_mod( 'simple_persona_content_layout', 'excerpt-image-left' );

				if ( 'full-content-image-top' === $archive_layout || 'full-content' === $archive_layout ) {
					/* translators: %s: Name of current post. Only visible to screen readers */
					the_content( sprintf(
						wp_kses(

							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'simple-persona' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-persona' ),
						'after'  => '</div>',
					) );
				} else {
					the_excerpt();
				}
				?>
			</div><!-- .entry-content -->
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
