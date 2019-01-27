<?php

// attachments.php file include
if ( class_exists( 'Attachments' ) ) {
    require_once("lib/attachments.php");
}


//FOR DYNAMIC VERSION
if(site_url() == "http://hellodolly.local"){
    define("VERSION", time());
}else {
    define("VERSION", wp_get_theme()->get("version"));
}


function alpha_bootstrapping() {
    load_theme_textdomain( "alpha" );
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support( 'html5', array( 'search-form' ) );

    add_theme_support("post-formats", array("image","quote","video","audio","link","gallery") );

    $alpha_custom_header_details = array(
        'header-text'           => true,
        'default-text-color'    => '#222',
        'width'                 => 1200,
        'height'                => 600,
        'flex-width'            => true,
        'flex-height'           => true,

    );
    add_theme_support("custom-header", $alpha_custom_header_details);
    $alpha_custom_logo_default = array(
        'height'      => 100,
        'width'       => 100,

    );
    add_theme_support("custom-logo", $alpha_custom_logo_default);

    add_theme_support("custom-background");
    register_nav_menu("topmenu", __("Top Menu", "alpha")); 
    register_nav_menu("footermenu", __("Footer Menu", "alpha"));

    // থিমে নতুন ইমেইজ সাইজ যোগ করা
    add_image_size("alpha-square", 400, 400,true ); // center center
    add_image_size("alpha-potrait", 400, 9999);
    add_image_size("alpha-landscape", 9999, 400);
    add_image_size("alpha-landscape-hard-croped", 600, 400);

    add_image_size("alpha-square-two",400,400,true);

    add_image_size("alpha-square-new",400,400,array("left","top"));
}
add_action("after_setup_theme", "alpha_bootstrapping");


function alpha_assets(){
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("featherlight", "//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css");
    // Dashicons enqueue
    wp_enqueue_style("dashicons");
    wp_enqueue_style("tns-style", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/tiny-slider.css");
    wp_enqueue_style("alpha", get_stylesheet_uri(), null, VERSION);

    wp_enqueue_script("tns-js","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.js", null, "2.9.1", true);
    wp_enqueue_script("featherlight-js","//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js", array("jquery"), "0.0.1", true);
    //new js system enqueue
    wp_enqueue_script( "alpha-main", get_theme_file_uri("/assets/js/main.js"), array("jquery", "featherlight-js"), VERSION, true );
}
add_action("wp_enqueue_scripts", "alpha_assets");


function alpha_sidebar() {
    register_sidebar(
        array(
            'name' => __('Single Post Sidebar', 'alpha'),
            'id'   => 'sidebar-1',
            'description' => __('Right Sidebar', 'alpha'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

    register_sidebar(
        array(
            'name' => __('Footer Left', 'alpha'),
            'id'   => 'footer-left',
            'description' => __('Wigetized Area On The Left Side', 'alpha'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '',
            'after_title' => ''
        )
    );
    register_sidebar(
        array(
            'name' => __('Footer Right', 'alpha'),
            'id'   => 'footer-right',
            'description' => __('Wigetized Area On The Right Side', 'alpha'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '',
            'after_title' => ''
        )
    );
}
add_action("widgets_init","alpha_sidebar");

function alpha_the_excerpt($excerpt) {
    if (!post_password_required()) {
        return $excerpt;
    }else {
        echo get_the_password_form();
    }
}
add_filter("the_excerpt","alpha_the_excerpt");

function alpha_protect_title_change() {
    return "%s";
}
add_filter( "protected_title_format", "alpha_protect_title_change" );

// for menu item/li class
function alpha_menu_item_class(){
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class", "alpha_menu_item_class", 10, 2);

function alpha_about_page_template_banner(){
    if(is_page()) {
        $alpha_feat_image = get_the_post_thumbnail_url(null, "large");
    ?>
    <style>
        /* Our style goes here */
        .page-header {
            background-image:url(<?php echo $alpha_feat_image; ?>)
        }
    </style>
    <?
    }

    if (is_front_page()){
        if(current_theme_supports("custom-header")){
            ?>
                <style>
                    .header {
                        background-image:url(<?php echo header_image();?>);
                        background-size: cover;
                        background-position: center;
                        margin-bottom:50px;
                    }

                    .header h1.heading a, h3.tagline {
                        color: #<?php echo get_header_textcolor();?>;
                        <?php
                        if (!display_header_text()){
                            echo "display: none;";
                        } 
                        
                        ?>
                    }

                    h1.heading {                        
                        <?php
                        if (!display_header_text()){
                            echo "border-bottom: none;";
                        }                        
                        ?>
                    }
                    
                </style>
            <?php
        }
    }
}


add_action("wp_head", "alpha_about_page_template_banner", 11);


// body class remove method
function alpha_body_class($classes){
    // unset means remove class
    unset($classes[array_search("custom-background", $classes)]);
    unset($classes[array_search("single-format-video", $classes)]);

    // add class
    $classes[] = "bodyclass";
    return $classes;
}
add_filter("body_class", "alpha_body_class");


// post class remove method
function alpha_post_class($classes){
    //remove post class
    unset($classes[array_search("format-video", $classes)]);

    // add post class
    $classes[] = "postclass";
    return $classes;
}
add_filter("post_class", "alpha_post_class");


function alpha_highlight_search_results($text) {
    if(is_search()) {
        //  /(hello|world)/i  pattern
        $pattern = '/('. join('|', EXPLODE(' ', GET_SEARCH_QUERY())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'alpha_highlight_search_results');
add_filter('the_excerpt', 'alpha_highlight_search_results');
add_filter('the_title', 'alpha_highlight_search_results');