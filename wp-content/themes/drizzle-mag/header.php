<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drizzle_mag
 */

?><?php
	/**
	 * Hook - drizzle_mag_action_doctype.
	 *
	 * @hooked drizzle_mag_doctype - 10
	 */
	do_action( 'drizzle_mag_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - drizzle_mag_action_head.
	 *
	 * @hooked drizzle_mag_head - 10
	 */
	do_action( 'drizzle_mag_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - drizzle_mag_action_before.
	 *
	 * @hooked drizzle_mag_add_top_head_content - 5
	 * @hooked drizzle_mag_page_start - 10
	 * @hooked drizzle_mag_skip_to_content - 15
	 */
	do_action( 'drizzle_mag_action_before' );
	?>

	<?php
	  /**
	   * Hook - drizzle_mag_action_before_header.
	   *
	   * @hooked drizzle_mag_header_start - 10
	   */
	  do_action( 'drizzle_mag_action_before_header' );
	?>
		<?php
		/**
		 * Hook - drizzle_mag_action_header.
		 *
		 * @hooked drizzle_mag_site_branding - 10
		 */
		do_action( 'drizzle_mag_action_header' );
		?>
	<?php
	  /**
	   * Hook - drizzle_mag_action_after_header.
	   *
	   * @hooked drizzle_mag_header_end - 10
	   * @hooked drizzle_mag_add_primary_navigation - 20
	   */
	  do_action( 'drizzle_mag_action_after_header' );
	?>
	<?php
	/**
	 * Hook - drizzle_mag_action_before_content.
	 *
	 * @hooked drizzle_mag_add_breadcrumb - 7
	 * @hooked drizzle_mag_add_featured_news_block - 8
	 * @hooked drizzle_mag_content_start - 10
	 */
	do_action( 'drizzle_mag_action_before_content' );
	?>
	<?php
	  /**
	   * Hook - drizzle_mag_action_content.
	   */
	  do_action( 'drizzle_mag_action_content' );
