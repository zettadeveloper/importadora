<?php
if(!session_id())
	session_start();

require(dirname(__FILE__) . '/../../../wp-load.php');

global $wpdb;
//direccion guardado de imagenes

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$error = 0;
// Check if image file is a actual image or fake image

$post = array();
$product = array();
$error = array();
$error_img = array();

// Insert the post into the database

if(empty($_POST['nombre']) == FALSE){
	$post['post_title'] = $_POST['nombre'];
}else{
	$error[] = 'El nombre del producto es obligatorio';
}
if(empty($_POST['desc']) == FALSE){
	$post['post_content'] = $_POST['desc'];
}else{
	$error[] = 'La descripcion es obligatoria';
}
$post['post_status'] = 'publish';
$post['post_author'] = 1;

if(empty($_POST['ref']) == TRUE){
	$error[] = 'La referencia es obligatoria';
}

if(empty($_POST['category']) == TRUE){
	$error[] = 'La categoria es obligatoria';
}

if(count($error) == 0){
	$id_post = wp_insert_post( $post );
}

if(isset($id_post) && $id_post > 0){
	if(isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["name"] != ""){
	
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        // echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        // echo "File is not an image.";
	        $uploadOk = 0;
			$error_img[] = "El archivo no es una imagen"; 
	    }
		// Check if file already exists
		if (file_exists($target_file)) {
		    // echo "Sorry, file already exists.";
		    $error_img[] = "Esta imagen ya existe"; 
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    // echo "Sorry, your file is too large.";
		    $error_img[] = "la imagen es demasiado pesada"; 
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $error_img[] = "La imagen debe de estar en formato JPG, JPEG, PNG & GIF"; 
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    	$uploadOk = 0;
				$error_img[] = "Ha ocurrido un problema subiendo la imagen"; 
		    }
		}
		
	}
}else{
	$error[] = 'No se ha podido crear el producto, porfavor intente nuevamente';
}



//If Exists Errors show them else show a success 
if(count($error) > 0){
	$_SESSION['status-insert'] = "error";
	$_SESSION['errores'] = $error;
}else{
	
	$product['name'] = $_POST['nombre'];
	$product['referencia'] = $_POST['nombre'];
	$product['precio'] = $_POST['price'];
	$product['cantidad'] = $_POST['qty'];
	$product['id_post'] = $id_post;
	$product['categories_id'] = implode(",",$_POST['category']);
	$product['image'] = (isset($_FILES["fileToUpload"]["name"])) ? $_FILES["fileToUpload"]["name"] : '' ;
	$wpdb->insert( "products", $product);
	
	$id_product = $wpdb->insert_id;
	
	if($id_product > 0){
		$_SESSION['status-insert'] = "success";
	}else{
		$_SESSION['status-insert'] = "error";
		$_SESSION['errores'] = $error;
	}
}
$_SESSION['errores_img'] = $error_img;

unset($_POST);

header('Location: http://www.importadoraseverino.com/wp-admin/options-general.php?page=admin-products');
	
?>