<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package drizzle_mag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	  /**
	   * Hook - drizzle_mag_single_image.
	   *
	   * @hooked drizzle_mag_add_image_in_single_display - 10
	   */
	  do_action( 'drizzle_mag_single_image' );
	?>
	<div class="article-wrapper">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php drizzle_mag_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'drizzle-mag' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer entry-meta">
			<?php drizzle_mag_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div> <!-- .article-wrapper -->

</article><!-- #post-## -->

