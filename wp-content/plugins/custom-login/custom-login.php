<?php
/*
 * Plugin Name: Custom Login
 * Description: A custom login plugin for WordPress
 * Version: 1.0
 * Author: Hasmukh Dabhi
 */

function custom_login_form()
{
    if (is_user_logged_in()) {
        echo 'You are already logged in.';
        return;
    }
    $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '';
    $args = array(
        'redirect' => $redirect_to,
        'form_id' => 'loginform',
        'label_username' => __('Username'),
        'label_password' => __('Password'),
        'label_remember' => __('Remember Me'),
        'label_log_in' => __('Log In'),
        'remember' => true
    );
    wp_login_form($args);
}
function custom_login_process()
{
    if (!isset($_POST['wp-submit'])) {
        return;
    }
    $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '';
    $creds = array(
        'user_login' => $_POST['log'],
        'user_password' => $_POST['pwd'],
        'remember' => $_POST['rememberme']
    );
    $user = wp_signon($creds, false);
    if (is_wp_error($user)) {
        echo '<strong>ERROR:</strong> Invalid username or password.';
        return;
    }
    wp_set_auth_cookie($user->ID, $creds['remember']);
    wp_redirect($redirect_to);
    exit;
}
// add_shortcode('custom_login', 'custom_login_form');
// add_action('init', 'custom_login_process');
