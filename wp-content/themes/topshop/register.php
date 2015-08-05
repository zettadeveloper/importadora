<?php
/*
* Template Name: Register Page
*/

get_header(); 
global $wpdb;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <div class="wp_login_form">
		<div class="form_heading"> Register Form </div>
			<form>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Correo electronico</label>
			    <input type="email" id="user_email" class="form-control" id="email" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nombre</label>
			    <input type="text" id="user_name" class="form-control" id="name" placeholder="Nombre">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Contraseña</label>
			    <input type="password" id="user_password" class="form-control" id="pass" placeholder="Contraseña">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Repetir contraseña</label>
			    <input type="password" id="user_password2" class="form-control" id="pass2" placeholder="Repite la contraseña">
			  </div>
			  <button type="button" id="create_user" class="btn btn-default">Crear</button>
			</form>	
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>

<!-- ******************* -->
