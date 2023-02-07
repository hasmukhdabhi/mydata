<?php
/* Template Name: Home Page  */



get_header();
?>
<?php
$extra_fields = get_fields();
// $extra_menu = the_field('');

?>
<section class="hero-section" id="section_1">
    <div class="section-overlay"></div>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">

            <div class="col-12 mt-auto mb-5 text-center">
                <small><?= $extra_fields['description'] ?></small>
                <h1 class="text-white mb-5"><?= $extra_fields['title'] ?></h1>
                <a class="btn custom-btn smoothscroll" href="#section_2">Let's begin</a>
            </div>

            <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                <div class="date-wrap">
                    <h5 class="text-white">
                        <i class="custom-icon bi-clock me-2"></i>
                        <?= $extra_fields['date'] ?>
                    </h5>
                </div>

                <div class="location-wrap mx-auto py-3 py-lg-0">
                    <h5 class="text-white">
                        <i class="custom-icon bi-geo-alt me-2"></i>
                        <?= $extra_fields['location'] ?>
                    </h5>
                </div>

                <div class="social-share">
                    <ul class="social-icon d-flex align-items-center justify-content-center">
                        <span class="text-white me-3">Share:</span>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-facebook"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-twitter"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-instagram"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="video-wrap">
        <video autoplay="" loop="" muted="" class="custom-video" poster="">
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/pexels-2022395.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>


<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                <div class="services-info">
                    <h2 class="text-white mb-4"><?= $extra_fields['about_title'] ?></h2>
                    <div class="about-description">
                        <?= $extra_fields['about_description'] ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-text-wrap">
                    <img src="<?= $extra_fields['about_image'] ?>" class="about-image img-fluid">
                    <div class="about-text-info d-flex">
                        <div class="d-flex">
                            <i class="about-text-icon bi-person"></i>
                        </div>
                        <div class="ms-4">
                            <h3>a happy moment</h3>

                            <p class="mb-0">your amazing festival experience with us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="artists-section section-padding" id="section_3">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2 class="mb-4"><?= $extra_fields['artists_title'] ?></h1>
            </div>
            <?php

            $posts = get_posts(array(
                'post_type' => 'my_artists',
                'numberposts' => 3,
                'order' => 'ASC'
            ));
            // print_r($posts);
            foreach ($posts as $key => $post) {
                $post_id = $post->ID;
                $name = get_field('name', $post_id);
                $birthdate = get_field('birthdate', $post_id);
                $music = get_field('music', $post_id);
                $youtube_channel = get_field('youtube_channel', $post_id);
                $artists_image = get_field('artists_image', $post_id);
                // echo  '</pre>';
                // exit;
            ?>
                <?php
                if ($key == 0 || $key == 1) {
                ?>
                    <div class="col-lg-5 col-12"> <?php } ?>
                    <div class="artists-thumb">
                        <div class="artists-image-wrap">
                            <img src="<?php echo $artists_image; ?>" class="artists-image img-fluid">
                        </div>
                        <div class="artists-hover">
                            <p>
                                <strong>Name:</strong> <?php echo $name; ?>
                            </p>
                            <p>
                                <strong>Birthdate:</strong> <?php echo $birthdate; ?>
                            </p>
                            <p>
                                <strong>Music:</strong> <?php echo $music; ?>
                            </p>
                            <p>
                                <strong>Youtube Channel:</strong> <a href=""><?php echo $youtube_channel; ?></a>
                            </p>
                        </div>
                    </div>
                    <?php
                    if ($key == 0 || $key == 2) {
                    ?>
                    </div>
                <?php } ?>
            <?php
            }
            wp_reset_postdata();
            ?>
        </div>
</section>

<section class="schedule-section section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h1 class="text-white mb-4">Event Schedule</h1>

                <div class="table-responsive">
                    <table class="schedule-table table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>

                                <th scope="col">Wednesday</th>

                                <th scope="col">Thursday</th>

                                <th scope="col">Friday</th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row">Day 1</th>

                                <td class="table-background-image-wrap pop-background-image">
                                    <h3>Pop Night</h3>

                                    <p class="mb-2">5:00 - 7:00 PM</p>

                                    <p>By Adele</p>

                                    <div class="section-overlay"></div>
                                </td>

                                <td style="background-color: #F3DCD4"></td>

                                <td class="table-background-image-wrap rock-background-image">
                                    <h3>Rock & Roll</h3>

                                    <p class="mb-2">7:00 - 11:00 PM</p>

                                    <p>By Rihana</p>

                                    <div class="section-overlay"></div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Day 2</th>

                                <td style="background-color: #ECC9C7"></td>

                                <td>
                                    <h3>DJ Night</h3>

                                    <p class="mb-2">6:30 - 9:30 PM</p>

                                    <p>By Rihana</p>
                                </td>

                                <td style="background-color: #D9E3DA"></td>
                            </tr>

                            <tr>
                                <th scope="row">Day 3</th>

                                <td class="table-background-image-wrap country-background-image">
                                    <h3>Country Music</h3>

                                    <p class="mb-2">4:30 - 7:30 PM</p>

                                    <p>By Rihana</p>

                                    <div class="section-overlay"></div>
                                </td>

                                <td style="background-color: #D1CFC0"></td>

                                <td>
                                    <h3>Free Styles</h3>

                                    <p class="mb-2">6:00 - 10:00 PM</p>

                                    <p>By Members</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pricing-section section-padding section-bg" id="section_5">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="text-center mb-4"><?= $extra_fields['pricing_title'] ?></h2>
            </div>

            <div class="col-lg-6 col-12">
                <div class="pricing-thumb">
                    <div class="d-flex">
                        <div>
                            <h3><small><?= $extra_fields['pricing_name1'] ?></small><?= $extra_fields['pricing_price1'] ?></h3>

                            <p>Including good things:</p>
                        </div>

                        <p class="pricing-tag ms-auto">Save up to <span><?= $extra_fields['pricing_discount1'] ?></span></h2>
                    </div>


                    <?= $extra_fields['pricing_features1'] ?>


                    <a class="link-fx-1 color-contrast-higher mt-4" href="ticket.html">
                        <span>Buy Ticket</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                <div class="pricing-thumb">
                    <div class="d-flex">
                        <div>
                            <h3><small><?= $extra_fields['pricing_name2'] ?></small><?= $extra_fields['pricing_price2'] ?></h3>

                            <p>What makes a premium festava?</p>
                        </div>
                    </div>

                    <?= $extra_fields['pricing_features2'] ?>

                    <a class="link-fx-1 color-contrast-higher mt-4" href="ticket.html">
                        <span>Buy Ticket</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="text-center mb-4">Interested? Let's talk</h2>

                <nav class="d-flex justify-content-center">
                    <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab" data-bs-target="#nav-ContactForm" type="button" role="tab" aria-controls="nav-ContactForm" aria-selected="false">
                            <h5><?= the_field('contact_form_title') ?></h5>
                        </button>

                        <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab" data-bs-target="#nav-ContactMap" type="button" role="tab" aria-controls="nav-ContactMap" aria-selected="false">
                            <h5><?= the_field('map_title') ?></h5>
                        </button>
                    </div>
                </nav>

                <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel" aria-labelledby="nav-ContactForm-tab">
                        <?php
                        $form = get_page_by_path('contact-form', OBJECT, 'post');
                        // print_r($form);
                        echo apply_filters('the_content', $form->post_content);
                        ?>
                    </div>

                    <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel" aria-labelledby="nav-ContactMap-tab">
                        <iframe class="google-map" src="<?= the_field('map_url') ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
// get_sidebar();
get_footer();
