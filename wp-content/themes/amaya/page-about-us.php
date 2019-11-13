<?php

get_header();

$theme_url = get_stylesheet_directory_uri();

?>

    <div class="main-container col1-layout no-breadcrumbs">
        <div class="main main-content">
            <div class="col-main">

                <?php include 'title-banner.php'; ?>

                <div class="page-content-container container">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        ?>

                        <?php the_content(); ?>

                    <?php

                    endwhile;
                    ?>
                </div>

            </div>
        </div>

        <div class="contact-form-container">
            <?php include 'contact-form.php'; ?>
        </div>
    </div>

<?php
get_footer();