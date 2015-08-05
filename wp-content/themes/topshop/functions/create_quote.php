<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require "../../../../wp-load.php";

global $wpdb;
$response = array();
$table_quote = 'quotes';
$table_user_products = 'user_products';


$user = wp_get_current_user();

$id_user = $user->data->ID;

if($id_user > 0){
	
	$quote['id_user'] = $id_user;
	$quote['date_quote'] = date("Y-m-d H:i:s");
	$quote['status_quote'] = 1;
	$quote['subtotal_quote'] = 0;
	$quote['total_quote'] = 0;
	
	$wpdb->insert($table_quote,$quote,array());
	
	$quote_id = $wpdb->insert_id;
	
	if($quote_id > 0){
		$wpdb->update(
			$table_user_products, 
			array( 
				'id_quote' => $quote_id,
				'id_status_product' => '2'
			), 
			array( 'id_user' => $id_user, 'id_quote' => 0)
		);
		
		$total = 0;
		$products = $wpdb->get_results('SELECT up.*,p.precio as price FROM user_products AS up INNER JOIN products AS p ON (up.id_product = p.id_product) WHERE id_quote=1',OBJECT_K);
		foreach ($products as $key => $product) {
			$temp = 0;
			$temp = $product->price * $product->stock;
			$total = (int)$total + (int)$temp;
		}
		
		$wpdb->update(
			$table_quote, 
			array( 
				'subtotal_quote' => $total,
				'total_quote' => $total
			), 
			array( 'id_user' => $id_user, 'id_quote' => $quote_id)
		);

		$response['status'] = 'success';
	}else{
		$response['status'] = 'error';
	}
}else{
	$response['status'] = 'error';
}

echo json_encode($response);
?>