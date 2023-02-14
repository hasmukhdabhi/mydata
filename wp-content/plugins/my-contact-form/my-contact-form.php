<?php
/*
Plugin Name: My Contact Form Plugin
*/

// Add shortcode to display contact form
add_shortcode('my_contact_form', 'my_contact_form_shortcode');
function my_contact_form_shortcode()
{
    ob_start();
?>
    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>">
        <?php if (isset($_SESSION['name_error'])) : ?>
            <span class="error"><?php echo $_SESSION['name_error']; ?></span>
        <?php endif; ?><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>">
        <?php if (isset($_SESSION['email_error'])) : ?>
            <span class="error"><?php echo $_SESSION['email_error']; ?></span>
        <?php endif; ?><br><br>

        <label for="message">Message:</label>
        <textarea name="message"><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
        <?php if (isset($_SESSION['message_error'])) : ?>
            <span class="error"><?php echo $_SESSION['message_error']; ?></span>
        <?php endif; ?><br><br>

        <input type="hidden" name="action" value="my_contact_form_submit">
        <?php wp_nonce_field('my_contact_form_submit', 'my_contact_form_nonce'); ?>
        <input type="submit" name="submit" value="Submit">
    </form>
<?php
    $output = ob_get_clean();
    return $output;
}

// Handle form submission
add_action('admin_post_my_contact_form_submit', 'my_contact_form_submit');
add_action('admin_post_nopriv_my_contact_form_submit', 'my_contact_form_submit');
function my_contact_form_submit()
{
    // Check if form is submitted
    if (isset($_POST['action']) && $_POST['action'] === 'my_contact_form_submit') {
        // Validate form input
        if (!wp_verify_nonce($_POST['my_contact_form_nonce'], 'my_contact_form_submit')) {
            wp_die('Invalid nonce');
        }

        if (empty($_POST['name'])) {
            $_SESSION['name_error'] = 'Name is required';
        } else {
            $name = sanitize_text_field($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $_SESSION['name_error'] = 'Only letters and white space allowed';
            }
        }

        if (empty($_POST['email'])) {
            $_SESSION['email_error'] = 'Email is required';
        } else {
            $email = sanitize_email($_POST['email']);
            if (!is_email($email)) {
                $_SESSION['email_error'] = 'Invalid email format';
            }
        }

        if (empty($_POST['message'])) {
            $_SESSION['message_error'] = 'Message is required';
        } else {
            $message = sanitize_textarea_field($_POST['message']);

            // If there are errors, redirect to previous page and show error messages
            if (isset($_SESSION['name_error']) || isset($_SESSION['email_error']) || isset($_SESSION['message_error'])) {
                $url = $_SERVER['HTTP_REFERER'];
                wp_redirect($url);
                exit;
            }

            // If there are no errors, send email
            $to = get_option('admin_email');
            $subject = 'New message from ' . $name;
            $body = 'Name: ' . $name . "\r\n" . 'Email: ' . $email . "\r\n" . 'Message: ' . $message;
            $headers = array(
                'From: ' . get_bloginfo('name') . ' <' . $to . '>',
                'Content-Type: text/plain; charset=UTF-8',
            );
            wp_mail($to, $subject, $body, $headers);

            // Redirect to thank you page
            $url = home_url('/thank-you');
            wp_redirect($url);
            exit;
        }
    }
}
