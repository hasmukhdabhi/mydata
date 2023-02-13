<?php

/**
 * Theme Name: Codesite
 *
 * @package Codesite
 */

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Enqueue scripts and styles.
 */
function my_theme_scripts()
{
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
    wp_enqueue_script('my-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('my-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

/**
 * Implement the Custom Header feature.
 */

// Register Custom Navigation Menu
function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'extra-menu' => __('Extra Menu')
        )
    );
}
add_action('init', 'register_my_menus');

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widgets additions.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/* Register navigation menus */
function my_theme_register_menus()
{
    register_nav_menus(array(
        'header-menu' => esc_html__('Header Menu', 'my-theme'),
        'footer-menu' => esc_html__('Footer Menu', 'my-theme'),
    ));
}
add_action('init', 'my_theme_register_menus');

/* Register widget areas */
function my_theme_register_widget_areas()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'my-theme'),
        'id'            => 'sidebar',
        'description'   => esc_html__('Add widgets here to appear in the sidebar.', 'my-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'my_theme_register_widget_areas');
