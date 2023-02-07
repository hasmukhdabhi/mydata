<?php

/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme('storefront');
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if (class_exists('Jetpack')) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if (storefront_is_woocommerce_activated()) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if (is_admin()) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if (version_compare(get_bloginfo('version'), '4.7.3', '>=') && (is_admin() || is_customize_preview())) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */


/* shortcode create */
include('custom-shortcode.php');

// Step 1: Create the shortcode function
function my_shortcode_function($atts)
{
	return "Hello, this is my shortcode!";
}

// Step 2: Register the shortcode
add_shortcode('my_shortcode', 'my_shortcode_function');


// function my_shortcode_function2( $atts ) {
//     $atts = shortcode_atts( array(
//         'param1' => 'default value',
//         'param2' => 'default value',
//     ), $atts, 'my_shortcode' );
//     return "Hello, this is my shortcode! param1:".$atts['param1']." param2:".$atts['param2'];
// }
// add_shortcode( 'my_shortcode', 'my_shortcode_function2' );


// Step 1: Create the shortcode function login 
function my_login_shortcode()
{
	if (is_user_logged_in()) {
		return 'Welcome, ' . wp_get_current_user()->display_name;
	} else {
		return wp_login_form(array('echo' => false));
	}
}
// Step 2: Register the shortcode
add_shortcode('login', 'my_login_shortcode');


add_shortcode('wporg', 'wporg_shortcode');
function wporg_shortcode($atts = [], $content = null)
{
	// do something to $content
	// always return
	return $content;
}

function demo_shortcode($argc)
{
	print_r($argc['type']);
}
add_shortcode('temporay', 'demo_shortcode');


/* header widget create  */
function header_widget()
{

	register_sidebar(array(
		'name' 			=> 'Header Widget',
		'id' 			=> 'header_widget',
		'description'   => 'Will be Displayed in the Header',
		'before_widget' => '<div class= "header_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class= "widget_title">',
		'after_widget'  => '</h2>'
	));
}
// hooks create
add_action('widgets_init', 'header_widget');


/* footer widget create */
function footer_widget()
{
	register_sidebar(array(
		'name'			=> 'Footer Widget',
		'id'			=> 'footer_widget',
		'description'	=> 'Will be Displayed in the Footer',
		'before_widget'	=> '<div class="footer_widget">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget_title">',
		'after_widget'	=> '</h2>'
	));
}
// hooks create
add_action('widgets_init', 'footer_widget');

// Register Sidebars
// function custom_sidebars()
// {

// 	$args = array(
// 		'id'            => 'custom_sidebar',
// 		'name'          => __('Custom Widget Area', 'text_domain'),
// 		'description'   => __('A custom widget area', 'text_domain'),
// 		'before_title'  => '<h3 class="widget-title">',
// 		'after_title'   => '</h3>',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</aside>',
// 	);
// 	register_sidebar($args);
// }
// add_action('widgets_init', 'custom_sidebars');

/* Add Author Profile Fields create by hooks */

function wpb_new_contactmethods($contactmethods)
{
	$contactmethods['instagram'] = 'Instagram';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['twitter'] = 'Twitter';

	return $contactmethods;
}
add_filter('user_contactmethods', 'wpb_new_contactmethods', 10, 1);




