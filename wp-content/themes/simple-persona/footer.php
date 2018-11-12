<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple Persona
 */

?>
			</div><!-- .wrapper -->
		</div><!-- #content -->

		<?php get_theme_mod( 'simple_persona_events_position' ) ? get_template_part( 'template-parts/events/content', 'event' ) : ''; ?>

		<?php get_theme_mod( 'simple_persona_testimonial_position' ) ? get_template_part( 'template-parts/testimonial/display', 'testimonial' ) : ''; ?>

		<?php get_template_part( 'template-parts/footer/footer', 'instagram' ); ?>

		<footer id="colophon" class="site-footer">
			<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

			<div id="site-generator">
				<div class="wrapper">
					<?php get_template_part('template-parts/navigation/navigation', 'social'); ?>

					<?php get_template_part('template-parts/footer/site', 'info'); ?>
				</div><!-- .wrapper -->
			</div><!-- #site-generator -->
		</footer><!-- #colophon -->
	</div><!-- .below-site-header -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
