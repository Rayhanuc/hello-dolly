<?php
//alpha child theme ar enqueue
function alpha_child_assets(){
    wp_enqueue_style("parent-style", get_parent_theme_file_uri("/style.css"));
    // wp_enqueue_style("alpha-style");
}
add_action("wp_enqueue_scripts", "alpha_child_assets");