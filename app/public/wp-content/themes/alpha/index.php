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
                <div class="col-md-12">
                    <h2 class="post-title">
                        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <strong><?php the_author(); ?></strong><br/>
                        <?php echo get_the_date();?>
                    </p>

                    <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>")?>
                </div>
                <div class="col-md-8">
                    <p>
                        <?php
                            if(has_post_thumbnail()) {
                                the_post_thumbnail("large", array("class"=>"img-fluid"));
                            }
                        ?>
                    </p>

                    <?php 
                        the_excerpt();
                    ?>
                    
                </div>
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