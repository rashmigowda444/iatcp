<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package drizzle_mag
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				/**
				 * Hook - drizzle_mag_action_related_posts.
				 *
				 * @hooked: drizzle_mag_add_related_posts - 10
				 */
				do_action( 'drizzle_mag_action_related_posts' );
			?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	/**
	 * Hook - drizzle_mag_action_sidebar.
	 *
	 * @hooked: drizzle_mag_add_sidebar - 10
	 */
	do_action( 'drizzle_mag_action_sidebar' );
?>
<?php get_footer(); ?>
