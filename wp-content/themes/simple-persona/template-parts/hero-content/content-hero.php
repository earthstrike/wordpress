<?php
/**
 * The template used for displaying hero content
 *
 * @package Simple Persona
 */

$enable_section = get_theme_mod( 'simple_persona_hero_content_visibility', 'disabled' );

if ( ! simple_persona_check_section( $enable_section ) ) {
	// Bail if hero content is not enabled
	return;
}

if ( $id = get_theme_mod( 'simple_persona_hero_content' ) ) {
	$args['page_id'] = absint( $id );
}

// If $args is empty return false
if ( empty( $args ) ) {
	return;
}

// Create a new WP_Query using the argument previously created
$hero_query = new WP_Query( $args );
if ( $hero_query->have_posts() ) :
	while ( $hero_query->have_posts() ) :
		$hero_query->the_post();
		?>
		<div id="hero-section" class="hero-section section content-align-left">
			<div class="wrapper">
				<div class="section-content-wrap">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="hentry-inner">

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<a class="cover-link" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'simple-persona-hero' ); ?>
								</a>
							</div><!-- .post-thumbnail -->
							<div class="entry-container">
						<?php else : ?>
							<div class="entry-container full-width">
						<?php endif; ?>
							<?php
								if ( ! get_theme_mod( 'simple_persona_disable_hero_content_title' ) ) {
									$title = $title . get_the_title();
								}

							if ( $title ) : ?>
								<header class="entry-header">
									<h2 class="entry-title ">
										<?php echo wp_kses_post( $title ); ?>
									</h2>
								</header><!-- .entry-header -->
							<?php endif; ?>

							<div class="entry-content">
								<?php

									$show_content = get_theme_mod( 'simple_persona_hero_content_show', 'full-content' );
									if ( 'full-content' === $show_content ) {
										the_content();
									} elseif ( 'excerpt' === $show_content ) {
										the_excerpt();
									}

									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'simple-persona' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span class="page-number">',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'simple-persona' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									) );
								?>
							</div><!-- .entry-content -->

							<?php if ( get_edit_post_link() ) : ?>
								<footer class="entry-footer">
									<?php
										edit_post_link(
											sprintf(
												/* translators: %s: Name of current post */
												esc_html__( 'Edit %s', 'simple-persona' ),
												the_title( '<span class="screen-reader-text">"', '"</span>', false )
											),
											'<span class="edit-link">',
											'</span>'
										);
									?>
								</footer><!-- .entry-footer -->
							<?php endif; ?>
						</div><!-- .hentry-inner -->
					</article>
				</div><!-- .section-content-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .section -->
	<?php
	endwhile;

	wp_reset_postdata();
endif;
