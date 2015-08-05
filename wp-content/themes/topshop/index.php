<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package topshop
 */

get_header();

//echo "<pre>";print_r(wp_get_current_user());echo "</pre>";
?>

<?php if ( ! is_front_page() ) :
?>

<?php if ( function_exists( 'bcn_display' ) ) :
?>
<div class="breadcrumbs">
	<?php bcn_display(); ?>
</div>
<?php endif; ?>

<?php endif; ?>

<nav id="site-navigation" class="main-navigation  toggled" role="navigation" style="margin-bottom: 15px">

    <div class="site-container">
        <div class="menu-primary-container">
        	<ul id="menu-primary" class="menu nav-menu" aria-expanded="true">
        		<li id="menu-item-31" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-31">
        			<a href="http://www.importadoraseverino.com/">Piñones</a>
        		</li>
				<li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
					<a href="http://www.importadoraseverino.com/pagina-ejemplo/">Tuercas</a>
				</li>
				<li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
					<a href="http://www.importadoraseverino.com/pagina-ejemplo/">Testing 1</a>
				</li>
				<li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
					<a href="http://www.importadoraseverino.com/pagina-ejemplo/">Testing 2</a>
				</li>
				<li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
					<a href="http://www.importadoraseverino.com/pagina-ejemplo/">Testing 3</a>
				</li>
			</ul>
		</div>
    </div>

</nav>

<div class="container">
	<div class="row">
		<div id="primary" class="col-md-9 col-xs-12">
			<main id="main" class="site-main" role="main">

				<?php get_template_part('/templates/titlebar'); ?>

				<?php if ( have_posts() ) :
				 		while ( have_posts() ) : the_post();
									get_template_part('content', get_post_format());
				 		endwhile;
								topshop_paging_nav();
					else :
							get_template_part('content', 'none'); ?>
				<?php endif; ?>
				<div class="clearfix"></div>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
