<?php
/*
* Template Name: Login Page
*/

get_header(); 
global $wpdb;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <div class="wp_login_form">
		<div class="form_heading"> Login Form </div>
		
		<?php
		$args = array(
		'redirect' => home_url(),
		'id_username' => 'user',
		'id_password' => 'pass',
		)
		;?>
		
		<?php wp_login_form( $args ); ?> 			
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>

<!-- ******************* -->



</div>

?>