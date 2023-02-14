<?php
/*
Plugin Name: Contact Form
Description: A simple contact form plugin
Version: 1.0
Author: Your Name
*/
// Create the table on plugin activation
function contact_form_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_submissions';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        message text NOT NULL,
        timestamp datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'contact_form_create_table');

// Save the form data to the database
function contact_form_save_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_submissions';
    echo $name = sanitize_text_field($_POST['name']);
    echo $email = sanitize_email($_POST['email']);
    echo $message = esc_textarea($_POST['message']);
    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'timestamp' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s')
    );
}
add_action('init', 'contact_form_process');
add_action('init', 'contact_form_save_data');

// Create the shortcode for the contact form
function contact_form_shortcode() {
    ob_start();
    include 'contact-form-template.php';
    return ob_get_clean();
}
add_shortcode('contact_form', 'contact_form_shortcode');

// Process the form submission
function contact_form_process() {
    if(isset($_POST['submit'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = esc_textarea($_POST['message']);
        $to = get_option('admin_email');
        $subject = 'New contact form submission';
        $headers = "From: $name <$email>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        wp_mail($to, $subject, $message, $headers);
    }
}
add_action('init', 'contact_form_process');
?>


