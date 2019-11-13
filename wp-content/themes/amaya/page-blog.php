<?php

get_header();

$theme_url = get_stylesheet_directory_uri();

?>

    <style>
        @media only screen and (max-width: 768px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 100px 15px; min-height: 250px; text-align: left; }
        }
        @media only screen and (max-width: 600px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 80px 15px; min-height: 200px; }
        }
        @media only screen and (max-width: 500px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 70px 15px; min-height: 170px; }
        }
        @media only screen and (max-width: 400px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 80px 15px; min-height: 150px; }
        }
        @media only screen and (max-width: 375px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 60px 15px; min-height: 140px; }
        }
        @media only screen and (max-width: 350px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 50px 15px; min-height: 130px; }
        }
    </style>

    <div class="main-container col1-layout no-breadcrumbs">
        <div class="main main-content">
            <div class="col-main blog-col-main">

                <?php include 'title-banner.php'; ?>

                <div class="page-content-container container blog-content">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        ?>

                        <?php the_content(); ?>

                    <?php

                    endwhile;
                    ?>
                </div>

                <div class="blog-items container">
                    <?php $query = new WP_Query( 'post_type=post&orderby=date&order=ASC' ); ?>

                    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <?php $post_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>

                        <div class="blog-item">
                            <div class="row">
                                <div class="col-xs-5">
                                    <a class="blog-item-toggle" href="<?php the_permalink() ?>">
                                        <img src="<?php echo $post_thumbnail_url; ?>" alt="">
                                    </a>
                                </div>
                                <div class="col-xs-7">
                                    <div class="blog-item-header"><?php echo get_field( 'header_text', get_the_ID() ); ?><?php //the_time( 'j בF Y' ); ?></div>

                                    <h2 class="blog-item-title"><a class="blog-item-toggle" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                                    <div class="blog-item-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <div class="blog-item-content">
                                        <?php the_content(); ?>
                                    </div>

                                    <div class="blog-item-like">
                                        <div class="blog-item-footer"><?php echo get_field( 'footer_text', get_the_ID() ); ?></div>
                                        <?php //GetWtiLikePost(); ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- closes the first div box -->

                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>

                <script>
                    jQuery(function($) {
                       $('.blog-item-toggle').click(function() {
                           if ($(window).width() < 767) {
                               return true;
                           }

                           var toggle = $(this);
                           var item = toggle.parents('.blog-item').first();
                           var excerpt = item.find('.blog-item-excerpt');
                           var content = item.find('.blog-item-content');

                           if (item.hasClass('active')) {
                               content.stop().slideUp('fast', function () {
                                   excerpt.show();
                                   item.removeClass('active');
                               });
                           } else {
                               excerpt.hide();
                               content.stop().slideDown('fast', function () {
                                   item.addClass('active');
                               });
                           }

                           return false;
                       });
                    });
                </script>

            </div>
        </div>

        <div class="contact-form-container">
            <?php include 'contact-form.php'; ?>
        </div>

    </div>

<?php
get_footer();