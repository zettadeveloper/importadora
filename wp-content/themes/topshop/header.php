<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package topshop
 */
global $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<link rel="stylesheet" href="/wp-content/themes/topshop/css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="/wp-content/themes/topshop/js/slick.min.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/topshop/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/topshop/css/slick-theme.css"/>
<script src="/wp-content/themes/topshop/js/main.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="loading">
	<img src="/wp-content/themes/topshop/images/loader.gif">
</div>

<div id="content" class="site-content site-container<?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? ' content-no-sidebar' : ' content-has-sidebar'; ?>">
<header id="masthead" class="site-header topshop-header-layout-standard" role="banner">

	<?php get_template_part( '/templates/header/header-layout-standard' ); ?>

</header><!-- #masthead -->

<?php if ( is_front_page() ) : ?>

	<?php get_template_part( '/templates/slider/homepage-slider' ); ?>

<?php endif; ?>
