<?php 
//die(INSERT_PRODUCT_PLUGIN_URL);
if(session_id())
	session_start();

global $wpdb;
$categories = array();
$results = $wpdb->get_results("SELECT * FROM categories", ARRAY_A);

$products = $wpdb->get_results("SELECT id_product,name,precio,image,cantidad FROM products", ARRAY_A);

// echo "<pre>";
// print_r($products);
// echo "</pre>";


foreach ($results as $key => $result) {
	if($result['parent_id'] == 0){
		$categories[$result['id_category']] = $result;
	}else{
		$categories[$result['parent_id']]['sub'][$result['id_category']] = $result;
	}
}

?>


<script type="text/javascript" src="<?php echo INSERT_PRODUCT_PLUGIN_URL;?>/js/bootstrap.js"></script>
<link rel="stylesheet" href="<?php echo INSERT_PRODUCT_PLUGIN_URL;?>/css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
<link rel="stylesheet" href="<?=INSERT_PRODUCT_PLUGIN_URL.'/css/style.css'?>" />
<script type="text/javascript">

function showSubCategories(id){
	
	if(jQuery("#category-"+id).css("display") == "block"){
		jQuery("#category-"+id).css("display","none");
		jQuery("#arrow-"+id).removeClass("fa-minus");
		jQuery("#arrow-"+id).addClass("fa-plus");
	}else{
		jQuery("#category-"+id).css("display","block");
		jQuery("#arrow-"+id).removeClass("fa-plus");
		jQuery("#arrow-"+id).addClass("fa-minus");
	}
}
</script>
<div>
<?php 
if(isset($_SESSION['status-insert'])){
	$status = $_SESSION['status-insert'];
	unset($_SESSION['status-insert']);
	if($status == "error"){
		?>
		<div style="  width: 400px;
		  padding: 15px;
		  border: 1px solid #F52214;
		  background-color: #F0BAB6;
		  font-weight: bold;
		  border-radius: 5px; ">
  <?php
  	foreach ($_SESSION['errores'] as $key => $value) {
		  echo $value."<br>";
	  }
  ?>

  </div>
		<?php
	}elseif($status == "success"){
		?>
<div style="  width: 400px;
  padding: 15px;
  border: 1px solid #278A1A;
  background-color: #9CEB91;
  font-weight: bold;
  border-radius: 5px;
  text-align: center;">El producto se ha creado correctamente</div>
<?php
	}
	
	if(isset($_SESSION['errores_img']) && count($_SESSION['errores_img']) > 0){
		?>
			<div style="  width: 400px;
			  padding: 15px;
			  border: 1px solid #FFD900;
			  background-color: #FFF09E;
			  font-weight: bold;
			  border-radius: 5px; ">
	  <?php
	  	foreach ($_SESSION['errores_img'] as $key => $error) {
			  echo $error."<br>";
		  }
	  ?>
	  </div>
	  <?
	}
}
?>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<div style="padding: 20px;">
    		<?php
    		include 'list-products.php';
    		?>
    	</div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    	<div style="padding: 20px;">
    		<?php
    		include 'add-products.php';
    		?>
    	</div>	
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
    	<div style="padding: 20px;">
    		<?php
    		include 'list-quotes.php';
    		?>
    	</div>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
    	<div style="background-color: green;padding: 20px;"></div>
    </div>
  </div>

</div>
<?php
?>