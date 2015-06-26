<?php
/**
 * @package topshop
 */

global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM products WHERE id_post = ".$post->ID, OBJECT );
// echo "<pre>";
// print_r($results);
// echo "</pre>";

?>
<article id="post-<?php echo $post->ID;?>" <?php post_class('blog-post-side-layout' ); ?>>

    <div class="post-loop-content">
    
    	<header class="entry-header">
    		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <div style="border: 1px solid #C5BABA;width: 200px;height: 202px;"><img src="wp-content/plugins/admin-products/uploads/<?php echo (empty($results[0]->image) == FALSE) ? $results[0]->image : 'noimage.jpg';?>" alt="product" style="width: 200px;height: 200px;"/></div>
    	</header><!-- .entry-header -->

    	<div class="entry-content" style="font-size: 20px;">
            Precio: $<?php echo $results[0]->precio;?>
    	</div><!-- .entry-content -->  
    	<div>
    		<button onclick="addProductToCar(<?=$results[0]->id_product;?>)">Añadir al Carro</button>
    	</div>
    </div>
    
    <div class="clearboth"></div>
</article><!-- #post-## -->