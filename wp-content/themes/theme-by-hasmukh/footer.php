<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme_by_Hasmukh
 */

?>

<footer class="site-footer">
	<div class="site-footer-top">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-12">
					<h2 class="text-white mb-lg-0">Festava Live</h2>
				</div>

				<div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
					<ul class="social-icon d-flex justify-content-lg-end">
						<li class="social-icon-item">
							<a href="#" class="social-icon-link">
								<span class="bi-twitter"></span>
							</a>
						</li>

						<li class="social-icon-item">
							<a href="#" class="social-icon-link">
								<span class="bi-apple"></span>
							</a>
						</li>

						<li class="social-icon-item">
							<a href="#" class="social-icon-link">
								<span class="bi-instagram"></span>
							</a>
						</li>

						<li class="social-icon-item">
							<a href="#" class="social-icon-link">
								<span class="bi-youtube"></span>
							</a>
						</li>

						<li class="social-icon-item">
							<a href="#" class="social-icon-link">
								<span class="bi-pinterest"></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<div class="col-lg-6 col-12 mb-4 pb-2">
				<h5 class="site-footer-title mb-3">Links</h5>
				<?php
				$theme_location = 'menu-1';
				if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
					$menu = get_term($locations[$theme_location], 'nav_menu');
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$menu_list = '<ul class="site-footer-links">' . "\n";

					foreach ($menu_items as $menu_item) {
						if ($menu_item->menu_item_parent == 0) {
							$menu_list .= '<li class="site-footer-link-item">' . "\n";
							$menu_list .= '<a href="' . $menu_item->url . '" class="site-footer-link">' . $menu_item->title . '</a>' . "\n";
						}
						// end <li>
						$menu_list .= '</li>' . "\n";
					}

					$menu_list .= '</ul>' . "\n";
				} else {
					$menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
				}

				echo $menu_list;
				?>
			</div>

			<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
				<?php dynamic_sidebar('footer-sidebar-2'); ?>

			</div>

			<div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
				<?php dynamic_sidebar('footer-sidebar-3'); ?>

			</div>
		</div>
	</div>

	<div class="site-footer-bottom">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-12 mt-5">
					<p class="copyright-text">Copyright © 2036 Festava Live Company</p>
					<p class="copyright-text">Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
				</div>

				<div class="col-lg-8 col-12 mt-lg-5">
					<ul class="site-footer-links">
						<li class="site-footer-link-item">
							<a href="#" class="site-footer-link">Terms &amp; Conditions</a>
						</li>

						<li class="site-footer-link-item">
							<a href="#" class="site-footer-link">Privacy Policy</a>
						</li>

						<li class="site-footer-link-item">
							<a href="#" class="site-footer-link">Your Feedback</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- JAVASCRIPT FILES -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.sticky.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/click-scroll.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
</body>

</html>