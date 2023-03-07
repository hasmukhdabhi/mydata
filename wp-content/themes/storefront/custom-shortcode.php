<?php
function subscribe_link()
{
    return 'Follow us on <a rel="nofollow" href="https://twitter.com/">Twitter</a>';
    // return 'Follow us on <a rel="nofollow" href="https://www.w3schools.com/">w3schools</a>';
}
add_shortcode('subscribe', 'subscribe_link');

// function subscribe_link_att($atts, $content = null)
// {
//     $default = array(    
//         'link' => '#',
//     );
//     $a = shortcode_atts($default, $atts);
//     $content = do_shortcode($content);
//     return 'Follow us on <a href="' . ($a['link']) . '" style="color: blue">' . $content . '</a>';
// }
// add_shortcode('subscribe', 'subscribe_link_att');
