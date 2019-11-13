<?php

//get_header();
?>

    <style>
        body,
        .wp-video,
        .wp-video-shortcode { margin: 0 !important; padding: 0 !important; width: 640px !important; max-width: 100% !important; height: 385px !important; }
    </style>

    <?php
    while ( have_posts() ) :
        the_post();

        ?>

        <div class="page-content-container container">
            <?php the_content(); ?>
        </div>

    <?php

    endwhile;
    ?>

    <script>
        var vid = document.getElementById("video-80-1");
        vid.autoplay = true;
        vid.load();
    </script>

<?php
//get_footer();
