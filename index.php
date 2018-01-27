<?php
/*
 * Plugin Name: Woocommerce Licence Manager
 * Version: 1.0.0
 * Description: This plugin helps to sell software license codes over woocommerce - when a predefined article is bought, a serial code is sent to the customer and an entry into the db is made
 * Author: Michael Allram
 * Author URI: http://itas.cc
 * Plugin URI: https://github.com/itas-gmbh/wc_licence_manager
 * Text Domain: wc_licence_manager
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
*/

function add_voucher($order_id){
	$order = wc_get_order( $order_id );
$items = $order->get_items();
	foreach ( $items as $item ) {
    $product_name = $item->get_name();
    $product_id = $item->get_product_id();
    $product_variation_id = $item->get_variation_id();
}
}



add_action( 'woocommerce_payment_complete', 'add_voucher', 10, 1 );











?>
