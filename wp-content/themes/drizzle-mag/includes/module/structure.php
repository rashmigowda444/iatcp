<?php
/**
 * Theme functions related to structure.
 *
 * @package drizzle_mag
 */

if ( ! function_exists( 'drizzle_mag_doctype' ) ) :

	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_doctype() {
		?><!DOCTYPE html><html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'drizzle_mag_action_doctype', 'drizzle_mag_doctype', 10 );

if ( ! function_exists( 'drizzle_mag_head' ) ) :

	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open() ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;

add_action( 'drizzle_mag_action_head', 'drizzle_mag_head', 10 );

if ( ! function_exists( 'drizzle_mag_page_start' ) ) :

	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_page_start() {
		?><div id="page" class="hfeed site"><?php
	}
endif;

add_action( 'drizzle_mag_action_before', 'drizzle_mag_page_start' );

if ( ! function_exists( 'drizzle_mag_page_end' ) ) :

	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_page_end() {
		?></div><!-- #page --><?php
	}
endif;

add_action( 'drizzle_mag_action_after', 'drizzle_mag_page_end' );

if ( ! function_exists( 'drizzle_mag_content_start' ) ) :

	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_content_start() {
		?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
	}
endif;

add_action( 'drizzle_mag_action_before_content', 'drizzle_mag_content_start' );

if ( ! function_exists( 'drizzle_mag_content_end' ) ) :

	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_content_end() {
		?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php
	}
endif;

add_action( 'drizzle_mag_action_after_content', 'drizzle_mag_content_end', 10 );

if ( ! function_exists( 'drizzle_mag_header_start' ) ) :

	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_header_start() {
		?><header id="masthead" class="site-header" role="banner"><div class="container"><?php
	}
endif;

add_action( 'drizzle_mag_action_before_header', 'drizzle_mag_header_start' );

if ( ! function_exists( 'drizzle_mag_header_end' ) ) :

	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_header_end() {
		?></div><!-- .container --></header><!-- #masthead --><?php
	}
endif;

add_action( 'drizzle_mag_action_after_header', 'drizzle_mag_header_end' );

if ( ! function_exists( 'drizzle_mag_footer_start' ) ) :

	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_footer_start() {
		$footer_status = apply_filters( 'drizzle_mag_filter_footer_status', true );

		if ( true !== $footer_status ) {
			return;
		}

		?><footer id="colophon" class="site-footer" role="contentinfo"><div class="container"><?php
	}
endif;

add_action( 'drizzle_mag_action_before_footer', 'drizzle_mag_footer_start' );

if ( ! function_exists( 'drizzle_mag_footer_end' ) ) :

	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_footer_end() {
		$footer_status = apply_filters( 'drizzle_mag_filter_footer_status', true );

		if ( true !== $footer_status ) {
			return;
		}

		?></div><!-- .container --></footer><!-- #colophon --><?php
	}
endif;

add_action( 'drizzle_mag_action_after_footer', 'drizzle_mag_footer_end' );
