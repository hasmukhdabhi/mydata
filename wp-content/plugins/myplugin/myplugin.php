<?php

/**
 *  myplugin 
 *
 * @package           PluginPackage
 * @author            Hasmukh Dabhi
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       myplugin
 * Plugin URI:        https://example.com/plugin-name
 * Description:       
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hasmukh Dabhi
 * Author URI:        https://example.com/myplugin

 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

// create a hook activation 
register_activation_hook(__FILE__, 'my_plugin_activate');

register_deactivation_hook(__FILE__, 'my_plugin_deactivate');


// create table 

function my_plugin_activate()
{
    global $wpdb;
    $table = $wpdb->prefix . 'crud_list';
    $sql = " CREATE TABLE $table (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name`varchar(255) DEFAULT NULL
        `email` varchar(255) DEFAULT NULL,
    )";
    $wpdb->query($sql);
}
function my_plugin_deactivate()
{
    global $wpdb;
    global $table_prefix;
    $table = $table_prefix . 'crud_list';
    $sql = " DROP TABLE $table ";
    $wpdb->query($sql);
}

// Add a new menu in wordpress dashboard

add_action('admin_menu', 'my_plugin_menu');
function my_plugin_menu()
{
    add_menu_page('crud_list', 'crud_list', 8, __FILE__, 'my_plugin_list');
}

function my_plugin_list()
{
    include('my_plugin_list.php');
}

/**
 * Register the "book" custom post type
 */
function pluginprefix_setup_post_type()
{

    register_post_type('book', ['public => true']);
}
add_action('int', 'pluginprefix_setup_post_type');

/**
 * Aactivation hook

 */

function pluginprefix_activate()
{
    // Trigger our function that registers the custom post type plugin.
    pluginprefix_setup_post_type();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'pluginprefix_activate');

/**
 * Deactivation hook
 */

function pluginprefix_deactivate()
{
    // unregister the post type, so the rules are no longer in memory
    unregister_post_type('book');
    // clear the permarlinks the remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'pluginprefix_deactivate');



// current date and time widget

function current_date_and_time_widget()
{
    echo '<p> The current date and time is:' . date('F j, Y, g:i a') . '</p>';
}
function register_current_date_and_time_widget()
{
    register_sidebar('cuurent date and time', 'current_date_and_time_widget');
}
add_action('widgets_init', 'register_current_date_and_time_widget');


// create a menu 

function your_plugin_menu()
{
    add_submenu_page(
        'options-general.php',
        'Your Plugin Page Title',
        'Your Plugin Menu Title',
        'manage_options',
        'your-plugin-slug',
        'your_plugin_function'

    );
}
add_action('admin_menu','your_plugin_menu');

function your_plugin_function(){
    echo "hello word!";
}
