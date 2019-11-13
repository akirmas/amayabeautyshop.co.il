<?php



if ( ! function_exists( 'amaya_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function amaya_setup() {
        load_theme_textdomain('amaya', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);

        register_nav_menus(
            array(
                'menu-1' => __('Primary', 'amaya'),
                'footer' => __('Footer Menu', 'amaya'),
                'social' => __('Social Links Menu', 'amaya'),
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height' => 190,
                'width' => 190,
                'flex-width' => false,
                'flex-height' => false,
            )
        );

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('wp-block-styles');

        add_theme_support('align-wide');
        
        add_theme_support('responsive-embeds');

        add_theme_support( 'woocommerce' );
    }
}
add_action( 'after_setup_theme', 'amaya_setup' );

/**
 * Register widget area.
 */
function amaya_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'amaya' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'amaya' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'amaya_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function amaya_scripts() {
	wp_enqueue_style( 'amaya-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'amaya_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function amaya_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'amaya_skip_link_focus_fix' );



class wp_bootstrap_navwalker extends Walker_Nav_Menu {

    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
    }

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

            if($args->has_children && $depth === 0) { $class_names .= ' dropdown'; }
            elseif($args->has_children && $depth > 0) {$class_names .= ' dropdown dropdown-submenu'; }

            if ( in_array( 'current-menu-item', $classes ) )
                $class_names .= ' active';

            $class_names = $class_names ? ' class="nav-item ' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->title )	? $item->title	: '';
            $atts['target'] = ! empty( $item->target )	? $item->target	: '';
            $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

            // If item has_children add atts to a.

            if ( $args->has_children ) {
                $atts['href']   		= '#';
                $atts['data-toggle']	= 'dropdown';
                $atts['class']			= 'dropdown-toggle nav-link';
                $atts['aria-haspopup']	= 'true';
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
                $atts['class'] = 'nav-link';
            }
            if ($depth > 0 && !in_array('menu-item-has-children', $classes)) {
                $atts['class'] = 'dropdown-item';
            }elseif($depth > 0 && in_array('menu-item-has-children', $classes)){
                $atts['data-toggle']	= 'dropdown';
                $atts['class']			= 'dropdown-toggle dropdown-item';
            }else {

            }

            /*
            if ($depth === 0) {
                $atts['class'] = 'nav-link';
            }
            if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
                $atts['class']       .= ' dropdown-toggle';
                $atts['data-toggle']  = 'dropdown';
            }
            if ($depth > 0) {
                $atts['class'] = 'dropdown-item';
            }
            if (in_array('current-menu-item', $item->classes)) {
                $atts['class'] .= ' active';
            }
            */

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );



            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if ( ! empty( $item->attr_title ) )
                $item_output .= '<a'. $attributes .'>';
            else
                $item_output .= '<a'. $attributes .'>';

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children ) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
        //if ( current_user_can( 'manage_options' ) ) {

        extract( $args );

        $fb_output = null;

        if ( $container ) {
            $fb_output = '<' . $container;

            if ( $container_id )
                $fb_output .= ' id="' . $container_id . '"';

            if ( $container_class )
                $fb_output .= ' class="' . $container_class . '"';

            $fb_output .= '>';
        }

        $fb_output .= '<ul';

        if ( $menu_id )
            $fb_output .= ' id="' . $menu_id . '"';

        if ( $menu_class )
            $fb_output .= ' class="' . $menu_class . '"';

        $fb_output .= '>';
        $fb_output .= '<li class="nav-item"><a href="#" class="nav-link">Home</a></li>';
        $fb_output .= '<li class="nav-item"><a href="#" class="nav-link">About Us</a></li>';
        $fb_output .= '<li class="nav-item"><a href="#" class="nav-link">Gallery</a></li>';
        $fb_output .= '<li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>';
        /*$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';*/
        $fb_output .= '</ul>';

        if ( $container )
            $fb_output .= '</' . $container . '>';

        echo $fb_output;
        //}
    }
}

/**
 * Footer HTML on the Product and Checkout page.
 */
function amaya_product_footer() {
    if ( amaya_is_new_store() ) {
        return;
    }

    include 'product-footer.php';
}


/**
 * Hook: Empty cart before adding a new product to cart WITHOUT throwing woocommerce_cart_is_empty
 */
function amaya_empty_cart_before_add() {
    global $woocommerce;
    // Get 'product_id' and 'quantity' for the current woocommerce_add_to_cart operation
    if (isset($_GET["add-to-cart"])) {
        $prodId = (int)$_GET["add-to-cart"];
    } else if (isset($_POST["add-to-cart"])) {
        $prodId = (int)$_POST["add-to-cart"];
    } else {
        $prodId = null;
    }
    if (isset($_GET["quantity"])) {
        $prodQty = (int)$_GET["quantity"] ;
    } else if (isset($_POST["quantity"])) {
        $prodQty = (int)$_POST["quantity"];
    } else {
        $prodQty = 1;
    }
    error_log('prodID: ' . $prodId); // FIXME
    error_log('prodQty: ' . $prodQty); // FIXME
    // If cart is empty
    if ($woocommerce->cart->get_cart_contents_count() == 0) {
        // Simply add the product (nothing to do here)
        // If cart is NOT empty
    } else {

        $cartQty = $woocommerce->cart->get_cart_item_quantities();
        $cartItems = $woocommerce->cart->cart_contents;
        // Check if desired product is in cart already
        if (array_key_exists($prodId,$cartQty)) {
            // Then first adjust its quantity
            foreach ($cartItems as $k => $v) {
                if ($cartItems[$k]['product_id'] == $prodId) {
                    $woocommerce->cart->set_quantity($k,$prodQty);
                }
            }
            // And only after that, set other products to zero quantity
            foreach ($cartItems as $k => $v) {
                if ($cartItems[$k]['product_id'] != $prodId) {
                    $woocommerce->cart->set_quantity($k,'0');
                }
            }
        }
    }
}
add_action( 'woocommerce_add_to_cart', 'amaya_empty_cart_before_add', 0 );


/**
 * Get new products objects.
 *
 * @return array
 */
function amaya_get_new_products() {
    $args = array(
        'category' => array( 'new-store' )
    );

    return wc_get_products( $args );
}


/**
 * Get new products IDs.
 *
 * @return array
 */
function amaya_get_new_products_ids() {
    $products = amaya_get_new_products();

    $products_ids = array();

    foreach ( $products as $product ) {
        $products_ids[] = $product->get_id();
    }

    return $products_ids;
}


/**
 * Check if the current product is new.
 *
 * @return bool
 */
function amaya_is_new_product_page() {
    $new_products_ids = amaya_get_new_products_ids();

    global $post;

    if ( in_array( $post->ID, $new_products_ids ) ) {
        return true;
    }

    return false;
}


/**
 * Check if the page is related to the new products.
 *
 * @return bool
 */
function amaya_is_new_store() {
    if ( is_cart() || is_checkout() ) {
        $cart_items = wc()->cart->get_cart();

        if ( ! empty( $cart_items ) ) {
            $new_products_ids = amaya_get_new_products_ids();

            $cart_has_new_product = false;

            foreach ( $cart_items as $cart_item ) {
                if ( in_array( $cart_item['product_id'], $new_products_ids ) ) {
                    $cart_has_new_product = true;

                    break;
                }
            }

            if ( $cart_has_new_product ) {
                return true;
            }
        }
    } elseif ( amaya_is_new_product_page() ) {
        return true;
    }

    return false;
}


/**
 * Check if the page may have additional details or another view.
 *
 * @return bool
 */
function amaya_is_details_page() {
    return ( isset( $_GET['details'] ) && amaya_is_new_product_page() ) ? true : false;
}


/**
 * Adds classes to the body tag.
 *
 * @param array $classes
 * @return array
 */
function amaya_body_classes( $classes ) {
    if ( is_product() || is_page( array( 'checkout', 'thank-you' ) ) || basename( get_page_template() ) == 'simple-page.php' || basename( get_page_template() ) == 'thank-you-page.php' ) {
        $classes[] = 'simple-header-footer';
    }

    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    if ( amaya_is_new_store() ) {
        $classes[] = 'amaya-is-new-store';
    }

    if ( amaya_is_new_product_page() ) {
        $classes[] = 'amaya-is-new-product-page';
    }

    if ( amaya_is_details_page() ) {
        $classes[] = 'amaya-is-details-page';
    }

    return $classes;
}
add_filter( 'body_class', 'amaya_body_classes' );


/**
 * Write log into file in "{site root}/wp-content/uploads/amaya-logs" directory.
 *
 * @param string $text
 */
function amaya_log( $text ) {
    if ( is_array( $text ) || is_object( $text ) ) {
        $text = print_r( $text, true );
    }

    $text = current_time( "H:i:s | " ).$text."\r\n";
    $filename = ABSPATH.'wp-content/uploads/amaya-logs/'.date('Y-m-d').'.txt';
    file_put_contents( $filename, $text, FILE_APPEND | LOCK_EX );
}


/**
 * Action after submitting the payment form.
 */
function amaya_payment_process() {
    if ( ! ( isset( $_POST['billing'] ) && isset( $_POST['payment'] ) ) ) {
        return;
    }

    $billing = $_POST['billing'];
    $billing_email = isset( $billing['email'] ) ? sanitize_email( $billing['email'] ) : '';
    $billing_first_name = isset( $billing['first_name'] ) ? sanitize_text_field( $billing['first_name'] ) : '';
    $billing_last_name = isset( $billing['last_name'] ) ? sanitize_text_field( $billing['last_name'] ) : '';
    $billing_country = 'IL';
    $billing_address = isset( $billing['address'] ) ? sanitize_text_field( $billing['address'] ) : '';
    $billing_city = isset( $billing['city'] ) ? sanitize_text_field( $billing['city'] ) : '';
    $billing_postcode = isset( $billing['postcode'] ) ? sanitize_text_field( $billing['postcode'] ) : '';
    $billing_phone = isset( $billing['phone'] ) ? sanitize_text_field( $billing['phone'] ) : '';

    WC()->customer->set_billing_first_name( $billing_first_name );
    WC()->customer->set_shipping_first_name( $billing_first_name );
    WC()->customer->set_billing_last_name( $billing_last_name );
    WC()->customer->set_shipping_last_name( $billing_last_name );
    WC()->customer->set_billing_address( $billing_address );
    WC()->customer->set_billing_city( $billing_city );
    WC()->customer->set_billing_postcode( $billing_postcode );
    WC()->customer->set_billing_phone( $billing_phone );

    if ( WC_Validation::is_email( $billing_email ) ) {
        WC()->customer->set_billing_email( $billing_email );
    } else {
        $billing_email = '';
    }

    WC()->customer->set_billing_country( $billing_country );
    WC()->customer->set_shipping_country( $billing_country );

    $user_id = 0;

    if ( $billing_email ) {
        if ($user = get_user_by('email', $billing_email)) {
            $user_id = $user->ID;
        } else {
            $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
            $user_id = wp_create_user( $billing_email, $random_password, $billing_email );
        }

        if ( $billing_first_name ) {
            update_user_meta( $user_id, 'first_name', $billing_first_name );
            update_user_meta( $user_id, 'billing_first_name', $billing_first_name );
        }
        if ( $billing_last_name ) {
            update_user_meta( $user_id, 'last_name', $billing_last_name );
            update_user_meta( $user_id, 'billing_last_name', $billing_last_name );
        }

        if ( $billing_phone ) {
            update_user_meta( $user_id, 'billing_phone', $billing_phone );
        }
    }

    $payment = $_POST['payment'];

    if ( ! isset($payment['number']) || ! isset($payment['month']) || ! isset($payment['year']) || ! isset($payment['cvv']) || ! isset($payment['npay']) || ! isset($payment['paypal']) ) {
        return;
    }

    $number = sanitize_text_field( trim( $payment['number'] ) );
    $month = sanitize_text_field( trim( $payment['month'] ) );
    $year = sanitize_text_field( trim( $payment['year'] ) );
    $cvv = sanitize_text_field( trim( $payment['cvv'] ) );
    $npay = sanitize_text_field( trim( $payment['npay'] ) );

    $payment_method = '';

    if (intval($payment['paypal'])) {
        $payment_method = 'paypal';
    } else {
        if ( $number && $month && $year && $cvv ) {
            $payment_method = 'tranzila';
        }
    }

    if ( $payment_method && $user_id && $billing_first_name && $billing_last_name && $billing_phone && $billing_email && $billing_country ) {
        include_once 'inc/class-payment-tranzila.php';

        $cart = WC()->cart;
        $cart->calculate_totals();
        $checkout = WC()->checkout();
        $order_data = array(
            'terms' => 0,
            'createaccount' => 0,
            'payment_method' => $payment_method,
            'shipping_method' => '',
            'ship_to_different_address' => '',
            'woocommerce_checkout_update_totals' => '',
            'billing_first_name' => $billing_first_name,
            'billing_last_name' => $billing_last_name,
            'billing_country' => $billing_country,
            'billing_city' => $billing_city,
            'billing_address_1' => $billing_address,
            'billing_postcode' => $billing_postcode,
            'billing_phone' => $billing_phone,
            'billing_email' => $billing_email,
            'order_comments' => '',
            'customer_id' => $user_id,
        );
        $order_id = $checkout->create_order( $order_data );
        $order = wc_create_order( array(
            'order_id' => $order_id,
            'customer_id' => $user_id,
        ) );
        $order->set_status( 'pending' );
        $order->calculate_totals();
        //$order->payment_complete();
        //$cart->empty_cart();

        $products_descriptions = array();

        $order_items = $order->get_items();

        foreach ( $order_items as $order_item ) {
            $products_descriptions[] = $order_item->get_name().' ('.$order_item->get_quantity().')';
        }

        $products_descriptions_text = implode( ', ', $products_descriptions );

        /*if ( $payment_method == 'paypal' ) {
            $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
            if ( ! isset( $available_gateways[ $payment_method ] ) ) {
                return;
            }

            // Store Order ID in session so it can be re-used after payment failure
            WC()->session->set( 'order_awaiting_payment', $order_id );

            // Process Payment
            $result = $available_gateways[ $payment_method ]->process_payment( $order_id );

            // Redirect to success/confirmation/payment page
            if ( isset( $result['result'] ) && 'success' === $result['result'] ) {
                $result = apply_filters( 'woocommerce_payment_successful_result', $result, $order_id );
                wp_redirect( $result['redirect'] );
                exit;
            }
        }*/

        if ( $payment_method == 'tranzila' ) {

            $formdata = array();
            $formdata['sum'] = $order->get_total(); // total amount to process
            $formdata['ccno'] = $number; // credit card
            $formdata['ccexpm'] = $month; // expiration month
            $formdata['ccexpy'] = $year; // expiration year
            $formdata['expdate'] = $month . '' . $year;
            $formdata['company'] = 'amayabeautyshop.co.il';
            $formdata['first_name'] = $billing_first_name;
            $formdata['last_name'] = $billing_last_name;
            $formdata['mycvv'] = intval( $cvv );
            $formdata['npay'] = intval( $npay );
            $formdata['currency'] = 1;
            $formdata['contact'] = $billing_first_name . ' ' . $billing_last_name;
            $formdata['email'] = $billing_email;
            $formdata['pdesc'] = $products_descriptions_text;
            $formdata['OrderID'] = $order_id; // deal id
            $formdata['tranmode'] = "A"; // transaction mode

            // init curl connection
            $response = Payment_Tranzila::instance()->sendRequest($formdata);

            amaya_log($response);

            if ( isset( $response['Response'] ) ) {
                $payment_status = sanitize_text_field( $response['Response'] );
                $confirmation_code = sanitize_text_field( $response['ConfirmationCode'] );

                /*setcookie( 'amaya_confirmation_code', $amaya_confirmation_code, time() + 3600, '/' );
                $_COOKIE['amaya_confirmation_code'] = $amaya_confirmation_code;*/

                if ( $payment_status == '000' /*|| isset( $_GET['test'] )*/ ) {

//                      [KEY] => H&^HIo86ohi77Ot8bYT
//                      [email] => k.tkachuk@consult-info.ru
//                      [phone] => 98765432126
//                      [first_name] => Konstantin
//                      [last_name] => Tkachuk
//                      [billing_country] => Russia
//                      [billing_address] => Street 1
//                      [billing_city] => Afula
//                      [billing_postcode] => 123456
//                       [ccv] => 123
//                      [exp_date] => 1221
//                      [card_number] => 1111222233334444
//                      [sum] => 1200

                    $arFields = array();
                    $arFields['KEY'] = 'H&^HIo86ohi77Ot8bYT';
                    $arFields['billing_country'] = $billing_country;
                    $arFields['billing_address'] = $billing_address;
                    $arFields['billing_city'] = $billing_city;
                    $arFields['billing_postcode'] = $billing_postcode;
                    $arFields['phone'] = $billing_phone;
                    $arFields['ccv'] = $formdata['myccv'];
                    $arFields['card_number'] = $formdata['ccno'];
                    $arFields['sum'] = $formdata['sum'];
                    $arFields['exp_date'] = $formdata['expdate'];
                    $arFields['first_name'] = $formdata['first_name'];
                    $arFields['last_name'] = $formdata['last_name'];
                    $arFields['email'] = $formdata['email'];
                    $arFields['id'] = $payment['id'];

//                    $arFields['products'] = array(
//                        array(
//                            'name' => 'product name 1',
//                            'price' => 100,
//                            'quantity' => '1'
//                        ),
//                        array(
//                            'name' => 'product name 2',
//                            'price' => 110,
//                            'quantity' => '2'
//                        ),
//                    );

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_POST => 1,
                        CURLOPT_HEADER => 0,
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => "https://amaya.work/bitrix/tools/paid_lead_import.php",
                        CURLOPT_POSTFIELDS => http_build_query($arFields)
                    ));

                    $result = curl_exec($curl);
                    curl_close($curl);

                    $result = json_decode($result, 1);

                    if ( $order->get_status() == 'pending' ) {
                        $order->update_status( 'processing' );
                    }

                    $redirect = home_url( '/thank-you-for-purchasing/' ) . '?confirmation=' . $confirmation_code;
                } else {
                    if ( $order->get_status() == 'pending' ) {
                        $order->update_status( 'failed' );
                    }
                    $redirect = home_url( '/checkout/?failed' );
                }

                if ( $redirect ) {
                    wp_safe_redirect( $redirect );
                    exit;
                }
            }
        }

    }

}
add_action( 'template_redirect', 'amaya_payment_process', 10000 );


/**
 * Adds shortcode [amaya_confirmation_code].
 */
function amaya_confirmation_code_shortcode() {
    $confirmation = isset( $_GET['confirmation'] ) ? sanitize_text_field( $_GET['confirmation'] ) : '0000000';

    return '<span class="amaya-confirmation-code">' . $confirmation . '</span>';
}
add_shortcode( 'amaya_confirmation_code', 'amaya_confirmation_code_shortcode' );


/**
 * Redirect to the "Thank You" page after contact form submitting.
 */
function amaya_redirect_after_form_submit() {
    if ( empty( $_POST['contact-name'] ) || empty( $_POST['contact-email'] ) || empty( $_POST['contact-phone'] ) ) {
        return;
    }

    $data = array();

    $data['name'] = sanitize_text_field( trim( $_POST['contact-name'] ) );
    $data['email'] = sanitize_email( trim( $_POST['contact-email'] ) );
    $data['phone'] = sanitize_text_field( trim( $_POST['contact-phone'] ) );

    if ( empty( $data['name'] ) || empty( $data['email'] ) || empty( $data['phone'] ) ) {
        return;
    }

    $form_type = 'default';

    amaya_form_submit_action( $data, $form_type );

    wp_redirect( home_url( 'thank-you' ) );
    exit;
}
add_action( 'template_redirect', 'amaya_redirect_after_form_submit' );


/**
 * Skip sending email via Contact Form 7.
 *
 * @param $f
 * @return bool
 */
function amaya_wpcf7_skip_mail( $f ){
    $submission = WPCF7_Submission::get_instance();

    $data = array();

    $data['name'] = $submission->get_posted_data( 'your-name' );
    $data['email'] = $submission->get_posted_data( 'your-email' );
    $data['phone'] = $submission->get_posted_data( 'your-phone' );

    if ( $data['name'] && $data['email'] && $data['phone'] ) {
        $form_type = 'product';

        amaya_form_submit_action( $data, $form_type );

        return true;
    } else {
        return $f;
    }
}
add_filter( 'wpcf7_skip_mail','amaya_wpcf7_skip_mail' );


/**
 * Action after submitting form.
 *
 * @param array $data
 * @param string $form_type
 */
function amaya_form_submit_action( $data, $form_type = 'default' ) {
    $name = isset( $data['name'] ) ? $data['name'] : '';
    $email = isset( $data['email'] ) ? $data['email'] : '';
    $phone = isset( $data['phone'] ) ? $data['phone'] : '';

    // TODO: send data to Bitrix CRM.

    $name_parts = explode(' ', preg_replace("/\s{2,}/", " ", preg_replace("/(\s+$|^\s+)/", "", $name)));
    $first_name = $name_parts[0];
    $last_name = $name_parts[1];

    $data_new = array();
    $data_new['PHONE'] = $phone;
    $data_new['EMAIL'] = $email;
    $data_new['NAME'] = $first_name;
    $data_new['LAST_NAME'] = $last_name;

    $data_new['ACTION'] = 'ADD';
    $data_new['KEY'] = 'H&^HIo86ohi77Ot8bYT';
    $data_new['ENTITY_TYPE'] = 'LEAD';
    $data_new['TITLE'] = $first_name.' '.$last_name;
    $data_new['ASSIGNED_BY_ID'] = 73;


    $data_new['SOURCE_ID'] = 2;
    $data_new['UF_CRM_1549532837'] = 57;


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "https://amaya.work/bitrix/tools/import.php",
        CURLOPT_POSTFIELDS => $data_new
    ));

    $result = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($result, 1);
    return $result;
}


/**
 * Displays buy form on the details page on the new product.
 */
function amaya_details_buy_html() {
    ?>

    <div class="amaya-details-buy clearfix">
        <form action="<?php echo get_the_permalink(); ?>" method="post">
            <input type="number" name="quantity" min="1" max="9999" value="1">
            <button>לקנייה</button>
        </form>
    </div>

    <?php
}

function googleTrackingCodeCustomFunction()
{
echo '<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145275924-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());
  gtag(\'config\', \'UA-145275924-1\');
</script>';
}

//if(is_page('checkout')){
if(strstr($_SERVER['REQUEST_URI'], 'checkout')){
    // Add hook for front-end <head></head>
    add_action( 'wp_head', 'googleTrackingCodeCustomFunction' );
}


function amaya_coriunder_token($length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet);
    // edited
    for ($i=0; $i < $length; $i++)
        $token .= $codeAlphabet[random_int(0, $max-1)];
    return uniqid($token);
}


function amaya_coriunder_merchant_id() {
    return '5963173';
    //return '8057557';
}


function amaya_coriunder_hash_key() {
    return '52ABTT8FMA';
    //return 'IRHLTOX3IM';
}


function amaya_coriunder_iframe_ajax(){
    check_ajax_referer( 'amaya_coriunder_iframe', 'nonce_code' );

    if ( empty( $_POST['billing'] ) ) {
        return;
    }

    $billing = $_POST['billing'];
    $billing_email = isset( $billing['email'] ) ? sanitize_email( $billing['email'] ) : '';
    $billing_first_name = isset( $billing['first_name'] ) ? sanitize_text_field( $billing['first_name'] ) : '';
    $billing_last_name = isset( $billing['last_name'] ) ? sanitize_text_field( $billing['last_name'] ) : '';
    $billing_country = 'IL';
    $billing_address = isset( $billing['address'] ) ? sanitize_text_field( $billing['address'] ) : '';
    $billing_city = isset( $billing['city'] ) ? sanitize_text_field( $billing['city'] ) : '';
    $billing_postcode = isset( $billing['postcode'] ) ? sanitize_text_field( $billing['postcode'] ) : '';
    $billing_phone = isset( $billing['phone'] ) ? sanitize_text_field( $billing['phone'] ) : '';

    WC()->customer->set_billing_first_name( $billing_first_name );
    WC()->customer->set_shipping_first_name( $billing_first_name );
    WC()->customer->set_billing_last_name( $billing_last_name );
    WC()->customer->set_shipping_last_name( $billing_last_name );
    WC()->customer->set_billing_address( $billing_address );
    WC()->customer->set_billing_city( $billing_city );
    WC()->customer->set_billing_postcode( $billing_postcode );
    WC()->customer->set_billing_phone( $billing_phone );

    if ( WC_Validation::is_email( $billing_email ) ) {
        WC()->customer->set_billing_email( $billing_email );
    } else {
        $billing_email = '';
    }

    WC()->customer->set_billing_country( $billing_country );
    WC()->customer->set_shipping_country( $billing_country );

    $user_id = 0;

    if ( $billing_email ) {
        if ($user = get_user_by('email', $billing_email)) {
            $user_id = $user->ID;
        } else {
            $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
            $user_id = wp_create_user( $billing_email, $random_password, $billing_email );
        }

        if ( $billing_first_name ) {
            update_user_meta( $user_id, 'first_name', $billing_first_name );
            update_user_meta( $user_id, 'billing_first_name', $billing_first_name );
        }
        if ( $billing_last_name ) {
            update_user_meta( $user_id, 'last_name', $billing_last_name );
            update_user_meta( $user_id, 'billing_last_name', $billing_last_name );
        }

        if ( $billing_phone ) {
            update_user_meta( $user_id, 'billing_phone', $billing_phone );
        }
    }


    $cart = WC()->cart;
    $cart->calculate_totals();

    $products_descriptions = array();

    $cart_items = $cart->get_cart();

    foreach ( $cart_items as $cart_item ) {
        $products_descriptions[] = $cart_item['data']->get_title().' ('.$cart_item['quantity'].')';
    }

    $products_descriptions_text = implode( ', ', $products_descriptions );


    $payment_data = array(
        'merchantID' => amaya_coriunder_merchant_id(),
        'url_redirect' => home_url( '/coriunder-redirect/' ),
        'url_notify' => home_url( '/coriunder-notify/' ),
        'trans_comment' => $products_descriptions_text,
        'trans_refNum' => amaya_coriunder_token(12),
        'trans_installments' => '1',
        'trans_amount' => $cart->get_cart_contents_total(),
        'trans_currency' => 'ILS',
        'disp_paymentType' => 'CC',
        'disp_payFor' => 'Purchase',
        'disp_recurring' => '0',
        'disp_lng' => 'he-IL',
        //'disp_lng' => 'en-US',
        'disp_mobile' => 'true',
        'client_fullName' => $billing_first_name  . ' ' . $billing_last_name,
        'client_email' => $billing_email,
        'client_phoneNum' => $billing_phone,
        'client_idNum' => $user_id,
        'client_billAddress1' => $billing_address,
        'client_billCity' => $billing_city,
        'client_billZipcode' => $billing_postcode,
        'client_billState' => 'Undefined',
        'client_billCountry' => $billing_country,
        'skin_no' => '1',
    );


    $retSignature = '';

    foreach ( $payment_data as $value ) {
        $retSignature .= $value;
    }

    $retSignature .= amaya_coriunder_hash_key();

    $payment_data['signature'] = base64_encode(hash("sha256", $retSignature, true));

    //$iframe_url = 'https://uiservices.coriunder.cloud/hosted?' . http_build_query( $payment_data );
    $iframe_url = 'https://uiservices.securepayment3d.com/hosted?' . http_build_query( $payment_data );

    ?><iframe src="<?php echo $iframe_url; ?>" frameborder="0" style="width: 100%; height: 1000px;"></iframe><?php

    exit;
}
add_action( 'wp_ajax_nopriv_amaya_coriunder_iframe', 'amaya_coriunder_iframe_ajax' );
add_action( 'wp_ajax_amaya_coriunder_iframe', 'amaya_coriunder_iframe_ajax' );


function amaya_coriunder_redirect() {
    if ( ! is_page( 'coriunder-redirect' ) ) {
        return;
    }

    $redirect_to_home = false;

    if ( empty( $_REQUEST['merchantID'] ) || $_REQUEST['merchantID'] != amaya_coriunder_merchant_id() )  {
        $redirect_to_home = true;
    }

    if ( empty( $_REQUEST['replyCode'] ) ) {
        $redirect_to_home = true;
    }

    $referer_url_parts = parse_url( $_SERVER['HTTP_REFERER'] );

    if ( empty( $referer_url_parts['host'] ) || $referer_url_parts['host'] != 'uiservices.coriunder.cloud' ) {
        $redirect_to_home = true;
    }

    amaya_log( $_REQUEST );

    if ( $redirect_to_home ) {
        ?>
        <script>
            window.top.location = '<?php echo site_url(); ?>';
        </script>
        <?php
    } else if ( $_REQUEST['replyCode'] == '000' ) {

        $cart = WC()->cart;
        $cart->calculate_totals();
        $checkout = WC()->checkout();
        $order_data = array(
            'terms' => 0,
            'createaccount' => 0,
            'payment_method' => 'Coriunder',
            'shipping_method' => '',
            'ship_to_different_address' => '',
            'woocommerce_checkout_update_totals' => '',
            'billing_first_name' => WC()->customer->get_billing_first_name(),
            'billing_last_name' => WC()->customer->get_billing_last_name(),
            'billing_country' => 'IL',
            'billing_city' => WC()->customer->get_billing_city(),
            'billing_address_1' => WC()->customer->get_billing_address(),
            'billing_postcode' => WC()->customer->get_billing_postcode(),
            'billing_phone' => WC()->customer->get_billing_phone(),
            'billing_email' =>  WC()->customer->get_billing_email(),
            'order_comments' => '',
            'customer_id' => WC()->customer->get_id(),
        );

        $order_id = $checkout->create_order( $order_data );
        $order = wc_create_order( array(
            'order_id' => $order_id,
            'customer_id' => WC()->customer->get_id(),
        ) );
        $order->set_status( 'processing' );
        $order->calculate_totals();

        $arFields = array();
        $arFields['KEY'] = 'H&^HIo86ohi77Ot8bYT';
        $arFields['billing_country'] = $order_data['billing_country'];
        $arFields['billing_address'] = $order_data['billing_address_1'];
        $arFields['billing_city'] = $order_data['billing_city'];
        $arFields['billing_postcode'] = $order_data['billing_postcode'];
        $arFields['phone'] = $order_data['billing_phone'];
        $arFields['ccv'] = '';
        $arFields['card_number'] = '';
        $arFields['sum'] = $_REQUEST['trans_amount'];
        $arFields['exp_date'] = '';
        $arFields['first_name'] = $order_data['billing_first_name'];;
        $arFields['last_name'] = $order_data['billing_last_name'];;
        $arFields['email'] = $order_data['billing_email'];;
        $arFields['id'] = $order_id;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://amaya.work/bitrix/tools/paid_lead_import.php",
            CURLOPT_POSTFIELDS => http_build_query($arFields)
        ));

        $result = curl_exec($curl);
        
        curl_close($curl);

        $result = json_decode($result, 1);

        ?>
        <script>
            window.top.location = '<?php echo home_url( '/thank-you-for-purchasing/' ) . '?confirmation=' . $order_id ?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('התשלום נכשל. בבקשה נסה שוב.');
            window.top.location = '<?php echo home_url( '/checkout/' ) ?>';
        </script>
        <?php
    }

    exit;
}
add_action( 'template_redirect', 'amaya_coriunder_redirect' );