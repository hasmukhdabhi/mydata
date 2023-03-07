<?php get_header(); ?>

<div id="main-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <p><?php the_date(); ?> by <?php the_author(); ?></p>
            <?php the_content(); ?>
        <?php endwhile;
    else : ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
