<?php
/**
 * Template Name: Simple Page
 */

get_header();

?>

    <div class="main-container col1-layout no-breadcrumbs">
        <div class="main main-content">
            <div class="col-main">

                <?php
                while ( have_posts() ) :
                    the_post();

                    ?>

                    <?php include 'title-banner.php'; ?>

                    <div class="page-content-container container">
                        <?php the_content(); ?>
                    </div>
                <?php

                endwhile;
                ?>

                <?php amaya_product_footer(); ?>
                <br><br>

            </div>
        </div>
    </div>

<?php

get_footer();
