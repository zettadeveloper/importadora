<?php
/*
Template Name: Categories
*/

get_header(); 
global $wpdb;



if(isset($_GET['id']) && is_numeric((int)$_GET['id'])){
	$products = $wpdb->get_results("SELECT * FROM products WHERE categories_id LIKE '%".$_GET['id']."%'", ARRAY_A);
}

foreach ($products as $key => $product) {
	$products[$key]['post_data'] = get_post($product['id_post']);
}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php
            foreach ($products as $key => $product) {
            ?>
            <article id="category" class="blog-post-side-layout post type-post status-publish format-standard hentry category-mitsubishi">

			    <div class="post-loop-content">
			    
			    	<header class="entry-header">
			    		<h1 class="entry-title"><a href="" rel="bookmark"><?=$product['post_data']->post_title;?></a></h1>
			    		<div>
			    			<img src="../wp-content/themes/topshop/images/products/product_1.jpg" alt="product">
			    		</div>
			    	</header>
			    	
			    	<div class="entry-content" style="font-size: 20px;">
			            Price: $<?=$product['precio'];?>
			    	</div><!-- .entry-content -->  
			    </div>
			    
			    <div class="clearboth"></div>
			</article><!-- #post-## -->
			<?php
			}
			?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>