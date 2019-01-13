<?php get_header()?>

<body <?php body_class();?>>

<?php get_template_part("hero")?>

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
            </div>
            <div class="row">
                
                <div class="col-md-10 offset-md-1">
                    <p>
                        <?php
                            if(has_post_thumbnail()) {
                                the_post_thumbnail("large", array("class"=>"img-fluid"));
                            }

                            the_content();
                        ?>
                    </p>
                    
                </div>

                <?php if(comments_open()) : ?>
                    <div class="col-md-10 offset-md-1">
                        <?php comments_template();  ?>
                    </div>
                <?php endif;?>
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