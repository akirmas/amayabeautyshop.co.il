<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, user-scalable=no">

	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>

    <?php $theme_url = get_stylesheet_directory_uri(); ?>

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700&amp;subset=hebrew" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/bootstrap.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/owl.carousel.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/swiper.min.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/jquery-ui.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/jquery.fancybox.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/twentytwenty.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/styles.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/styles-rtl.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/callpage-callback.default.css'; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url.'/css/main_combined-rtl.css'; ?>" media="all">
    
    <?php $is_prototype = false; ?>

    <?php if ($is_prototype): ?>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/prototype.js'; ?>"></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/noconflict.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/owl.carousel.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/bootstrap.js'; ?>"></script>
    <?php if ($is_prototype): ?>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/validation.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/builder.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/effects.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/dragdrop.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/controls.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/slider.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/js.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/form.js'; ?>"></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/jquery.fancybox.js'; ?>"></script>
    <?php if ($is_prototype): ?>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/lightbox.js'; ?>"></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/jquery.event.move.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/jquery.twentytwenty.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/jquery-ui.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/modernizr.custom.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/selectivizr.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/matchMedia.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/enquire.js'; ?>"></script>
    <?php if ($is_prototype): ?>
        <script type="text/javascript" src="<?php echo $theme_url.'/js/app.js'; ?>"></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/jquery.cycle2.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/jquery.cycle2.swipe.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/slideshow.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $theme_url.'/js/imagesloaded.js'; ?>"></script>
</head>

<body <?php body_class(); ?>>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135517940-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-135517940-1');
</script>


<div class="wrapper">

    <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p>
                    <strong>JavaScript seems to be disabled in your browser.</strong><br/>
                    חובה לאפשר JavaScript בדפדפן כדי לאפשר הפעלה תקינה של האתר. </p>
            </div>
        </div>
    </noscript>

    <div class="page">

    <?php

    $has_new_button = is_page( array( 'home', 'about-us', 'about-device', 'proven-results', 'blog', 'how-to-use' ) ) ? true : false;

    $new_products = array();

    if ( amaya_is_new_product_page() ) {
        $has_new_button = true;
    }

    if ( $has_new_button ) {
        $new_products = amaya_get_new_products();

        if ( ! count( $new_products ) ) {
            $has_new_button = false;
        }
    }

    ?>

    <header id="header" class="page-header<?php echo $has_new_button ? ' has-new-button' : ''; ?>">

        <div class="page-header-container container">
            <div class="page-header-logo">
                <a href="<?php echo home_url(); ?>/">
                    <img src="<?php echo $theme_url; ?>/images/logo_5.png" alt="Amaya">
                </a>
            </div>

            <?php if ( $has_new_button ): ?>

                <div class="home-banner-new-button-container">
                    <div class="home-banner-new-button-panel">
                        <div class="home-banner-new-button" onmouseover="if(jQuery('#main-nav').hasClass('in')) {jQuery('.page-header-navbar-toggler:not(.collapsed)').click();}">
                            מוצרים חדשים
                            <ul class="home-banner-new-products">
                                <?php foreach ( $new_products as $new_product ): ?>
                                    <li class="home-banner-new-product">
                                        <a href="<?php echo $new_product->get_permalink(); ?>?details"><?php echo $new_product->get_name(); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="page-header-contact">
                <span class="page-header-contact-phone">
                    <a href="tel:9720776048682">
                        <?php if ( amaya_is_new_store() && ! amaya_is_new_product_page() ): ?>
                            התקשרי ל-077-6048742 או הזמיני דרך האתר
                        <?php else: ?>
                            צרי קשר
                            077-6048682
                        <?php endif; ?>
                    </a>
                </span>
                <span class="page-header-contact-social">
                    <a href="tel:9720776048682" class="page-header-contact-social-phone">
                        <i class="fa fa-phone"></i>
                    </a>
                    <a href="https://www.facebook.com/Amayabeutyshop/" class="page-header-contact-social-facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/amaya_beauty_shop/" class="page-header-contact-social-instagram" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                </span>
            </div>

            <button class="page-header-navbar-toggler navbar-toggler desktop-hidden" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <?php /* ?>
                    <i class="fa fa-bars"></i>
                    <?php */ ?>
                    <img src="<?php echo $theme_url; ?>/images/menu.png" alt="Menu">
                </span>
            </button>

            <nav class="page-header-navbar navbar navbar-expand-xl p-0">
                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu'            => 16,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    //'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    //'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
            </nav>
        </div>
    </header>
