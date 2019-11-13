<?php

get_header();

$theme_url = get_stylesheet_directory_uri();

?>

    <script type="text/javascript">
        $j(document).ready(function () {
            $j(".page-header-container div.top-links li").each(function (index) {
                var classN = $j(this).attr('class');
                if ('page-' == classN)
                    $j(this).addClass('active');
            });
            if ($j(window).width() < '992') {
                $j('.page-header-container div.top-links li.parent span').click(function () {
                    $j(this).next('ul').slideToggle();
                    $j(this).parent().toggleClass('closev');
                });
            }
        });
    </script>
    
    <div class="slider" style="position: relative;">
        <!-- start enable -->
        <div class="ma-banner7-container">
            <div class="ma-owlCarousel">
                <div id="ma-owlCarousel" class="slides ">
                    <div class="item home-banner">
                        <div class="home-banner-slide" style="position: relative; display: block; background: url(<?php echo $theme_url; ?>/images/home-banner-2.png) no-repeat center top; background-size: cover;">
                            <div class="text-table">
                                <div class="text-cell">
                                    <div class="text-content">
                                        <div class="text-title">
                                            <img class="mobile-hidden" src="<?php echo $theme_url ?>/images/logo_4.png" alt="">
                                            <a href="<?php echo site_url(); ?>" class="desktop-hidden"><img class="desktop-hidden" src="<?php echo $theme_url ?>/images/logo_4.png" alt=""></a>
                                        </div>
                                        <div class="text-subtitle">מגשימה חלומות של יופי!</div>
                                        <div class="text-description">
                                            <div>מכשור קוסמטי בעל טכנולוגיה מהפכנית לעור</div>
                                            <div>צעיר יותר, בריא יותר ובעל מראה מטופח רענן וזוהר.</div>
                                            <div>בשיטה מרפאת, ללא ניתוחים וללא כאבים!</div>
                                        </div>
                                        <a href="<?php echo get_permalink( 148 ); ?>" class="text-button">
                                            תקופת התנסות של חודשיים החזר כספי מלא
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <img style="width:100%;" src="<?php echo $theme_url; ?>/images/home-banner-2.png" alt="ניואה למיצוק עור הפנים">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-banner-mobile-button-container desktop-hidden">
        <a href="<?php echo get_permalink( 148 ); ?>" class="home-banner-mobile-button">
            תקופת התנסות של 4 חודשים בהחזר כספי מלא
        </a>
    </div>
    <div class="main-container col1-layout no-breadcrumbs">
        <div class="main">
            <div class="col-main">
                <div class="std"><!--&nbsp;--></div>
                <div class="video-block home-video-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 video-pop">
                                <p>
                                    <div class="home-video mobile-hidden">
                                        <img class="home-video-img" src="<?php echo $theme_url; ?>/images/home-video-2.png">
                                        <?php /* ?>
                                        <img class="home-video-play" src="<?php echo $theme_url; ?>/images/home-video-play.png" alt="חזרי בזמן עם ניואה אנטי אייג&#39;ינג">
                                        <?php */ ?>
                                    </div>
                                </p>
                            </div>

                            <div class="col-md-5 video-text">
                                <div class="home-video-text">
                                    <?php /* ?>
                                <p style="direction: rtl; font-weight: bold;">
                                רפואה טכנולוגית שמחזירה לגוף את יכולתו הטבעית; ייצור חלבון קולגן טבעי שאחראי על מיצוק עור הפנים ומראה מורם ורענן.
                                </p>
                                <?php */ ?>
                                    <p style="direction: rtl; color: #fff;">
                                        מביאים עד אלייך את הטכנולוגיה המובילה בעולם, השיטה היחידה שמחזירה
                                        לעורך את כוחו הטבעי, מכשירים לשימוש ביתי בעלי טכנולוגיה חדשנית.<br>
                                        מכשיר הדרמסוניק<br>
                                        · מפחית ומטשטש קמטים,<br>
                                        · מנקה את נקבוביות העור,<br>
                                        · מגדיל את קצב התחדשות תאי העור<br>
                                        · ובונה סיבי קולגן חדשים, שיוצרים תשתית הדוקה ומתוחה יותר של העור.<br>
                                        · ומטפל בפיגמנטציה , פגמים כתמים וכהיות בעור<br>
                                    </p>
                                    <?php /* ?>
                                <p style="direction: rtl;"><a
                                        href="<?php echo home_url(); ?>/about-device">קראי עוד
                                        &gt;</a></p>
                                <?php */ ?>
                                </div>
                                <img class="home-video-img desktop-hidden" src="<?php echo $theme_url; ?>/images/home-video-2.png">
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="before-after-block home-block">
                    <div class="container">
                        <div class="title">תוצאות מוכחות</div>
                        <div class="title-link mobile-hidden"><a href="<?php echo home_url(); ?>/proven-results">לכל התוצאות &gt;</a></div>
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

                        <script type="text/javascript">
                            $j(window).load(function() {
                                $j(".before-after").twentytwenty();
                            });
                        </script>
                    </div>
                </div>

                <?php include 'contact-form.php'; ?>

                <div class="testimonials testimonials-home home-block">
                    <div class="container">
                        <div class="title">לקוחות ממליצים</div>
                        <?php /* ?>
                        <div class="title-link"><a href="<?php echo home_url(); ?>/before-after/">המלצות של
                                נשים נוספות &gt;</a>
                        </div>
                        <?php */ ?>
                        <div class="testimonials-home-block">
                            <div class="block_testimonials">
                                <div class="owl-carousel">
                                    <div class="item">
                                        <div class="testimonial_image">
                                            <img alt="ד”ר מיכאל ה.גולד" src="<?php echo $theme_url; ?>/images/review-3.jpg">
                                        </div>
                                        <div class="testimonial_sidebar_box">
                                            <div class="testimonial_sidebar_name">שירה לוין</div>
                                            <div class="testimonial_sub_sidebar_name"></div>
                                            <div class="testimonial_sidebar_text">”
                                                <p style="direction: rtl;">
                                                    אחרי שנים של טיפולים ללא תוצאות, חברה טובה המליצה לי לנסות את המכשיר שלכם , כבר אחרי השימוש הראשון הרגשתי שמשהו עובד, העור שלי נהיה זוהר וצעיר יותר, פשוט תחושה נפלאה.
                                                </p>”
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial_image">
                                            <img alt="ד”ר מיכאל ה.גולד" src="<?php echo $theme_url; ?>/images/review-2.jpg">
                                        </div>
                                        <div class="testimonial_sidebar_box">
                                            <div class="testimonial_sidebar_name">אביבה מויאל</div>
                                            <div class="testimonial_sub_sidebar_name"></div>
                                            <div class="testimonial_sidebar_text">”
                                                <p style="direction: rtl;">
                                                    מאז שהתחלתי להשתמש במכשיר אני לא מפסיקה לקבל מחמאות על המראה שלי , העור שלי מרגיש יותר חי ופחות עייף
                                                    ממליצה בחום על אמאיה ישראל... יישר כוח!
                                                </p>”
                                            </div>
                                        </div>
                                    </div><div class="item">
                                        <div class="testimonial_image">
                                            <img alt="ד”ר מיכאל ה.גולד" src="<?php echo $theme_url; ?>/images/review-1.jpg">
                                        </div>
                                        <div class="testimonial_sidebar_box">
                                            <div class="testimonial_sidebar_name">לובה קוזלקוב</div>
                                            <div class="testimonial_sub_sidebar_name"></div>
                                            <div class="testimonial_sidebar_text">”
                                                <p style="direction: rtl;">
                                                    אני מרגישה יותר צעירה ב15 שנה , עור שלי מרגיש חדש.
                                                    תודה אמאיה על כל העזרה הגדולה שנתתם לי ממש כאילו נולדתי מחדש
                                                </p>”
                                            </div>
                                        </div>
                                    </div>

                                    <?php /* ?>
                                    <div class="item">
                                        <div class="testimonial_image">
                                            <img alt="רקפת ספיר" src="<?php echo $theme_url; ?>/images/testimonial-3.png">
                                            <div class="vid-block">
                                                <a class="fancybox" href="https://www.youtube.com/v/CDLBeuRqGn0?fs=1&amp;autoplay=1"><img alt="הפעלה וידאו המלצה" src="<?php echo $theme_url; ?>/images/testimonials-vid.png"></a>
                                            </div>
                                        </div>
                                        <div class="testimonial_sidebar_box">
                                            <div class="testimonial_sidebar_name">רקפת ספיר</div>
                                            <div class="testimonial_sub_sidebar_name">בעלת רשת חנויות לעיצוב הבית</div>
                                            <div class="testimonial_sidebar_text">”<p>חיפשתי מכשיר שיחזיר את השנים אחורה. המכשיר של AMAYA הוא מאוד פשוט לשימוש. כמעט מהשימוש הראשון את מרגישה שמשהו עובד בִּפְנִים, שהעור קורן וצעיר יותר. פשוט תחושה מדהימה.</p>”</div>
                                        </div>
                                    </div>
                                    <?php */ ?>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $j(document).ready(function () {
                                    var itemCount = $j(".block_testimonials div.item").length;
                                    var viewport = $j(window).width();
                                    $j(".block_testimonials .owl-carousel").owlCarousel({
                                        nav: true,
                                        dots: false,
                                        autoplay: false,
                                        autoplayHoverPause: true,
                                        singleItem: true,
                                        pagination: false,
                                        navigation: true,
                                        lazyLoad: false,
                                        loop: false,
                                        rtl: true,
                                        margin: 80,
                                        responsive: {
                                            0: {
                                                items: 1,
                                            },
                                            768: {
                                                items: 2,
                                            },
                                            992: {
                                                items: 3,
                                            }
                                        }
                                    });
                                    if (
                                        (viewport >= 992 && itemCount <= 3) //desktop
                                        || ((viewport >= 768 && viewport <= 991) && itemCount <= 2) //desktopsmall
                                        || ((viewport >= 0 && viewport <= 767) && itemCount <= 1) //tablet
                                    ) {
                                        jQuery('.block_testimonials .owl-controls').hide();
                                    }
                                });
                            </script>

                            <script type="text/javascript">
                                $j(".vid-block a").click(function () {
                                    $j.fancybox({
                                        'padding': 20,
                                        'autoScale': false,
                                        'transitionIn': 'none',
                                        'transitionOut': 'none',
                                        'title': this.title,
                                        'width': 640,
                                        'height': 385,
                                        'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                                        'type': 'swf',
                                        'swf': {
                                            'wmode': 'transparent',
                                            'allowfullscreen': 'true'
                                        }
                                    });
                                    return false;
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="home-block home-device">
                    <div class="container">
                        <div class="d-text-block col-md-6 col-sm-6 col-sms-6">
                            <div class="d-title">
                                נסי את מכשיר הדרמסוניק של אמאיה בביתך,
                                לתקופת ההתנסות בהחזר כספי מלא!
                            </div>
                            <div class="d-text">
                                <p>
                                    אנו מעניקים לך אפשרות להתנסות בטכנולוגיה  המהפכנית למשך 60 יום
במידה ולא תהי מרוצה כספך יוחזר ללא שאלות.
                                </p>
                            </div>
                            <div class="d-btn">
                                <a href="<?php echo get_permalink( 148 ); ?>">אני
                                    מעוניינת להתנסות &gt;&gt;
                                </a>
                            </div>
                        </div>
                        <div class="d-img col-md-6 col-sm-6 col-sms-6">
                            <img
                                src="<?php echo $theme_url; ?>/images/home-device-3.gif"
                                alt="ניואה - מכשיר אנטי אייג&#39;ינג ביתי">
                        </div>
                    </div>
                </div>
                <?php /* ?>
                <script type="text/javascript">
                    $j(".video-pop a").click(function () {
                        $j.fancybox({
                            'padding': 20,
                            'autoScale': false,
                            'transitionIn': 'none',
                            'transitionOut': 'none',
                            'title': this.title,
                            'width': 640,
                            'height': 385,
                            'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                            'type': 'swf',
                            'swf': {
                                'wmode': 'transparent',
                                'allowfullscreen': 'true'
                            }
                        });
                        return false;
                    });
                </script>
                <?php */ ?>
            </div>
        </div>
    </div>

<?php
get_footer();