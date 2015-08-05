<?php
/**
 * @package topshop
 */

global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM products WHERE id_post = ".$post->ID, OBJECT );
// echo "<pre>";
// print_r($post);
// echo "</pre>";

?>
<?php /*<article id="post-<?php echo $post->ID;?>" <?php post_class('blog-post-side-layout' ); ?>>*/ ?>
<div id="post-<?php echo $post->ID;?>" class="col-md-4 col-xs-12 post-style col-sm-4">

    <div class="post-loop-content">

    	<header class="entry-header">
    		<h1 class="entry-title header-text">
    			<a href="http://www.importadoraseverino.com/<?php echo $post->post_name;?>" rel="bookmark">
    			<?php echo strtolower($results[0]->name);?>
    			</a>
    		</h1>
            <div style="border: 1px solid #C5BABA;width: 200px;height: 202px;" class="content-div"><img src="wp-content/plugins/admin-products/uploads/<?php echo (empty($results[0]->image) == FALSE) ? $results[0]->image : 'noimage.jpg';?>" alt="product" style="width: 200px;height: 200px;"/></div>
    	</header><!-- .entry-header -->

    	<div class="entry-content" style="font-size: 14px;">
            Precio: $<?php echo $results[0]->precio;?>
    	</div><!-- .entry-content -->
    	<div class="content-buttom">
    		<button class="btnAddtoCar" onclick="addProductToCar(<?=$results[0]->id_product;?>,1)">Añadir al Carro</button>
    	</div>
    </div>

    <div class="clearboth"></div>
</div><!-- #post-## -->
