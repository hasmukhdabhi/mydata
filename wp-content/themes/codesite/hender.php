<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="header">
        <div class="container">
            <div id="logo">
                <?php if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                } ?>
            </div>
            <div id="main-nav">
                <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
            </div>
        </div>
    </div>