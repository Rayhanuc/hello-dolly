<?php get_header()?>

<body <?php body_class();?>>

<?php get_template_part("/template-parts/common/hero")?>

<div class="posts"><!-- posts start div -->
    <?php
        if( ! have_posts() ){
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>
                            <?php echo _e("No result found!", "alpha");?>
                        </h4>
                    </div>
                </div>
            </div>
        <?php
        }
        while(have_posts()) {
            the_post();
            get_template_part("/post-formats/content", get_post_format());
        }
    ?><!-- end While loop for post -->

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