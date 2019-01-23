<?php get_header()?>

<body <?php body_class();?>>

<?php get_template_part("/template-parts/common/hero")?>
<!-- author section start -->
<div class="container">
    <div class="authorsection authorpage">
        <div class="row">
            <div class="col-md-2 authorimage">
                <?php 
                    echo get_avatar(get_the_author_meta( "id" ));
                ?>
            </div>
            <div class="col-md-10">
                <h4>
                    <?php echo get_the_author_meta("display_name");?>
                </h4>
                <p>
                    <?php echo get_the_author_meta("description");?>
                </p>              
            </div>
        </div>                            
    </div>
</div>
<!-- author section end -->

<div class="posts text-center"><!-- posts start div -->    
    <?php
        while(have_posts()) {
            the_post();
            ?>
                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <?php
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