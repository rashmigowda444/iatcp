<?php
/**
 * Theme Options.
 *
 * @package drizzle_mag
 */

$default = drizzle_mag_get_default_theme_options();

// Add theme options panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => __( 'Header Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'drizzle-mag' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'drizzle-mag' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_social_in_header.
$wp_customize->add_setting( 'theme_options[show_social_in_header]',
	array(
		'default'           => $default['show_social_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'drizzle_mag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_header]',
	array(
		'label'    => __( 'Enable Social Icons', 'drizzle-mag' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[show_search_in_header]',
	array(
		'default'           => $default['show_search_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'drizzle_mag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_search_in_header]',
	array(
		'label'    => __( 'Enable Search Form', 'drizzle-mag' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Breaking News Section.
$wp_customize->add_section( 'section_breaking_news',
	array(
	'title'      => __( 'Breaking News Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_breaking_news.
$wp_customize->add_setting( 'theme_options[show_breaking_news]',
	array(
	'default'           => $default['show_breaking_news'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_breaking_news]',
	array(
	'label'    => __( 'Show Breaking News', 'drizzle-mag' ),
	'section'  => 'section_breaking_news',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[breaking_news_text]',
	array(
	'default'           => $default['breaking_news_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[breaking_news_text]',
	array(
	'label'           => __( 'Title', 'drizzle-mag' ),
	'section'         => 'section_breaking_news',
	'type'            => 'text',
	'priority'        => 100,
	'active_callback' => 'drizzle_mag_is_breaking_news_active',
	)
);

// Setting breaking_news_category.
$wp_customize->add_setting( 'theme_options[breaking_news_category]',
	array(
		'default'           => $default['breaking_news_category'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new drizzle_mag_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[breaking_news_category]',
		array(
			'label'           => __( 'Select Category', 'drizzle-mag' ),
			'section'         => 'section_breaking_news',
			'settings'        => 'theme_options[breaking_news_category]',
			'priority'        => 100,
			'active_callback' => 'drizzle_mag_is_breaking_news_active',
		)
	)
);

// Setting breaking_news_number.
$wp_customize->add_setting( 'theme_options[breaking_news_number]',
	array(
		'default'           => $default['breaking_news_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'drizzle_mag_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[breaking_news_number]',
	array(
		'label'           => __( 'No of Posts', 'drizzle-mag' ),
		'section'         => 'section_breaking_news',
		'type'            => 'number',
		'priority'        => 100,
		'active_callback' => 'drizzle_mag_is_breaking_news_active',
		'input_attrs'     => array( 'min' => 1, 'max' => 10, 'style' => 'width: 55px;' ),
	)
);

// Featured News Section.
$wp_customize->add_section( 'section_featured_news',
	array(
	'title'      => __( 'Featured News', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting featured_news_status.
$wp_customize->add_setting( 'theme_options[featured_news_status]',
	array(
	'default'           => $default['featured_news_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[featured_news_status]',
	array(
	'label'    => __( 'Display Featured News', 'drizzle-mag' ),
	'section'  => 'section_featured_news',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting featured_news_category.
$wp_customize->add_setting( 'theme_options[featured_news_category]',
	array(
		'default'           => $default['featured_news_category'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new drizzle_mag_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[featured_news_category]',
		array(
			'label'           => __( 'Choose Category', 'drizzle-mag' ),
			'section'         => 'section_featured_news',
			'settings'        => 'theme_options[featured_news_category]',
			'priority'        => 100,
			'active_callback' => 'drizzle_mag_is_featured_news_section_active',
		)
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting site_layout.
$wp_customize->add_setting( 'theme_options[site_layout]',
	array(
	'default'           => $default['site_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[site_layout]',
	array(
	'label'    => __( 'Site Layout', 'drizzle-mag' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => drizzle_mag_get_site_layout_options(),
	'priority' => 100,
	)
);
// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => __( 'Global Layout', 'drizzle-mag' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => drizzle_mag_get_global_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => __( 'Archive Layout', 'drizzle-mag' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => drizzle_mag_get_archive_layout_options(),
	'priority' => 100,
	)
);

// Single Post Section.
$wp_customize->add_section( 'section_single_post',
	array(
	'title'      => __( 'Single Post Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting related_posts_heading.
$wp_customize->add_setting( 'theme_options[related_posts_heading]',
	array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	new drizzle_mag_Heading_Control( $wp_customize, 'theme_options[related_posts_heading]',
		array(
			'label'           => __( 'Related Posts', 'drizzle-mag' ),
			'section'         => 'section_single_post',
			'settings'        => 'theme_options[related_posts_heading]',
			'priority'        => 100,
		)
	)
);

// Setting show_related_posts.
$wp_customize->add_setting( 'theme_options[show_related_posts]',
	array(
	'default'           => $default['show_related_posts'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_related_posts]',
	array(
	'label'           => __( 'Show Related Posts', 'drizzle-mag' ),
	'section'         => 'section_single_post',
	'type'            => 'checkbox',
	'priority'        => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'drizzle-mag' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
	'title'      => __( 'Blog Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
	'label'       => __( 'Excerpt Length', 'drizzle-mag' ),
	'description' => __( 'in words', 'drizzle-mag' ),
	'section'     => 'section_blog',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting exclude_categories.
$wp_customize->add_setting( 'theme_options[exclude_categories]',
	array(
	'default'           => $default['exclude_categories'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[exclude_categories]',
	array(
	'label'       => __( 'Exclude Categories in Blog', 'drizzle-mag' ),
	'description' => __( 'Enter category ID to exclude in Blog Page. Separate with comma if more than one', 'drizzle-mag' ),
	'section'     => 'section_blog',
	'type'        => 'text',
	'priority'    => 100,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
	'title'      => __( 'Breadcrumb Options', 'drizzle-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'drizzle_mag_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
	'label'       => __( 'Breadcrumb Type', 'drizzle-mag' ),
	'section'     => 'section_breadcrumb',
	'type'        => 'select',
	'choices'     => drizzle_mag_get_breadcrumb_type_options(),
	'priority'    => 100,
	)
);
