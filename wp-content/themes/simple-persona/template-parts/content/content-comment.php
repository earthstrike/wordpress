<?php
/**
 * Template part for displaying comments
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simple Persona
 */


$comment_select = get_theme_mod( 'simple_persona_comment_option', 'use-wordpress-setting' );

if ( 'use-wordpress-setting' === $comment_select  ) {
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || '0' != get_comments_number() ) {
		comments_template();
	}
} elseif ( 'disable-in-pages' === $comment_select  ) {
	// If comments are open and not in page or we have at least one comment, load up the comment template.
	if ( ! is_page() ) {
		if ( comments_open() || '0' != get_comments_number() ) {
			comments_template();
		}
	}
}
