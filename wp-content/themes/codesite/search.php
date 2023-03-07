<?php get_header(); ?>

<div id="main-content">
    <h1><?php printf(esc_html__('Search Results for: %s', 'my-theme'), '<span>' . get_search_query() . '</span>'); ?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
        <?php endwhile; else : ?>
        <p><?php esc_html_e('Sorry, no posts matched your search.'); ?></p>
    <?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>