<?php
/**
 * Displays primary navigation
 *
 */

?>
<div id="site-header-menu" class="site-header-menu">
	<div id="primary-menu-wrapper" class="menu-wrapper">
		<div class="menu-toggle-wrapper">
			<button id="primary-menu-toggle" class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
				<?php
					echo simple_persona_get_svg( array( 'icon' => 'bars' ) );
					echo simple_persona_get_svg( array( 'icon' => 'close' ) );
				?>

				<span class="menu-label"><?php echo esc_html_e( 'Menu', 'simple-persona' ); ?></span>
			</button>
		</div><!-- .menu-toggle-wrapper -->

		<div class="menu-inside-wrapper">
			<nav id="site-navigation" class="main-navigation custom-primary-menu" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'simple-persona' ); ?>">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_class'     => 'primary-menu',
					) );
				?>
			</nav><!-- .main-navigation -->

			<div class="mobile-social-search">
				<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'simple-persona' ); ?>">
					<div class="search-container">
						<?php get_search_form(); ?>
					</div>
					<?php get_template_part('template-parts/navigation/navigation', 'social'); ?>
				</nav><!-- .social-navigation -->
			</div><!-- .mobile-social-search -->
		</div><!-- .menu-inside-wrapper -->
	</div><!-- .menu-wrapper -->

	<div id="social-search-wrapper" class="menu-wrapper">
		<?php get_template_part('template-parts/navigation/navigation', 'social'); ?>

		<?php if ( ! get_theme_mod( 'simple_persona_primary_search_disable' ) ) : ?>
		<div class="menu-toggle-wrapper">
			<button id="social-search-toggle" class="menu-toggle">
				<?php
					echo simple_persona_get_svg( array( 'icon' => 'search' ) );
					echo simple_persona_get_svg( array( 'icon' => 'close' ) );
				?>
				<span class="screen-reader-text"><?php esc_html_e( 'Search', 'simple-persona' ); ?></span>
			</button>
		</div><!-- .menu-toggle-wrapper -->
		<?php endif; ?>

		<div class="menu-inside-wrapper">
			<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'simple-persona' ); ?>">
				<div class="search-container">
					<?php get_search_form(); ?>
				</div>
				<?php get_template_part('template-parts/navigation/navigation', 'social'); ?>
			</nav><!-- .social-navigation -->
  		</div><!-- .menu-inside-wrapper -->
  	</div><!-- .menu-wrapper -->
</div><!-- .site-header-menu -->
