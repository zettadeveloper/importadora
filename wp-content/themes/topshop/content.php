<?php
/**
 * @package topshop
 */

global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM products WHERE id_post = $post->ID", OBJECT );
?>
<article id="post-<?php echo $post->ID;?>" <?php post_class('blog-post-side-layout' ); ?>>

    <div class="post-loop-content">
    
    	<header class="entry-header">
    		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <div><img src="wp-content/themes/topshop/images/products/product_1.jpg" alt="product" /></div>
    	</header><!-- .entry-header -->

    	<div class="entry-content" style="font-size: 20px;">
            Price: $350.000
    	</div><!-- .entry-content -->  
    	<div>
    		<button onclick="addProductToCar(<?=$results[0]->id_product;?>)">Añadir al Carro</button>
    	</div>
    </div>
    
    <div class="clearboth"></div>
</article><!-- #post-## -->