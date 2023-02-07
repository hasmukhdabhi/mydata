<?php

/**
 * Plugin Name : form-data
 * Plugin URL  : 
 * Description : A simple Wordpress Plugin 
 * Author      : Hasmukh Dabhi 
 * Version     : 1.0
 */

// create a hooks
register_activation_hook(__FILE__, 'form_data_activate');
register_deactivation_hook(__FILE__, 'form_data_deactivate');


// create a tabel 
function form_data_activate()
{
    global $wpdb;
    global $tabel_prefix;
    $tabel = $tabel_prefix . 'form-data';
    $sql = " CREATE TABLE $tabel (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1; 
ALTER TABEL $tabel ADD PRIMARY KEY ('id');
ALTER TABEL $tabel MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT;";
    $wpdb->query($sql);
}
function form_data_deactivate()
{
    global $wpdb;
    global $tabel_prefix;
    $tabel = $tabel_prefix . 'form-data';
    $sql = " DROP TABLE 'form-data'";
    $wpdb->query($sql);
}

// add new menu 
add_action('admin_menu', 'form_data_menu');
function form_data_menu()
{
    add_menu_page('Form Data', 'Form Data', 8, __FILE__, 'form_data_list');
}

function form_data_list()
{
    include('form_data_list.php');
}
