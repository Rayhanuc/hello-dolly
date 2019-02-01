<?php
//alpha child theme ar enqueue
function alpha_child_bootstrap_ed(){
    wp_dequeue_style("bootstrap");
    wp_deregister_style("bootstrap");
    wp_enqueue_style("bootstrap", "//stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts", "alpha_child_bootstrap_ed");

function alpha_child_assets(){
    wp_enqueue_style("parent-style", get_parent_theme_file_uri("/style.css"), array("bootstrap"));
}
add_action("wp_enqueue_scripts", "alpha_child_assets");

// dequeue
function alpha_child_assets_dequeue(){
    wp_dequeue_style( "alpha-style" );
    wp_deregister_style("alpha-style");    
    wp_enqueue_style("alpha-style", get_theme_file_uri("/assets/testcss/alpha.css"));
}
add_action("wp_enqueue_scripts", "alpha_child_assets_dequeue",11);




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
                    
                    .header h1.heading a {
                        font-size: 84px;
                    }

                </style>
            <?php
        }
    }
}
add_action("wp_head", "alpha_about_page_template_banner", 11);


function alpha_todays_date() {
    echo date("d-m-Y");
}