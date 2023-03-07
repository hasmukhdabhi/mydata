<?php get_header(); ?>

<div id="main-content">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }
    ?>
</div>
<div class="container">
    <div id="main-content">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_title();
                the_content();
            }
        }
        ?>
    </div>

    <div id="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>