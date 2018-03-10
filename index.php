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



function init(){
//create Database	
	error_log("***Plugin started***");
	/* create table */
	global $wpdb;

	$table_name = $wpdb->prefix . "licenses";

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
	id int NOT NULL AUTO_INCREMENT,
	art_id int,
	art_desc varchar(200),
	serial varchar(500),
	used_by int,
	order_id int,
	comment varchar(5000),
	created datetime,
	PRIMARY KEY  (id)
	) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );	
	
	
}





register_activation_hook( __FILE__, 'init' );














?>
