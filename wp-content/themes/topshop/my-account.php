<?php
/*
Template Name: Account
*/
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);



get_header(); 
global $wpdb;

$user = wp_get_current_user();

$id_user = $user->data->ID;

$quotes =  $wpdb->get_results("SELECT q.id_quote, q.date_quote, q.subtotal_quote, COUNT( DISTINCT up.id_user_product ) AS total_products FROM quotes q INNER JOIN user_products up ON q.id_quote = up.id_quote WHERE q.id_user=".$id_user." AND q.status_quote = 1 GROUP BY q.id_quote");

// echo "<pre>";
// print_r($quotes);
// echo "</pre>";


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<h3>Mis Cotizaciones</h3>
		<div style="border: 1px solid #333; padding:10px 0px;text-align: center;display:table;width: 100%">
					<li style="display: table-row">
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Codigo</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Fecha</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;"># de Productos</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Subtotal</div>
					</li>
					
					<?php
					foreach ($quotes as $key => $quote) {
					?>
						<li style="display: table-row;border-bottom: 1px solid #333">
							<div class="my-car-product">#<?php echo $quote->id_quote;?></div>
							<div class="my-car-product"><?php echo $quote->date_quote;?></div>
							<div class="my-car-product"><?php echo $quote->total_products;?></div>
							<div class="my-car-product"><?php echo $quote->subtotal_quote;?></div>
						</li>
						<div style="clear: both;"></div>
						<hr>
					<?php
					}
					?>
		</div>
		<div>
			
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>