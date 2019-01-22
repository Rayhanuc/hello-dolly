<?php get_header()?>

<body <?php body_class();?>>

<?php get_template_part("/template-parts/common/hero")?>

<div class="posts text-center"><!-- posts start div -->
    <h1>
        Posts In
        <?php
        if(is_month()) {
            $month =  esc_html(get_query_var("monthnum"));
            $dateobj = DateTime::createFromFormat("!m", $month);
            echo $dateobj->format("F");
        } else if (is_year()) {
            echo esc_html(get_query_var("year"));
        } else if (is_day()) {
            $day = esc_html(get_query_var("day"));
            $month = esc_html(get_query_var("monthnum"));
            $year = esc_html(get_query_var("year"));
            printf("%s/%s/%s", $day, $month, $year);
            //echo get_query_var("day"), "/".get_query_var("monthnum")."/".get_query_var("year");
        }
        ?>
    </h1>
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