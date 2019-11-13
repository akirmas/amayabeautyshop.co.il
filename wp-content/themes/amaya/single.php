<?php

$post_id = get_the_ID();
$post_thumbnail_url = get_the_post_thumbnail_url( $post_id, 'full' );
$title = get_the_title();
get_header();

?>

    <div class="main-container col1-layout no-breadcrumbs">
        <div class="main main-content">
            <div class="col-main">

                <?php
                while ( have_posts() ) :
                    the_post();

                    ?>

                    <div class="page-content-container container">
                        <?php if ( $post_thumbnail_url ): ?>

                            <div class="single-post-thumbnail">
                                <img src="<?php echo $post_thumbnail_url; ?>">
                            </div>

                        <?php endif; ?>

                        <h1 class="page-title single-post-title"><?php the_title(); ?></h1>

                        <?php the_content(); ?>
                    </div>

                <?php

                endwhile;
                ?>

            </div>
        </div>
    </div>

<?php

get_footer();
