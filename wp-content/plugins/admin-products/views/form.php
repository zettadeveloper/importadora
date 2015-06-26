<?php 
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
<h1>Administrador de Productos</h1>

<h3>Lista de Productos</h3>
<div id='generate-report'>
	<div id='generate-report-container' style="max-height: 500px;overflow: scroll">
		
		<div style="padding:10px 0px;text-align: center;display:table;width: 100%;">
					<li style="display: table-row">
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Nombre</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Precio</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Cantidad</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Imagen</div>
					</li>
					<hr style="border-bottom: 1px solid #333;">
					
					
					<?php
					foreach ($products as $key => $product) {
						?>
						<li style="display: table-row;border-bottom: 1px solid #333">
							<div class="my-car-product"><?php echo $product['name'];?></div>
							<div class="my-car-product"><?php echo $product['precio'];?></div>
							<div class="my-car-product"><?php echo $product['cantidad'];?></div>
							<div class="my-car-product"><img src="http://www.importadoraseverino.com/wp-content/plugins/admin-products/uploads/<?php echo (empty($product['image']) == FALSE) ? $product['image'] : 'noimage.jpg';?>" style="width: 100px; height:100px"></div>
						</li>
						<hr>
						<div style="clear: both;"></div>
						<?php
					}
					?>
					
		</div>
		
		
		
	</div>
</div>
<div style="height: 50px;"></div>
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
<h3>Crear Producto</h3>
<div id='generate-report'>
<p><b>Porfavor ingrese los datos requeridos para crear un producto:</b></p>
	<div id='generate-report-container' style="height: 500px;">
		<form id='generate-report-form' action="<?=INSERT_PRODUCT_PLUGIN_URL.'/logic.php';?>" method='POST' enctype="multipart/form-data">
			<div style="width: 50%;float:left">
				<div>
					<div>Nombre:</div> <input type='text' name='nombre'><br>
				</div>
				<div>
					<div>Referencia:</div> <input type='text' name='ref'><br>
				</div>
				<div>
					<div>Precio:</div> <input type='number' name='price'><br>
				</div>
				<div>
					<div>Cantidad en Motor:</div> <input type='text' name='qty'><br>
				</div>
				<div>
					<div>Descripcion:</div>
					<textarea cols="50" rows="5" name='desc'></textarea>
				</div>
				
				<div>
					<div>Imagen:</div> <input type="file" name="fileToUpload" id="fileToUpload" /><br>
				</div>
				
			</div>	
			<div style="width: 50%;float:left">
				<!-- -->
				<div>Categorias</div>
				<div style="height: 350px;max-height: 350px;overflow: scroll;background-color: #EFEDED;padding:15px">
					<ul class="list-categories">
						<?php
						foreach ($categories as $key => $category) {
						?>
							<li>
								<div>
									<?php
									if(array_key_exists('sub', $category)){
										echo $category['category_name'];
									?>	
										<i onclick="showSubCategories(<?=$category['id_category'];?>)" id="arrow-<?=$category['id_category'];?>" class="fa fa-plus" style="margin-left: 5px;">+</i>
									<?php
									}else{
										?>
										<label><?= $category['category_name'];?></label>
										<input type="checkbox" name="category[]" id="category" value="<?=$category['id_category'];?>"/>
										<?php
									}
									?>
								</div>
								<?php
								if(array_key_exists('sub', $category)){
									?>
									<div id="category-<?php echo $category['id_category'];?>" style="display:none;margin-left: 30px;">
									<?php
										foreach ($category['sub'] as $sub_key => $subcategory) {	
										?>
											<div class="sub-category"><br />
												<label><?= $subcategory['category_name'];?></label>
												<input type="checkbox" name="category[]" id="category" value="<?=$subcategory['id_category'];?>"/>
											</div>
										<?php
										}
									?>
									</div>
									<?php
								}
								?>
							</li>
						<?php
						}
						?>
					</ul>
				</div>
				<!-- -->
			</div>
			<div style="height: 20px;clear: both;"></div>
			<div><input type="submit" value="Crear"></div>
		</form>
	</div>
</div>
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
<?php
?>