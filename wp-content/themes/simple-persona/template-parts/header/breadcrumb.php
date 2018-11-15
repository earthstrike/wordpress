<?php
/**
 * Display Breadcrumb
 *
 * @package Simple Persona
 */
?>

<?php

if ( get_theme_mod( 'simple_persona_breadcrumb_option', 1 ) ) {
	// Bail if breadcrumb is disabled.
	simple_persona_breadcrumb();
}
