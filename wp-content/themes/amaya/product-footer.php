<div class="amaya-product-footer">
    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/delivery.png" alt="Delivery" class="delivery-image">

    <ul class="amaya-product-footer-menu">
        <?php if ( is_product() ): ?>
            <li>
                <a href="JavaScript: jQuery('form.cart .single_add_to_cart_button').trigger('click');">הזמיני כעת</a>
            </li>
        <?php endif; ?>
        <li>
            <a href="<?php echo home_url( '/privacy-policy/' ); ?>">מדיניות החברה</a>
        </li>
        <li>
            <a href="<?php echo home_url('/terms-and-conditions/') ?>">תנאי שימוש</a>
        </li>
        <li>
            <a href="<?php echo home_url('/about-us/') ?>">אודות</a>
        </li>
    </ul>

    <div class="amaya-product-footer-social">
        <a href="https://www.instagram.com/amaya_beauty_shop/" target="_blank">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/instagram.png" alt="Instagram">
        </a>
        <a href="https://www.facebook.com/Amayabeutyshop/" target="_blank">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/facebook.png" alt="Facebook">
        </a>
    </div>
</div>