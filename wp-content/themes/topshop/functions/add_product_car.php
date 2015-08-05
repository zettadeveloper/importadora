<?php
require "../../../../wp-load.php";

global $wpdb;
$response = array();
$table = "user_products";
$data = array();

$user = wp_get_current_user();


if(!empty($_GET)){
	$data['id_product'] = $_GET['id'];
	$data['id_user'] = $user->data->ID;
	$data['id_status_product'] = 1;
	$data['stock'] = $_GET['stock'];
	$wpdb->insert($table,$data,array());
	
	if($wpdb->insert_id > 0){
		$response['status'] = 'success';
		$response['data'] = 'Todo ha salido correctamente';
	}else{
		$response['status'] = 'error';
		$response['msg'] = 'Un problema ha ocurrido durante el proceso de inserción, porfavor intenta nuevamente.';
	}
}else{
	$response['status'] = 'error';
	$response['msg'] = 'Un problema ha ocurrido durante el proceso de inserción, porfavor intenta nuevamente.';
}


echo json_encode($response);
?>