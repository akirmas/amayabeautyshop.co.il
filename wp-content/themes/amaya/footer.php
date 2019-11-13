<?php $theme_url = get_stylesheet_directory_uri(); ?>

        <div class="footer-container">
            <div class="container footer">
                <div class="foot-list foot-contanct">
                    <div class="footTitle">שירות הלקוחות שלנו זמין לכל שאלה</div>
                    <ul>
                        <li>שירות לקוחות <a href="tel:9720776048682">077-6048682</a></li>
                        <li>שעות פעילות 9:00 - 19:00</li>
                        <li><a href="<?php echo home_url(); ?>#contact">צרי קשר</a></li>
                    </ul>
                </div>
                <div class="foot-list foot-list-delivery">
                    <?php if ( ! amaya_is_new_store() ): ?>
                        <div class="footTitle"><a href="<?php echo home_url(); ?>/about-us">קצת עלינו</a></div>
                    <?php endif; ?>
                    <ul>
                        <li><a href="<?php echo home_url(); ?>/privacy-policy">משלוחים & החזרות</a></li>
                        <li><a href="<?php echo home_url(); ?>/privacy-policy">מדיניות פרטיות</a></li>
                    </ul>

                    <?php if ( amaya_is_new_store() ): ?>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/delivery-ns.png" alt="Delivery" class="delivery-image">
                    <?php endif; ?>
                </div>

                <?php if ( ! amaya_is_new_store() ): ?>

                    <div class="foot-list last">
                        <div class="footTitle"><a href="<?php echo home_url(); ?>/blog">בלוג</a></div>
                        <ul>
                            <li><a href="<?php echo get_the_permalink( 1 ); ?>">הכל על קולגן</a></li>
                            <li><a href="<?php echo get_the_permalink( 110 ); ?>">הטיפים של אמאיה</a></li>
                            <li><a href="<?php echo get_the_permalink( 113 ); ?>">תרופות סבתא לטיפול בקמטים</a></li>
                        </ul>
                    </div>

                <?php endif; ?>

                <div class="foot-list foot-social-wrap">
                    <div class="footTitle foot-social">
                        הישארו מעודכנות...
                    </div>
                    <div class="footSocial">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/Amayabeutyshop/" target="_blank">
                                    <em class="fa fa-facebook">&nbsp;</em>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/amaya_beauty_shop/" target="_blank">
                                    <em class="fa fa-instagram">&nbsp;</em>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 col-md-3 col-sm-12 col-sms-12 footer-cards"></div>
                    <div class="col-xs-6 col-md-6 col-sm-12 col-sms-12 copyright">
                        Copyright © <?php echo date('Y'); ?> - <?php bloginfo('name'); ?> - All rights reserved
                    </div>
                    <div class="col-xs-3 col-md-3 col-sm-12 col-sms-12"></div>
                </div>
            </div>
        </div>


    </div>

</div>

<div id="bg_fade"></div>

<?php wp_footer(); ?>

</body>
</html>
