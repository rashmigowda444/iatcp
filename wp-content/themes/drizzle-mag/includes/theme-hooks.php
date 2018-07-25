<?php
/**
 * Functions hooked to custom hook.
 *
 * @package drizzle_mag
 */

if ( ! function_exists( 'drizzle_mag_skip_to_content' ) ) :

	/**
	 * Add skip to content.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_skip_to_content() {
		?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'drizzle-mag' ); ?></a><?php
	}
endif;

add_action( 'drizzle_mag_action_before', 'drizzle_mag_skip_to_content', 15 );

if ( ! function_exists( 'drizzle_mag_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_site_branding() {
		?>
		<div class="site-branding">

			<?php drizzle_mag_the_custom_logo(); ?>

			<?php $show_title = drizzle_mag_get_option( 'show_title' ); ?>
			<?php $show_tagline = drizzle_mag_get_option( 'show_tagline' ); ?>

			<?php if ( true === $show_title || true === $show_tagline ) : ?>
				<div id="site-identity">
					<?php if ( true === $show_title ) : ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( true === $show_tagline ) : ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				</div><!-- #site-identity -->
			<?php endif; ?>

		</div><!-- .site-branding -->
		<?php if ( is_active_sidebar( 'sidebar-header-right-widget-area' ) ) : ?>
			<div class="header-ads-area">
				<?php dynamic_sidebar( 'sidebar-header-right-widget-area' ); ?>
			</div> <!-- .header-ads-area -->
		<?php endif; ?>
	<?php
	}

endif;

add_action( 'drizzle_mag_action_header', 'drizzle_mag_site_branding' );

if ( ! function_exists( 'drizzle_mag_add_primary_navigation' ) ) :

	/**
	 * Primary navigation.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_primary_navigation() {
		?>
		<div id="main-nav" class="clear-fix main-nav">
			<div class="container">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="wrap-menu-content">
					<?php
					wp_nav_menu(
						array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => 'drizzle_mag_primary_navigation_fallback',
						)
					);
					?>
				</div><!-- .wrap-menu-content -->
			</nav><!-- #site-navigation -->
			</div><!-- .container -->
		</div><!-- #main-nav -->
		<?php
	}

endif;

add_action( 'drizzle_mag_action_after_header', 'drizzle_mag_add_primary_navigation', 20 );

if ( ! function_exists( 'drizzle_mag_mobile_navigation' ) ) :

	/**
	 * Mobile navigation.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_mobile_navigation() {
		?>
		<a id="mobile-trigger" href="#mob-menu"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
		<div id="mob-menu">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => '',
				'fallback_cb'    => 'drizzle_mag_primary_navigation_fallback',
			) );
			?>
		</div>
		<?php
	}

endif;

add_action( 'drizzle_mag_action_before', 'drizzle_mag_mobile_navigation', 20 );

if ( ! function_exists( 'drizzle_mag_add_top_head_content' ) ) :

	/**
	 * Add top head content.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_top_head_content() {
		$show_breaking_news    = drizzle_mag_get_option( 'show_breaking_news' );
		$show_search_in_header = drizzle_mag_get_option( 'show_search_in_header' );
		$show_social_in_header = drizzle_mag_get_option( 'show_social_in_header' );

		if ( false === $show_breaking_news && false === $show_search_in_header && ! ( true === $show_social_in_header && has_nav_menu( 'social' ) ) ) {
			return;
		}
		?>
		<div id="tophead">
			<div class="container">
				<?php drizzle_mag_show_breaking_news(); ?>
				<div class="right-tophead">
					<?php if ( true === $show_search_in_header ) : ?>
						<div class="header-search-box">
							<a href="#" class="search-icon"><i class="fa fa-search"></i></a>
							<div class="search-box-wrap">
								<?php get_search_form(); ?>
							</div>
						</div> <!-- .header-search-box -->
					<?php endif; ?>

					<?php if ( true === $show_social_in_header && has_nav_menu( 'social' ) ) : ?>
						<div id="header-social">
							<?php the_widget( 'Drizzle_Mag_Social_Widget' ); ?>
						</div><!-- .header-social -->
					<?php endif; ?>
				</div><!-- .right-head -->
			</div> <!-- .container -->
		</div><!--  #tophead -->
		<?php
	}

endif;

add_action( 'drizzle_mag_action_before', 'drizzle_mag_add_top_head_content', 5 );

if ( ! function_exists( 'drizzle_mag_footer_copyright' ) ) :

	/**
	 * Footer copyright.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'drizzle_mag_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Copyright content.
		$copyright_text = drizzle_mag_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'drizzle_mag_filter_copyright_text', $copyright_text );
		?>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<?php
			$footer_menu_content = wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => 'div',
				'container_id'   => 'footer-navigation',
				'depth'          => 1,
				'fallback_cb'    => false,
			) );
			?>
		<?php endif; ?>
		<?php if ( ! empty( $copyright_text ) ) : ?>
			<div class="copyright">
				<?php echo wp_kses_post( $copyright_text ); ?>
			</div>
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'drizzle-mag' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'drizzle-mag' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( '%1$s by %2$s', 'drizzle-mag' ), 'Drizzle Mag', '<a href="http://wpdrizzle.com">WPDrizzle</a>' ); ?>
		</div>
		<?php
	}

endif;

add_action( 'drizzle_mag_action_footer', 'drizzle_mag_footer_copyright', 10 );

if ( ! function_exists( 'drizzle_mag_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_sidebar() {

		global $post;

		$global_layout = drizzle_mag_get_option( 'global_layout' );
		$global_layout = apply_filters( 'drizzle_mag_filter_theme_global_layout', $global_layout );

		// Check if single template.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'drizzle_mag_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

		// Include secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
				get_sidebar( 'secondary' );
				break;

			default:
				break;
		}

	}

endif;

add_action( 'drizzle_mag_action_sidebar', 'drizzle_mag_add_sidebar' );

if ( ! function_exists( 'drizzle_mag_custom_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_custom_posts_navigation() {

		the_posts_pagination();

	}
endif;

add_action( 'drizzle_mag_action_posts_navigation', 'drizzle_mag_custom_posts_navigation' );

if ( ! function_exists( 'drizzle_mag_add_image_in_single_display' ) ) :

	/**
	 * Add image in single template.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_image_in_single_display() {

		if ( has_post_thumbnail() ) {
			$args = array(
				'class' => 'drizzle-mag-post-thumb aligncenter',
			);
			the_post_thumbnail( 'large', $args );
		}

	}

endif;

add_action( 'drizzle_mag_single_image', 'drizzle_mag_add_image_in_single_display' );

if ( ! function_exists( 'drizzle_mag_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_breadcrumb() {

		$breadcrumb_type = drizzle_mag_get_option( 'breadcrumb_type' );

		// Bail if breadcrumb is disabled.
		if ( 'disabled' === $breadcrumb_type ) {
			return;
		}

		// Bail if home page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo '<div id="breadcrumb"><div class="container">';
		drizzle_mag_breadcrumb();
		echo '</div><!-- .container --></div><!-- #breadcrumb -->';
		return;

	}

endif;

add_action( 'drizzle_mag_action_before_content', 'drizzle_mag_add_breadcrumb', 7 );

if ( ! function_exists( 'drizzle_mag_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_footer_goto_top() {
		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"></i></a>';
	}

endif;

add_action( 'drizzle_mag_action_after', 'drizzle_mag_footer_goto_top', 20 );

if ( ! function_exists( 'drizzle_mag_add_footer_widgets' ) ) :

	/**
	 * Add footer widgets.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_footer_widgets() {

		get_template_part( 'template-parts/footer-widgets' );

	}
endif;

add_action( 'drizzle_mag_action_before_footer', 'drizzle_mag_add_footer_widgets', 5 );

if ( ! function_exists( 'drizzle_mag_add_featured_news_block' ) ) :

	/**
	 * Add featured news block.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_featured_news_block() {

		$featured_news_status = drizzle_mag_get_option( 'featured_news_status' );

		if ( true !== $featured_news_status ) {
			return;
		}

		if ( is_front_page() && ! is_home() ) {

			get_template_part( 'template-parts/featured' );

		}

	}

endif;

add_action( 'drizzle_mag_action_before_content', 'drizzle_mag_add_featured_news_block', 8 );

if ( ! function_exists( 'drizzle_mag_add_related_posts' ) ) :

	/**
	 * Add related posts.
	 *
	 * @since 1.0.0
	 */
	function drizzle_mag_add_related_posts() {

		$show_related_posts = drizzle_mag_get_option( 'show_related_posts' );

		if ( true === $show_related_posts && is_singular( 'post' ) ) {
			get_template_part( 'template-parts/related' );
		}

	}

endif;

add_action( 'drizzle_mag_action_related_posts', 'drizzle_mag_add_related_posts', 10 );
