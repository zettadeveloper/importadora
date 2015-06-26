<?php
/*
Template Name: Mi-Carrito
*/

get_header(); 
global $wpdb;

$user = wp_get_current_user();

$id_user = $user->ID; 

if($id_user > 0){
	$results = $wpdb->get_results( 'SELECT up.id_product, up.stock, p.precio, p.id_post, p.image, p.name FROM user_products as up INNER JOIN products as p ON (up.id_product = p.id_product) WHERE id_status_product = 1 AND id_user = '.$id_user, ARRAY_A );
}

// echo "<pre>";
// print_r($results);
// echo "</pre>";


?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if(count($results) > 0){
				?>
				<div style="border: 1px solid #333; padding:10px 0px;text-align: center;display:table;width: 100%">
					<li style="display: table-row">
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Nombre</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Precio</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Cantidad</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Imagen</div>
					</li>
					
					<?php
					foreach ($results as $key => $value) {
					?>
					<li style="display: table-row;border-bottom: 1px solid #333">
						<div class="my-car-product"><?php echo $value['name'];?></div>
						<div class="my-car-product"><?php echo $value['precio'];?></div>
						<div class="my-car-product"><?php echo $value['stock'];?></div>
						<div class="my-car-product"><img src="http://www.importadoraseverino.com/wp-content/plugins/admin-products/uploads/<?php echo $value['image'];?>" style="width: 100px; height:100px"></div>
					</li>
					<div style="clear: both;"></div>
					<hr>
					<?php
					}
					?>
					</div>
				<?php
			}else{
				?>
				<div style="border: 1px solid #333;padding:10px"><em>Tu no tienes ningun producto en tu carrito de compras. Para añadir algun producto a tu carrito, ve directamente a algun producto de tu interes y da click en el botón "Añadir al carrito"</em></div>
				<?php
			}
			?>
			
			
			<div style="height: 100px"></div>
			<div>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>