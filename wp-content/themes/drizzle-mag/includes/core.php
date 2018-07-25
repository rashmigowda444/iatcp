<?php
/**
 * Core functions.
 *
 * @package drizzle_mag
 */

if ( ! function_exists( 'drizzle_mag_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function drizzle_mag_get_option( $key ) {

		$drizzle_mag_default_options = drizzle_mag_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$default = ( isset( $drizzle_mag_default_options[ $key ] ) ) ? $drizzle_mag_default_options[ $key ] : '';
		$theme_options = get_theme_mod( 'theme_options', $drizzle_mag_default_options );
		$theme_options = array_merge( $drizzle_mag_default_options, $theme_options );
		$value = '';

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;

if ( ! function_exists( 'drizzle_mag_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function drizzle_mag_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']            = true;
		$defaults['show_tagline']          = true;
		$defaults['show_social_in_header'] = false;
		$defaults['show_search_in_header'] = true;

		// Breaking News.
		$defaults['show_breaking_news']     = true;
		$defaults['breaking_news_text']     = esc_html__( 'Breaking News', 'drizzle-mag' );
		$defaults['breaking_news_category'] = '';
		$defaults['breaking_news_number']   = 4;

		// Featured News.
		$defaults['featured_news_status']   = true;
		$defaults['featured_news_category'] = '';

		// Layout.
		$defaults['site_layout']    = 'fluid';
		$defaults['global_layout']  = 'right-sidebar';
		$defaults['archive_layout'] = 'excerpt';

		// Single Post.
		$defaults['show_related_posts'] = true;

		// Footer.
		$defaults['copyright_text'] = esc_html__( 'Copyright &copy; All rights reserved.', 'drizzle-mag' );

		// Blog.
		$defaults['excerpt_length']     = 40;
		$defaults['exclude_categories'] = '';

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'enabled';

		return apply_filters( 'drizzle_mag_filter_default_theme_options', $defaults );
	}

endif;
