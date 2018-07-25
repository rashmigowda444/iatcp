<?php
/**
 * The Secondary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drizzle_mag
 */

$default_sidebar = apply_filters( 'drizzle_mag_filter_default_sidebar_id', 'sidebar-2', 'secondary' ); ?>

<div id="sidebar-secondary" class="widget-area sidebar" role="complementary">
	<div class="sidebar-widget-wrapper">
		<?php if ( is_active_sidebar( $default_sidebar ) ) : ?>
			<?php dynamic_sidebar( $default_sidebar ); ?>
		<?php else : ?>
			<?php
				/**
				 * Hook - drizzle_mag_action_default_sidebar.
				 */
				do_action( 'drizzle_mag_action_default_sidebar', $default_sidebar, 'secondary' );
			?>
		<?php endif ?>
	</div> <!-- .sidebar-widget-wrapper -->
</div><!-- #sidebar-secondary -->
