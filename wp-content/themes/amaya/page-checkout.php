<?php

if ( ! WC()->cart->get_total( false ) ) {
    WC()->cart->add_to_cart( 148 );
}

$billing_email = WC()->customer->get_billing_email();
$billing_first_name = WC()->customer->get_billing_first_name();
$billing_last_name = WC()->customer->get_billing_last_name();
$billing_address = WC()->customer->get_billing_address();
$billing_city = WC()->customer->get_billing_city();
$billing_postcode = WC()->customer->get_billing_postcode();
$billing_phone = WC()->customer->get_billing_phone();


get_header();

?>

    <?php if ( isset( $_GET['failed'] ) ): ?>

    <script>
        jQuery(function($) {
            alert('התשלום נכשל. בבקשה נסה שוב.');
            window.location = '<?php echo home_url('/checkout/'); ?>';
        });
    </script>

    <?php endif; ?>

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
                        <?php do_shortcode('[woocommerce_cart]'); ?>
                        <div class="amaya-checkout">
                            <form method="post">
                                <div class="amaya-checkout-shipping">
                                    <div class="subtitle">1. פרטי משלוח</div><br>

                                    <div class="form-group">
                                        <label>*כתובת דוא”ל לצורך משלוח אישור הזמנה </label>
                                        <input type="text" name="billing[email]" class="form-control billing-input-required" value="<?php echo $billing_email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>*שם פרטי</label>
                                        <input type="text" name="billing[first_name]" class="form-control billing-input-required" value="<?php echo $billing_first_name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>*שם משפחה </label>
                                        <input type="text" name="billing[last_name]" class="form-control billing-input-required" value="<?php echo $billing_last_name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>*כתובת </label>
                                        <input type="text" name="billing[address]" class="form-control billing-input-required" value="<?php echo $billing_address; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>*עיר </label>
                                        <input type="text" name="billing[city]" class="form-control billing-input-required" value="<?php echo $billing_city; ?>" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>*מיקוד </label>
                                                <input type="text" name="billing[postcode]" class="form-control billing-input-required" value="<?php echo $billing_postcode; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>*טלפון </label>
                                                <input type="text" name="billing[phone]" class="form-control billing-input-required" value="<?php echo $billing_phone; ?>" pattern="^\+?\d{3,13}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="amaya-checkout-payment">

                                    <div class="amaya-order-review">
                                        <?php woocommerce_order_review(); ?>
                                    </div>

                                    <img class="secure-image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/secure.png" alt="Secure payment">

                                    <div class="subtitle">2. שיטת התשלום</div><br>

                                    <div class="amaya-payment-methods">
                                        <div class="amaya-payment-method">
                                            <img class="paypal-image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/paypal.png" alt="PayPal">
                                        </div>
                                        <div class="amaya-payment-method amaya-payment-method-tranzila active">
                                            <img class="cards-image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/cards.png" alt="Cards">
                                        </div>

                                        <input type="hidden" name="payment[paypal]" value="">

                                        <div class="amaya-payment-method-content amaya-payment-method-content-tranzila">

                                            <div class="amaya-coriunder">
                                                <div class="amaya-coriunder-message">
                                                    אנא מלא את כל פרטי המשלוח כדי לראות את טופס התשלום
                                                </div>
                                                <div class="amaya-coriunder-form">
                                                   Form
                                                </div>

                                                <script>
                                                    jQuery(function($) {
                                                        var requiredFields = $('.amaya-checkout-shipping .billing-input-required');

                                                        var maybeShowPaymentIframe = function() {
                                                            var form = $('.amaya-coriunder-form');
                                                            var message = $('.amaya-coriunder-message');

                                                            var isCompletedForm = true;
                                                            var billing = {};

                                                            requiredFields.each(function() {
                                                                var field = $(this);
                                                                var fieldName = field.attr('name');
                                                                var fieldValue = field.val().trim();

                                                                if (!fieldValue) {
                                                                    isCompletedForm = false;

                                                                    return false;
                                                                }

                                                                if (fieldName == 'billing[email]') {
                                                                    billing.email = fieldValue;
                                                                } else if (fieldName == 'billing[first_name]') {
                                                                    billing.first_name = fieldValue;
                                                                } else if (fieldName == 'billing[last_name]') {
                                                                    billing.last_name = fieldValue;
                                                                } else if (fieldName == 'billing[address]') {
                                                                    billing.address = fieldValue;
                                                                } else if (fieldName == 'billing[city]') {
                                                                    billing.city = fieldValue;
                                                                } else if (fieldName == 'billing[postcode]') {
                                                                    billing.postcode = fieldValue;
                                                                } else if (fieldName == 'billing[phone]') {
                                                                    billing.phone = fieldValue;
                                                                }
                                                            });

                                                            if (isCompletedForm) {
                                                                var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';

                                                                var ajaxData = {
                                                                    action: 'amaya_coriunder_iframe',
                                                                    nonce_code: '<?php echo wp_create_nonce('amaya_coriunder_iframe'); ?>',
                                                                    billing: billing
                                                                };

                                                                $.post(ajaxUrl, ajaxData, function(response) {
                                                                    form.html(response);
                                                                    form.show();
                                                                    message.hide();
                                                                });
                                                            } else {
                                                                form.hide();
                                                                message.show();
                                                            }
                                                        };

                                                        maybeShowPaymentIframe();

                                                        requiredFields.change(maybeShowPaymentIframe);
                                                    });
                                                </script>
                                            </div>


                                            <?php /* ?><div class="amaya-payment-fields-panel payment-form">
                                                <div class="amaya-payment-fields">
                                                    <h4>פרטי כרטיס אשראי</h4>

                                                    <div class="payment-item">
                                                        <label class="payment-item__label">
                                                            הכמות הכוללת
                                                        </label>
                                                        <div class="payment-item__field">
                                                            <div class="total">
                                                                <?php echo wc_cart_totals_order_total_html(); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="amaya-credit-card-details">

                                                        <div class="payment-item">
                                                            <label class="payment-item__label">
                                                                מספר כרטיס<span>*</span>
                                                            </label>

                                                            <div class="payment-item__field">
                                                                <input type="text" name="payment[number]" id="payment_number" value="" placeholder="" pattern="[0-9]{10,17}" required>
                                                            </div>
                                                        </div>

                                                        <div class="payment-item">
                                                            <label class="payment-item__label">
                                                                תפוגה<span>*</span>
                                                            </label>

                                                            <div class="payment-item__field payment-item__field_date">
                                                                <select class="month-field" name="payment[month]" id="payment_month" required>
                                                                    <option value=""></option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                                <span class="separator">/</span>
                                                                <select  class="year-field" name="payment[year]" id="payment_year" required>
                                                                    <option value=""></option>
                                                                    <?php
                                                                    $current_year = intval( date( 'y' ) );
                                                                    $max_year = $current_year + 10;
                                                                    ?>
                                                                    <?php for ( $year = $current_year; $year <= $max_year; $year++ ): ?>
                                                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="payment-item">
                                                            <label class="payment-item__label">
                                                                <a href="#" onclick="window.open('https://direct.tranzila.com/docs/window-cvv-eng.html', '_blank', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=350,height=230, top=' + (parseInt((screen.availHeight/2) - 115)) + ',left='+(parseInt((screen.availWidth/2) - 175)));">קוד אבטחה</a><span>*</span>
                                                            </label>

                                                            <div class="payment-item__field payment-item__field_cvv">
                                                                <input type="text" class="cvv-field" name="payment[cvv]" id="payment_cvv" max="4" placeholder="" pattern="^[0-9]{3,4}" required>
                                                            </div>
                                                        </div>

                                                        <div class="payment-item">
                                                            <label class="payment-item__label">
                                                                מספר התשלומים<span></span>
                                                            </label>

                                                            <select class="npay-field" name="payment[npay]" id="payment_npay" required>
                                                                <option value="1" selected>1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>

                                                        <div class="payment-item">
                                                            <label class="payment-item__label">
                                                                תעודת זהות
                                                            </label>

                                                            <div class="payment-item__field payment-item__field_id">
                                                                <input type="text" class="id-field" name="payment[id]" id="payment_id"  placeholder="" max="10" pattern="[0-9]{9}" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <?php */ ?>

                                        </div>
                                    </div>

                                    <script>
                                        jQuery(function($) {
                                            $('.amaya-payment-method').click(function () {
                                                $('.amaya-payment-method.active').removeClass('active');
                                                $(this).addClass('active');

                                                var tranzilaContent = $('.amaya-payment-method-content-tranzila');

                                                if ($(this).hasClass('amaya-payment-method-tranzila')) {
                                                    tranzilaContent.slideDown('fast');
                                                } else {
                                                    tranzilaContent.slideUp('fast');
                                                }
                                            });
                                        });
                                    </script>

                                    <?php /* ?
                                    <div class="amaya-checkout-submit-container">
                                        <button type="submit" class="amaya-checkout-submit">מעבר לתשלום מאובטח </button>
                                    </div>
                                    <?php */ ?>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php

                endwhile;
                ?>

                <?php amaya_product_footer(); ?>
                <br><br>

            </div>
        </div>
    </div>

<?php

get_footer();
