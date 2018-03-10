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

//add_action( 'plugins_loaded', 'add_voucher', 10, 1 );
//add_action('plugins_loaded', 'test');

//add_action('woocommerce_order_status_changed', 'add_voucher');


function test(){
	echo "<script language='javascript'>alert('test successful');</script>";
}

function init(){
//create Database	
	
	
	
}

function dispatch_licenses(){ //call every 15 minutes
	
//1get all unfinished orders which are paid
//2fetch all available licences

//if 1 > 0 
	//loop for (unfinished orders)
 		//compare ordered product id with available licences
		//if available
			//fetch email of buyer + send email + add buyer to database
		//else 
			//mail not available to admin
	//loop end
	
}


function add_voucher($order_id){
	
	
	
	/* get product id */
	$order = wc_get_order( $order_id );
	error_log($order_id);
	//echo "<script language='javascript'>alert('$order_id');</script>";
	//$order = new WC_Order($order_id);
	$items = $order->get_items();
	$customer = $order->get_user_id();
	error_log($customer);
	//echo "<script language='javascript'>alert('$customer');</script>";
	foreach ( $items as $item ) {
    $product_name = $item->get_name();
    $product_id = $item->get_product_id();
    $product_variation_id = $item->get_variation_id();
	}
	
	/* query */
	$mylink = $wpdb->get_row( "
	SELECT * FROM $table_name WHERE art_id = $product_id AND used_by = '' ORDER BY created ASC LIMIT 1
	" );
	
	if ($mylink !== null) {
	
		/* write to db */
		$wpdb->update( 
			$table_name, 
			array( 
				'used_by' => $customer,	// string
				'order_id' => $order_id	// integer (number) 
			), 
			array( 'ID' => $mylink->id ), 
			array( 
				'%d',	// value1
				'%d'	// value2
			), 
			array( '%d' ) 
		);
		
		
		/* send mail */
	
	
	}
}


register_activation_hook( __FILE__, 'pluginprefix_install' );














?>
