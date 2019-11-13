<?php

get_header();

$theme_url = get_stylesheet_directory_uri();

?>
    <style>
        .page-banner-panel { background-position: center top !important; }
        .about-device-video-desktop-hidden { margin-bottom: 20px !important; }
        @media only screen and (min-width: 1441px) {
            .about-device-video-wide-text { width: 250%; }
            .about-device-video-desktop-hidden { display: none !important; }
            .about-device-video-mobile-hidden { display: block !important; }
        }
        @media only screen and (max-width: 1440px) and (min-width: 767px) {
            .about-device-video-desktop-hidden { display: block !important; margin-bottom: 20px !important; }
            .about-device-video-mobile-hidden { display: none !important; }
            .about-device-video-block .video-text { width: 100% !important; padding: 0 45px !important; }
        }
        @media only screen and (min-width: 767px) {
            .page-banner-panel .text-table { width: 95%; }
            .page-banner-panel .text-cell { text-align: center !important; }
            .page-banner-panel .text-table .text-content { margin: 0 auto; width: 32%; text-align: center; }
        }
        /*@media only screen and (min-width: 2301px) {*/
        /*    .page-banner-panel .text-table { left: 42%; margin-left: -700px; width: 1000px; }*/
        /*    .page-banner-panel .text-table .text-content { padding-left: 0 !important; padding-right: 0 !important; }*/
        /*}*/
        /*@media only screen and (min-width: 1701px) and (max-width: 2300px) {*/
        /*    .page-banner-panel .text-table { width: 100%; max-width: 57%; }*/
        /*}*/
        /*@media only screen and (min-width: 1501px) and (max-width: 1700px) {*/
        /*    .page-banner-panel .text-table { width: 100%; max-width: 59%; }*/
        /*}*/
        /*@media only screen and (min-width: 1401px) and (max-width: 1500px) {*/
        /*    .page-banner-panel .text-table { width: 100%; max-width: 61%; }*/
        /*}*/
        /*@media only screen and (min-width: 1301px) and (max-width: 1400px) {*/
        /*    .page-banner-panel .text-table { width: 100%; max-width: 63%; }*/
        /*}*/
        /*@media only screen and (min-width: 1201px) and (max-width: 1300px) {*/
        /*    .page-banner-panel .text-table { width: 100%; max-width: 64%; }*/
        /*}*/
        /*@media only screen and (min-width: 768px) and (max-width: 1200px) {*/
        /*    .page-banner-panel .text-table { width: 100%; max-width: 65%; }*/
        /*}*/
        @media only screen and (max-width: 1200px) {
            .page-banner-panel .text-table .text-cell .text-content * { display: inline !important; margin: 0 !important; line-height: 32px !important; font-size: 24px !important; font-weight: normal !important; }
        }
        @media only screen and (max-width: 767px) {
            .page-banner-panel .text-table {  position: static; float: none; display: block; margin: auto; width: 45%; height: auto; }
            .page-banner-panel .text-table .text-cell { display: block; height: auto; }
            .page-banner-panel .text-table .text-cell .text-content { margin: 0; padding: 90px 50px 30px 10px; min-height: 250px; text-align: center; }
            .page-banner-panel .text-table .text-cell .text-content * { display: inline !important; margin: 0 !important; line-height: 24px !important; font-size: 18px !important; font-weight: normal !important; }
        }
        @media only screen and (max-width: 600px) {
            .page-banner-panel .text-table .text-cell .text-content { padding-top: 70px; min-height: 200px; }
            .page-banner-panel .text-table .text-cell .text-content * { line-height: 18px !important; font-size: 14px !important; }
        }
        @media only screen and (max-width: 500px) {
            .page-banner-panel .text-table .text-cell .text-content { padding-top: 40px; padding-right: 40px; min-height: 150px; }
            .page-banner-panel .text-table .text-cell .text-content * { line-height: 14px !important; font-size: 12px !important; }
        }
        @media only screen and (max-width: 400px) {
            .page-banner-panel .text-table .text-cell .text-content { padding-top: 30px; min-height: 100px; }
        }
    </style>

    <div class="main-container col1-layout ">
        <div class="main main-content">
            <div class="col-main">

                <?php include 'title-banner.php'; ?>

                <div class="page-content-container container about-device-content">
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
                        <div class="about-device-video-block video-block technology-video-block">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 video-pop mobile-hidden about-device-video-mobile-hidden">
                                        <p>
                                            <a class="fancybox video-pop-fancybox" href="<?php echo home_url( '/about-device-2/' ); ?>">
                                                <img src="<?php echo $theme_url; ?>/images/about-device-video-3.png">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-md-5 video-text">
                                        <p class="subtitle" style="direction: rtl; margin-bottom: 15px; font-size: 27px; line-height: 40px;">
איך הטכנולוגיה של מכשיר עובדת?
                                        </p>
                                        <p style="direction: rtl; font-size: 19px; line-height: 35px;">
                                            המכשיר גורם להאצת ייצור של חלבוני קלוגן ואלסטין,
                                            חלבונים טבעיים שאחראים על מיצוק, רענון וחידוש עור הפנים.
                                            מכשיר הדרמסוניק משלב 4 טכנולוגיות חדשניות, המסייעות לשיקום וטיפוח העור:<br>
                                            <strong>· טכנולוגית הגלבוניק -</strong>
                                            המעצימה את אפקט הפעולה של מכשיר הדרמוסוניק.<br>
                                            הטכנולוגיה מורכבת מ- 2 חלקים:<br>
                                            ION+: מטען חשמלי חיובי, המושך החוצה מן העור את כל הרעלים הנמצאים<br>
                                            בשכבות העמוקות:<br>
                                            נקודות שחורות, שומן, לכלכוך, עור יבש, ותאי עור מתים.<br>
                                            אפקט הניקוי של הנקבוביות דומה לתהליך שאיבה או מיגנוט.<br>
                                            ION-:  מטען חשמלי שלילי. המטען מסייע להחדרת הקרם והחומרים המזינים שבו<br>
                                            לשכבות העמוקות  של העור, לקבלת תוצאה מושלמת.
                                        </p>
                                        <p class="desktop-hidden about-device-video-desktop-hidden">
                                            <a class="fancybox video-pop-fancybox" href="<?php echo home_url( '/about-device-2/' ); ?>">
                                                <img src="<?php echo $theme_url; ?>/images/about-device-video-3.png">
                                            </a>
                                        </p>
                                        <p class="about-device-video-wide-text" style="direction: rtl; font-size: 19px; line-height: 35px;">
                                            <strong>· גלי אולטרסאונד -</strong>
                                            במהלך הטיפול, גלי אוטרה סאונד חודרים לעומק שכבות העור, למקום בו נמצאת שכבת השומן. בשלב זה, המכשיר מייצר ויברציות מיוחדות, שגורמות להריסת תאי השומן. אנרגית האולטרה סאונד מסייעת גם לשיפור מטבוליזם של העור - מסייעת לגופינו לייצר תאי עור חדשים שיחליפו את הוותיקים, ויעניקו לו מראה זוהר ורענן.<br>
                                            <strong>· טכנולוגיית אורות LED</strong><br>
                                            אנטי אייג'ינג, אור LED אדום - המגרה את תאי העור שמייצרים קלוגן, וגורם להם לייצר חלבון זה בכמות גדולה יותר. הקלוגן פועל למתיחת העור וסיוע בהענקת מראה צעיר יותר.
                                            האור האדום אף עוזר לזרימת הדם באזור הפנים ולהתחדשות תאים.<br>
                                            אנטי בקטריאלי, אור LED כחול - מאתר מקורות של חיידקים, הנמצאים מתחת לפני השטח של העור ותורמים להיווצרות אקנה. האור מסייע בהיווצרות חמצן, שעוזר לניקוי וסילוק חיידקים אלו, מבלי לגרום לכל פגיעה.<br>
                                            אנטי פיגמנטציה , אור LED ירוק - משפר את זרימת החמצן לפנים ומשקם את תאי העור. האור הירוק מעניק מראה עור פנים חלק, מסיר בצקות ונפיחות.<br>
                                            <strong>· עיסוי רוטט -</strong>
                                            מזרים דם לאזור הפנים בעזרת 6,000-7,000 רעידות פר דקה. העיסוי אף המסייע לקרם הפנים לחדור לשכבות העמוקות של העור ובכך גורם לו להעניק תוצאות מוכחות: מתיחת פנים ללא התערבות כירורגית.<br>
                                            כל הטכנולוגיות הללו נמצאות במכשיר אחד, פשוט להפעלה, ומסייעות לקבלת מראה עור צעיר יותר, על ידי החלקת קמטים, הידוק עור הפנים, המרצת זרימת הדם לאזור הפנים וסילוק התאים המתים.<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="technologyTop difference about-device-skin-section">
                            <div class="container">

                                <p class="subtitle1">
                                    חלק מהתוצאות שהושגו בטיפולים אלה כוללים:<br>
                                </p>

                                <p>
                                    · הפחתה בהופעתם של קמטים וקמטוטי עור אשר מביאים להתחדשות והתרעננות<br>
                                    · עידוד תפוקה טבעית של קולגן ושיפור האלסטיות של העור אשר מאזן את אחידות גוון העור<br>
                                    · שיפור משמעותי של זרימת דם בפנים אשר מעניקה זוהר וצבע בהיר לעור.
                                </p>

                                <p>
                                    ברוב הטיפולים האחרים רואים תוצאות לאחר הטיפול השמיני .
                                </p>

                                <p class="subtitle2">
                                    <strong>
                                    לאחר כל  טיפול וטיפול ,רמת הקולגן תגדל ותרים את העור.חשיבות המשכיות הטיפול לאורך זמן היא קריטית<br>
                                    בכדי להפוך את ההשפעה המיידית לקבועה.
                                    </strong>
                                </p>

                                <p class="subtitle2">
                                    <strong>
                                    המכשיר קטן , נוח ופשוט לשימוש , תוכלי להשתמש בו מהספה, מהמיטה , ברכבת , במטוס ובכל מקום!
                                    </strong>
                                </p>

                                <div class="img-panel">
                                    <img src="<?php echo $theme_url; ?>/images/about-device-skin.png">
                                </div>
                            </div>
                        </div>
                        <div class="about-device-description-section">
                            <div class="container">
                                <p class="subtitle1">
                                    מה תרוויחי ע"י שימוש במכשיר :
                                </p>

                                <p>
                                    המכשיר משמש להידוק וחיזוק העור,<br>
                                    הטיפול באמצעותו:<br>
                                    · מנקה ומקטין  נקבוביות למינימום,מיישר קמטים.<br>
                                    · ניקוי אנטיבקטריאלי עמוק.<br>
                                    · עור פנים מתוח וזוהר.<br>
                                    · החדרה עמוקה של חומרים פעילים.<br>
                                    · יצור מחודש של קולגן ואלסטין.<br>
                                    · העלמת כתמי פיגמנטציה וצלקות מאקנה.
                                </p>

                                <p>
                                    <strong>
                                        טיפול במכשיר מוסיף גמישות ואלסטיות לעור, מחזיר זוהר  וגוון אור מואר.
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="about-device-gift-section" style="background: url(<?php echo $theme_url; ?>/images/about-device-gift-4.png) no-repeat left bottom;">
                            <div class="container">
                                <p class="subtitle1">
                                    אנחנו מאמינים במכשיר וכך גם הלקוחות שלנו ולכן:
                                </p>

                                <p>
                                    <strong>
                                        ·אנחנו מעניקים חודשיים ניסיון<br>
                                        ·אחריות לשנתיים על הטכנולוגיה<br>
                                        ·משלוחים חינם עד פתח דלתך
                                    </strong>
                                </p>

                                <p>
                                    <strong>
                                        ובנוסף תקבלי מאיתנו ליווי צמוד - לא תישארי לבד לרגע!
                                    </strong>
                                </p>

                                <p class="subtitle1">
                                    הכי חשוב שתזכרי :
                                </p>

                                <p>
                                    ·הטיפול הוא בטוח ופשוט,ואינו כרורגי<br>
                                    ·אינו חודרני או פולשני<br>
                                    ·לא דורש הרדמה<br>
                                    ·הטיפול ללא כאב ולא מצריך תקופת החלמה<br>
                                    ·אין תופעות לוואי<br>
                                    ·ולא גורם שום נזק לעור
                                </p>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $j("a.video-pop-fancybox").click(function () {
                                $j.fancybox({
                                    'padding': 20,
                                    'autoScale': false,
                                    'transitionIn': 'none',
                                    'transitionOut': 'none',
                                    'title': this.title,
                                    'width': 640,
                                    'height': 385,
                                    'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                                    'type': 'iframe'/*,
                                    'swf': {
                                        'wmode': 'transparent',
                                        'allowfullscreen': 'true'
                                    }*/
                                });
                                return false;
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form-container">
            <?php include 'contact-form.php'; ?>
        </div>
    </div>

<?php

get_footer();
