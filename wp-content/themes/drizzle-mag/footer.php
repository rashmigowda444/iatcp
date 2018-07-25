<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drizzle_mag
 */

	/**
	 * Hook - drizzle_mag_action_after_content.
	 *
	 * @hooked drizzle_mag_content_end - 10
	 */
	do_action( 'drizzle_mag_action_after_content' );
?>

	<?php
	/**
	 * Hook - drizzle_mag_action_before_footer.
	 *
	 * @hooked drizzle_mag_add_footer_widgets - 5
	 * @hooked drizzle_mag_footer_start - 10
	 */
	do_action( 'drizzle_mag_action_before_footer' );
	?>
	<?php
	  /**
	   * Hook - drizzle_mag_action_footer.
	   *
	   * @hooked drizzle_mag_footer_copyright - 10
	   */
	  do_action( 'drizzle_mag_action_footer' );
	?>
	<?php
	/**
	 * Hook - drizzle_mag_action_after_footer.
	 *
	 * @hooked drizzle_mag_footer_end - 10
	 */
	do_action( 'drizzle_mag_action_after_footer' );
	?>

<?php
	/**
	 * Hook - drizzle_mag_action_after.
	 *
	 * @hooked drizzle_mag_page_end - 10
	 * @hooked drizzle_mag_footer_goto_top - 20
	 */
	do_action( 'drizzle_mag_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
