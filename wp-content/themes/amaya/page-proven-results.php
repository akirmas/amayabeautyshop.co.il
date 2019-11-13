<?php

get_header();

$theme_url = get_stylesheet_directory_uri();

?>

    <style>
        @media only screen and (max-width: 768px) {
            .page-banner-panel { background-position: center bottom !important; }
            .page-banner-panel .text-table .text-cell .text-content { padding: 100px 10px; min-height: 250px; text-align: center; }
        }
        @media only screen and (max-width: 600px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 60px 10px; min-height: 200px; }
        }
        @media only screen and (max-width: 500px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 50px 10px; min-height: 160px; }
        }
        @media only screen and (max-width: 400px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 40px 10px; min-height: 150px; }
        }
        @media only screen and (max-width: 375px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 40px 10px; min-height: 140px; }
        }
        @media only screen and (max-width: 350px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 40px 10px; min-height: 130px; }
        }
    </style>


    <div class="main-container col1-layout no-breadcrumbs">
        <div class="main main-content">
            <div class="col-main proven-results-col-main">

                <?php include 'title-banner.php'; ?>



                <div class="before-after-block home-block">
                    <h1 class="proven-results-title">לפני אחרי</h1>
                    
                    <div class="container">
                        <div class="twentytwenty twentytwenty-home">
                            <div class="twentytwenty-container-main">
                                <div class="twentytwenty-item item-4" style="float: none; margin-left: auto; margin-right: auto; padding: 0; max-width: 600px">
                                    <div class="description">
                                        <span><strong>בת 41 - שלושה שבועות מתחילת הטיפול - </strong> הפחתה משמעותית של קמטים בשפה
                                            העליונה, טשטוש הנפיחות מתחת לעיניים ושיפור מרשים של מרקם העור.
                                        </span>
                                    </div>
                                    <div class="before-after twentytwenty-container" id="item-4">
                                        <img src="<?php echo $theme_url; ?>/images/before-after/4-after-3.jpg" alt="גלי רדיו לפנים - אחרי טיפול בניואה">
                                        <img src="<?php echo $theme_url; ?>/images/before-after/4-before.jpg" alt="גלי רדיו לפנים - לפני טיפול בניואה">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="twentytwenty twentytwenty-home">
                            <div class="twentytwenty-container-main">
                                <div class="twentytwenty-item item-1">
                                    <div class="description">
                                        <span>
                                            <strong>בת 54 - חודש וחצי מתחילת הטיפול -</strong>
                                            הפחתה ניכרת של קמטי הפנים, השפה והלסת נקבוביות בולטות וקמטים מסביב לשפתיים.
                                        </span>
                                    </div>
                                    <div class="before-after twentytwenty-container" id="item-1">
                                        <img src="<?php echo $theme_url; ?>/images/before-after/1-after.jpg" alt="העלמת קמטים בצידי הפה - אחרי טיפול בניואה">
                                        <img src="<?php echo $theme_url; ?>/images/before-after/1-before.jpg" alt="העלמת קמטים בצידי הפה - לפני טיפול בניואה">
                                    </div>
                                </div>

                                <div class="twentytwenty-item item-2">
                                    <div class="description">
                                        <span>
                                            <strong>בת 37 –</strong>
                                            העור התבהר ,התמצק והביא לתוצאה מהממת.
                                        </span>
                                    </div>
                                    <div class="before-after twentytwenty-container" id="item-2">
                                        <img src="<?php echo $theme_url; ?>/images/before-after/2-after.jpg" alt="גלי רדיו לפנים - אחרי טיפול בניואה">
                                        <img src="<?php echo $theme_url; ?>/images/before-after/2-before.jpg" alt="גלי רדיו לפנים - לפני טיפול בניואה">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $j(window).load(function() {
                            $j(".before-after").twentytwenty();
                        });
                    </script>
                </div>

            </div>

            <div class="proven-results-wrapper">
                <div class="page-content-container container proven-results-content">
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