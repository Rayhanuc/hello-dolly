<?php
/*
Template Name: About Page Template
*/
?>
<?php get_header()?>

<body <?php body_class();?>>

<?php get_template_part("/template-parts/about-page/hero-page");?>


    <div class="posts"><!-- posts start div -->
        <?php
            while(have_posts()) :
                the_post();
            
        ?><!-- While loop start for post -->
        <div class="post" <?php post_class();?>><!-- single post start div -->
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center">
                            <?php the_title();?>
                        </h2>
                        <p class="text-center">
                            <strong><?php the_author(); ?></strong><br/>
                            <?php echo get_the_date();?>
                        </p>
                    </div>
                    <div class="row"><!-- testimonial section start -->
                        <div class="col-md-8 offset-md-2">
                            <?php
                            $attachments = new Attachments( 'testimonials' );
                            if ( class_exists( 'Attachments' ) && $attachments->exist() ) {
                                ?>
                            <h2 class="testi-heading text-center">
                                <?php echo _e("Testimonials", "alpha") ; ?>
                            </h2>
                            <?php
                            }
                            ?>
                            <div class="testimonials text-center">
                                
                                <?php
                                    if ( class_exists( 'Attachments' ) ) {
                                        
                                        if ( $attachments->exist() ) {
                                            while ($attachment = $attachments->get() ) {
                                                ?>
                                                    <div>
                                                        <?php echo $attachments->image( 'thumbnail' );?>
                                                        <h4><?php echo esc_html($attachments->field( 'name' ));?></h4>
                                                        <p><?php echo esc_html($attachments->field( 'testimonial' ));?></p>
                                                        <p>
                                                            <?php echo esc_html($attachments->field( 'position' ));?>,<br/>
                                                            <strong>
                                                                <?php echo esc_html($attachments->field( 'company' ));?>
                                                            </strong>
                                                        </p>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>

                        <?php
                        if(class_exists("Attachments")) {
                        ?>
                        <div class="row">
                        <?php
                            if ( class_exists( 'Attachments' ) ) {
                                $attachments = new Attachments( 'team' );
                                if ( $attachments->exist() ) {
                                    while ($attachment = $attachments->get() ) {
                                        ?>
                                            <div class="col-md-4">
                                                <?php echo $attachments->image( 'medium' );?>
                                                <h4><?php echo esc_html($attachments->field( 'name' ));?></h4>
                                                <p>
                                                    <?php echo esc_html($attachments->field( 'position' ));?>,<br/>
                                                    <strong>
                                                        <?php echo esc_html($attachments->field( 'company' ));?>
                                                    </strong>
                                                </p>
                                                <p><?php echo esc_html($attachments->field( 'bio' ));?></p>
                                                <p><?php echo esc_html($attachments->field( 'email' ));?></p>
                                                
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        </div>

                        <?php
                        }
                        ?> 

                        <div class="col-md-10 offset-md-1">
                            <p>
                                <?php
                                    //for post thumbnail/image
                                    if(has_post_thumbnail()) {
                                        //$thumbnail_url = get_the_post_thumbnail_url( null, "large" );
                                        // echo "<a href="'.$thumbnail_url.'" data-featherlight="image">";
                                        echo '<a class="phpup" href="#" data-featherlight="image">';
                                        the_post_thumbnail("large", array("class"=>"img-fluid"));
                                        echo "</a>";
                                    }

                                    the_content();

                                    // next_post_link();
                                    // echo "<br/>";
                                    // previous_post_link();
                                ?>
                            </p>
                            
                        </div>                     
                    </div><!-- testimonial section end -->                                      
                </div>

            </div>
        </div><!-- single post end div -->
        <?php endwhile;?><!-- end While loop for post -->

        <div class="continer post-pagination">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <?php
                        the_posts_pagination(array(
                            "screen_reader_text" => " ",
                            "prev_text" => __("New Posts", "alpha"),
                            "next_text" => __("Next Posts", "alpha"),
                        ));
                    ?>
                </div>
            </div>
        </div>
    </div><!-- posts end div -->



<?php get_footer();?>