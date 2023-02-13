<?php

/**
 * Theme by Hasmukh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme_by_Hasmukh
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_by_hasmukh_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Theme by Hasmukh, use a find and replace
		* to change 'theme-by-hasmukh' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('theme-by-hasmukh', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'theme-by-hasmukh'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'theme_by_hasmukh_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'theme_by_hasmukh_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_by_hasmukh_content_width()
{
	$GLOBALS['content_width'] = apply_filters('theme_by_hasmukh_content_width', 640);
}
add_action('after_setup_theme', 'theme_by_hasmukh_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_by_hasmukh_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'theme-by-hasmukh'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'theme-by-hasmukh'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer sidebar 1', 'theme-by-hasmukh'),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'theme-by-hasmukh'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer sidebar 2', 'theme-by-hasmukh'),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__('Add widgets here.', 'theme-by-hasmukh'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer sidebar 3', 'theme-by-hasmukh'),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__('Add widgets here.', 'theme-by-hasmukh'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}

add_action('widgets_init', 'theme_by_hasmukh_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function theme_by_hasmukh_scripts()
{
	wp_enqueue_style('theme-by-hasmukh-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('theme-by-hasmukh-style', 'rtl', 'replace');

	wp_enqueue_script('theme-by-hasmukh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'theme_by_hasmukh_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* Starts: Register Custom Post Type for Artists */

function cpt_artists_function()
{
	$labels = array(
		'name'               => _x('artists', 'post type general name', 'textdomain'),
		'singular_name'      => _x('artists', 'post type singular name', 'textdomain'),
		'add_new'            => _x('Add New', 'textdomain'),
		'add_new_item'       => __('Add New artists', 'textdomain'),
		'edit_item'          => __('Edit artists', 'textdomain'),
		'new_item'           => __('New artists', 'textdomain'),
		'all_items'          => __('All artists', 'textdomain'),
		'view_item'          => __('View artists', 'textdomain'),
		'search_items'       => __('Search artists', 'textdomain'),
		'not_found'          => __('No artists found', 'textdomain'),
		'not_found_in_trash' => __('No artists found in the Trash', 'textdomain'),
		'parent_item_colon'  => '',
		'menu_name'          => 'artists'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our artists and artists specific data',
		'public'        => true,
		'menu_position' => 5,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'artists'),
		'supports'      => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'comments'),
		'has_archive'   => true,
		'show_in_rest'       => true
	);
	register_post_type('my_artists', $args);
}
add_action('init', 'cpt_artists_function');


/* add_theme_support( 'title-tag' ); */

// add_theme_support( 'custom-logo', array(		
// 	'header-text' => array( 'My blogg', 'site-description' ),
// ) );

// Register a new section in the WordPress Customizer
function customizer_section($wp_customize)
{
	$wp_customize->add_section('home_page_content', array(
		'title' => 'Home Page Content',
		'priority' => 30,
		'description' => 'Add content for the home page',
	));
}
add_action('customize_register', 'customizer_section');

// Add settings and controls for the title
function add_title_setting($wp_customize)
{
	$wp_customize->add_setting('title', array(
		'default' => 'Night Live 2023',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('title', array(
		'label' => 'Title',
		'section' => 'home_page_content',
		'type' => 'text',
	));
}
add_action('customize_register', 'add_title_setting');

// Add settings and controls for the description
function add_description_setting($wp_customize)
{
	$wp_customize->add_setting('description', array(
		'default' => 'FESTAVA LIVE PRESENTS',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('description', array(
		'label' => 'Description',
		'section' => 'home_page_content',
		'type' => 'textarea',
	));
}
add_action('customize_register', 'add_description_setting');
