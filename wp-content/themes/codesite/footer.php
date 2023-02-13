<footer id="footer">
    <div class="container">
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. <?php esc_html_e('All rights reserved.', 'my-theme'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>