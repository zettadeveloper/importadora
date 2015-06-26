<?php
require "../../../../wp-load.php";

global $wpdb;
$response = array();
$table = "user_products";
$data = array();



if(!empty($_GET)){
	$data['id_product'] = $_GET['id'];
	$data['id_user'] = 2;
	$data['id_status_product'] = 1;
	$data['stock'] = 1;
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