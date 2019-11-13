<?php

get_header();

$theme_url = get_stylesheet_directory_uri();

?>

    <style>
        .page-banner-panel { background-position: center top !important; }
        /*@media only screen and (min-width: 1201px) {*/
        /*    .page-banner-panel .text-table { left: 50%; margin-left: -450px; width: 900px; }*/
        /*    .page-banner-panel .text-table .text-content { padding-left: 0 !important; padding-right: 0 !important; }*/
        /*}*/
        /*@media only screen and (min-width: 1401px) and (max-width: 2300px) {
            .page-banner-panel .text-table { width: 100%; max-width: 75%; }
        }*/
        @media only screen and (min-width: 768px) {
            .page-banner-panel .text-table { width: 100%; max-width: 77%; }
            .page-banner-panel .text-content { width: 50%; text-align: center; }
        }
        @media only screen and (max-width: 1200px) {
            .page-banner-panel .text-table .text-cell .text-content * { line-height: 35px !important; font-size: 25px !important; }
        }
        @media only screen and (max-width: 767px) {
            .page-banner-panel { background-position: center bottom !important; }
            .page-banner-panel .text-table {  position: static; float: none; display: block; margin: auto; width: 55%; height: auto; }
            .page-banner-panel .text-table .text-cell { display: block; height: auto; }
            .page-banner-panel .text-table .text-cell .text-content { margin: 0; padding: 90px 0 90px 120px; min-height: 300px; text-align: right; }
            .page-banner-panel .text-table .text-cell .text-content * { display: inline !important; margin: 0 !important; line-height: 24px !important; font-size: 18px !important; font-weight: normal !important; }
        }
        @media only screen and (max-width: 700px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 70px 0 70px 120px; min-height: 250px; }
        }
        @media only screen and (max-width: 600px) {
            .page-banner-panel .text-table .text-cell .text-content { padding: 50px 0 50px 120px; min-height: 230px; }
            .page-banner-panel .text-table .text-cell .text-content * { line-height: 18px !important; font-size: 14px !important; }
        }
        @media only screen and (max-width: 500px) {
            .page-banner-panel .text-table { width: 80%; }
            .page-banner-panel .text-table .text-cell .text-content { padding-top: 40px; padding-right: 40px; min-height: 180px; }
            .page-banner-panel .text-table .text-cell .text-content * { line-height: 14px !important; font-size: 12px !important; }
        }
        @media only screen and (max-width: 430px) {
            .page-banner-panel .text-table { width: 90%; }
            .page-banner-panel .text-table .text-cell .text-content { padding-top: 30px; min-height: 100px; }
        }
        @media only screen and (max-width: 375px) {
            .page-banner-panel .text-table { width: 90%; }
            .page-banner-panel .text-table .text-cell .text-content { line-height: 12px !important; font-size: 11px !important; }
        }
    </style>

    <div class="main-container col1-layout no-breadcrumbs">
        <div class="main main-content">
            <div class="col-main">

                <?php include 'title-banner.php'; ?>

                <div class="page-content-container container how-to-use-content">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        ?>

                        <?php the_content(); ?>

                    <?php

                    endwhile;
                    ?>
                </div>

                <div class="std">
                    <div>
                        <div class="how-to-use-video-block video-block technology-video-block">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="subtitle1">
                                            הוראות שימוש:
                                        </p>
                                        <p>
                                            נרכיב את המשקפיים המיוחדות שמגיעות עם המכשיר, בכדי להמנע מקרני אור ה- LED לפגוע באיזור העיניים. לאחר מכן,<br>
                                            נניח את הגומיה שנמצאת בקופסת המכשיר על החלק הכסוף על פני המכשיר, בכדי למנוע חדירת מים לאזור.<br>
                                            נמרח קרם פנים, נבחר את האור הרצוי לנו בלחיצה על המתגים, ונעסה את העור בעזרת המכשיר בתנועות סיבוביות.<br>
                                            אור כחול - כ- 3 דקות של עיסוי בעזרת המכשיר,<br>
                                            אור אדום - כ- 10 דקות של עיסוי,<br>
                                            אור ירוק - כ- 2-3 דקות של עיסוי.<br>
                                            מומלץ להשתמש במכשיר לפני שינה.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="faq-items-section">
                    <div class="faq-items-title">שאלות ותשובות</div>
                    <div class="faq-items">
                        <div class="faq-item-wrapper">
                            <div class="faq-item active">
                                <div class="faq-item-title">
                                    מהי התדירות שבה עלי להשתמש במכשיר הדרמסוניק?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: block">
                                    טכנולוגיה לחידוש העור דורשת טיפולים מתמידים וחוזרים על מנת להשיג תוצאות לזמן ארוך .סדרת הטיפולים הראשונית נמשכת חודש שלם, ההמלצה היא לבצע טיפול בכל האזורים בפנים  כחמש פעמים בשבוע, כאשר כל אזור מטופל במשך 6 דקות .בתום החודש הראשון מומלץ להמשיך עם הטיפולים פעם או פעמיים בשבוע. לאחר החודש הראשוןאפשר לראות הבדל משמעותי באיכות העור והצבע שלו.

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    האם אפשר לעבור על אזור מסוים כמה פעמים באותו טיפול?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    למרות שזה עשוי להיות מפתה, לא מומלץ לבצע את טיפולי הפנים על אותו האזור במשך יותר משש דקות .6 דקות של טיפול פנים לאזור מסוים הוכחו על ידי מומחים כזמן האידיאלי על מנת להגיע לרמת החימום ההכרחית ליצירת קולגן,תוך שמירה על העור שלך. סיבה נוספת לטיפול המדויק היא לוודא שהטיפול שווה בכל אזור למראה אחיד ושווה בכל הפנים. רצוי להימנע משימוש יתר! 

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    האם אפשר להשתמש במכשיר באזורים נוספים בגוף?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    מכשיר הדרמסוניק פותח בצורה ייחודית על ידי צוות מומחים ומטרתו לספק תוצאה של מתיחת פנים ללא ניתוח. הוא נועד לשימוש בעור הפנים ולא מכוון לשימוש  בחלקי גוף אחרים. (יש אופציה לשימוש עבור עור כפות ידיים).

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    האם אפשר להשתמש במכשיר הדרמסוניק סביב העיניים?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    למען ביטחונך ולתוצאות אופטימליות של טיפולי הפנים, נא לא להשתמש במכשיר קרוב מדי לעיניים ולעפעפיים .נא לנהוג בזהירות גם בשימוש עם הג'ל, יש לדאוג שלא יהיה קרוב לעיניים או בתוך העין – הדבר עלול לגרום לנזק. 

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    במידה ויש לי אקנה , פצעים , אקזמה או בעיות עור אחרות, אני יכולה להשתמש במכשיר?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    השימוש במכשיר הדרמסוניק  מיועד להחייאת העור. אין להשתמש בו לטיפול במחלות עור, אקנה, שומות, יבלות, פצעים פתוחים, נגע סרטני או כל בעיה בעור. 

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    האם אפשר להשתמש במכשיר על עור שזוף מהשמש?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    אפשר לטפל על עור שזוף. עם זאת, אם עורך נשרף והוא אדום ורגיש, הימנעי משימוש בתכשיר עד שתעבור האדמומיות ותיעלם הרגישות. 

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    האם הטיפול כואב?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    לא! לא רק שהטיפול בעזרת מכשיר הדרמסוניק הוא ללא כאב בכלל, הוא אף נעים ,מרגיע ומרגיש כמו מסאז' חמים בספא מפנק. זאת הודות למיקוד האנרגיה ישירות בשכבה העמוקה של העור שלך. 

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    מה אורך החיים הצפוי של המכשיר?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    היתרון של המכשיר על פני טיפולים מקצועיים חלופיים הוא שאת יכולה להשתמש בו שוב אחרי שהתוצאות דהו, ולכן מדובר בהשקעה לטווח ארוך. בנוסף את מקבלת מאיתנו אחריות לשנתיים על הטכנולוגיה! 

                                </div>
                            </div>
                        </div>
                        <div class="faq-item-wrapper">
                            <div class="faq-item">
                                <div class="faq-item-title">
                                    האם אני יכולה להמשיך להשתמש במוצרי הטיפוח שלי בזמן הטיפול ?

                                    <div class="faq-item-button"></div>
                                </div>
                                <div class="faq-item-content" style="display: none">
                                    במהלך הטיפול אפשר להמשיך ולהשתמש כרגיל בתכשירי טיפוח למטרות שונות, ביניהן ניקוי והענקת לחות לעור הפנים.

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <script>
                    jQuery(function ($) {
                        $('.faq-items').each(function () {
                            var items = $(this);

                            items.find('.faq-item-button').click(function() {
                                var button = $(this);
                                var item = button.parents('.faq-item').first();
                                var content = item.find('.faq-item-content');

                                if (item.hasClass('active')) {
                                    item.removeClass('active');
                                    content.stop().slideUp('fast');
                                } else {
                                    items.find('.faq-item.active').removeClass('active').find('.faq-item-content').stop().slideUp('fast');

                                    item.addClass('active');
                                    content.stop().slideDown('fast');
                                }
                            });
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