<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( amaya_is_details_page() ) {
    $details_filename = '';

    if ( get_the_ID() == 274 ) {
        $details_filename = 'product-details-dermineck.php';
    }

    if ( get_the_ID() == 287 ) {
        $details_filename = 'product-details-ems.php';
    }

    if ( $details_filename ) {
        $theme_directory = get_stylesheet_directory();
        $theme_url = get_stylesheet_directory_uri();
        $share_url = urlencode( get_the_permalink() );

        ?>

        <div class="amaya-details-wrapper">
            <?php include $theme_directory . '/' . $details_filename; ?>
        </div>

        <?php include $theme_directory . '/contact-form.php'; ?>

        <div class="amaya-share-wrapper">
            <a href="https://www.facebook.com/Amayabeutyshop/" class="facebook" target="_blank">
                <img src="<?php echo $theme_url ?>/images/details-facebook.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/amaya_beauty_shop/" class="instagram" target="_blank">
                <img src="<?php echo $theme_url ?>/images/details-instagram.png" alt="Instagram">
            </a>
            <a href="https://wa.me/9720586773103" class="whatsapp" target="_blank">
                <img src="<?php echo $theme_url ?>/images/details-whatsapp.png" alt="WhatsApp">
            </a>
            <a href="mailto:support@amayabeautyshop.com" class="email" target="_blank">
                <img src="<?php echo $theme_url ?>/images/details-email.png" alt="Email">
            </a>
        </div>

        <?php
    }
} else {
    ?>

    <div class="amaya-product-actions">

        <div class="amaya-product-actions-checkout">
            <div class="subtitle"><strong>לרכישה בהזמנה אינטרנטית</strong></div>
            <div class="subtitle">השאירי פרטייך ונחזור אלייך בהקדם</div>
            <button class="amaya-product-actions-checkout-button" onclick="jQuery('form.cart .single_add_to_cart_button').trigger('click');">להזמנה</button>
        </div>

        <div class="amaya-product-actions-contact">
            <div class="subtitle"><strong>לרכישה בהזמנה טלפונית</strong></div>
            <div class="subtitle">השאירי פרטייך ונחזור אלייך בהקדם</div>
            <?php echo do_shortcode('[contact-form-7 id="155" title="Contact form 1"]'); ?>
        </div>

    </div>

    <?php
}

?>

<?php amaya_product_footer(); ?>