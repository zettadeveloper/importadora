<?php 
require "../../../../wp-load.php";

$data = array();
$username = $_POST['name'];
$password = $_POST['pass'];
$email = $_POST['email'];
$response = array();
$return = 0;

$return = wp_create_user( $username, $password, $email );

if(!is_numeric($return)){
	$response['status'] = 'error';
}else{
	wp_set_current_user($return);
	$response['status'] = 'success';
}

echo json_encode($response);

?>