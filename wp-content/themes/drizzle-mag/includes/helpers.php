<?php
/**
 * Helper functions.
 *
 * @package drizzle_mag
 */

if ( ! function_exists( 'drizzle_mag_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function drizzle_mag_get_global_layout_options() {
		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'drizzle-mag' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'drizzle-mag' ),
			'three-columns' => esc_html__( 'Three Columns', 'drizzle-mag' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'drizzle-mag' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'drizzle_mag_get_site_layout_options' ) ) :

	/**
	 * Returns site layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function drizzle_mag_get_site_layout_options() {
		$choices = array(
			'fluid' => esc_html__( 'Fluid', 'drizzle-mag' ),
			'boxed' => esc_html__( 'Boxed', 'drizzle-mag' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'drizzle_mag_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function drizzle_mag_get_breadcrumb_type_options() {
		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'drizzle-mag' ),
			'enabled'  => esc_html__( 'Enabled', 'drizzle-mag' ),
		);
		return $choices;
	}

endif;


if ( ! function_exists( 'drizzle_mag_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function drizzle_mag_get_archive_layout_options() {
		$choices = array(
			'full'    => esc_html__( 'Full Post', 'drizzle-mag' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'drizzle-mag' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'drizzle_mag_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable    True for adding No Image option.
	 * @param array $allowed        Allowed image size options.
	 * @param bool  $show_dimension True for showing dimension.
	 * @return array Image size options.
	 */
	function drizzle_mag_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;

		$choices = array();

		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'drizzle-mag' );
		}

		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'drizzle-mag' );
		$choices['medium']    = esc_html__( 'Medium', 'drizzle-mag' );
		$choices['large']     = esc_html__( 'Large', 'drizzle-mag' );
		$choices['full']      = esc_html__( 'Full (original)', 'drizzle-mag' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ) {
					$choices[ $key ] .= ' (' . $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed, true ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'drizzle_mag_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function drizzle_mag_get_image_alignment_options() {
		$choices = array(
			'none'   => esc_html_x( 'None', 'alignment', 'drizzle-mag' ),
			'left'   => esc_html_x( 'Left', 'alignment', 'drizzle-mag' ),
			'center' => esc_html_x( 'Center', 'alignment', 'drizzle-mag' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'drizzle-mag' ),
		);
		return $choices;
	}

endif;
