<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme_by_Hasmukh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link href="<?php echo get_template_directory_uri(); ?>https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-icons.css" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri(); ?>/assets/css/templatemo-festava-live.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- header code html copy -->
	<header class="site-header">
		<div class="container">
			<div class="row">

				<div class="col-lg-12 col-12 d-flex flex-wrap">
					<p class="d-flex me-4 mb-0">
						<i class="bi-person custom-icon me-2"></i>
						<strong class="text-dark">Welcome to Music Festival 2023</strong>
					</p>
				</div>

			</div>
		</div>
	</header>

	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				Festava Live
			</a>


			<a href="ticket.php" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">

				<?php
				$theme_location = 'menu-1';
				if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
					$menu = get_term($locations[$theme_location], 'nav_menu');
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$menu_list = '<ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">' . "\n";

					foreach ($menu_items as $menu_item) {
						if ($menu_item->menu_item_parent == 0) {
							$bool = false;
							$parent = $menu_item->ID;

							$menu_array = array();
							foreach ($menu_items as $submenu) {
								if ($submenu->menu_item_parent == $parent) {
									$bool = true;
									$menu_array[] = '<li class="nav-item"><a href="' . $submenu->url . '" class="nav-link click-scroll">' . $submenu->title . '</a></li>' . "\n";
								}
							}
							if ($bool == true && count($menu_array) > 0) {

								$menu_list .= '<li class="dropdown">' . "\n";
								$menu_list .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . ' <span class="caret"></span></a>' . "\n";

								$menu_list .= '<ul class="dropdown-menu">' . "\n";
								$menu_list .= implode("\n", $menu_array);
								$menu_list .= '</ul>' . "\n";
							} else {

								$menu_list .= '<li class="nav-item">' . "\n";
								$menu_list .= '<a href="' . $menu_item->url . '" class="nav-link click-scroll">' . $menu_item->title . '</a>' . "\n";
							}
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
				<a href="ticket.php" class="btn custom-btn d-lg-block d-none">Buy Ticket</a>
			</div>
		</div>
	</nav>