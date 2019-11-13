<?php

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

        </div>
    </div>

    <div class="contact-form-container">
        <?php include 'contact-form.php'; ?>
    </div>
</div>

<?php

get_footer();
