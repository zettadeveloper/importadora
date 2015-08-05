<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package topshop
 */

//logic to charge the categories

global $wpdb;

$categories = array();
$results = $wpdb->get_results("SELECT * FROM categories", ARRAY_A);

foreach ($results as $key => $result) {
	if($result['parent_id'] == 0){
		$categories[$result['id_category']] = $result;
	}else{
		$categories[$result['parent_id']]['sub'][$result['id_category']] = $result;
	}
}


if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>

<div id="secondary" class="col-md-3 col-xs-12" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<div id="categories">
		<div class="title-categories">Marcas</div>
		<ul class="list-categories">
			<?php
			foreach ($categories as $key => $category) {
			?>
				<li>
					<div>
						<?php
						if(array_key_exists('sub', $category)){
							echo $category['category_name'];
						?>
							<i onclick="showSubCategories(<?=$category['id_category'];?>)" id="arrow-<?=$category['id_category'];?>" class="fa fa-plus" style="margin-left: 5px;"></i>
						<?php
						}else{
							?>
							<a href="<?=get_site_url();?>/categorias?id=<?=$category['id_category'];?>"><?= $category['category_name'];?></a>
							<?php
						}
						?>
					</div>
					<?php
					if(array_key_exists('sub', $category)){
						?>
						<div id="category-<?php echo $category['id_category'];?>" style="display:none">
						<?php
							foreach ($category['sub'] as $sub_key => $subcategory) {
							?>
								<div class="sub-category"><a href="<?=get_site_url();?>/categorias?id=<?=$subcategory['id_category'];?>"><?= $subcategory['category_name'];?></a></div>
							<?php
							}
						?>
						</div>
						<?php
					}
					?>
				</li>
			<?php
			}
			?>
		</ul>
	</div>
</div><!-- #secondary -->

<script type="text/javascript">

function showSubCategories(id){
	if($("#category-"+id).css("display") == "block"){
		$("#category-"+id).css("display","none");
		$("#arrow-"+id).removeClass("fa-minus");
		$("#arrow-"+id).addClass("fa-plus");
	}else{
		$("#category-"+id).css("display","block");
		$("#arrow-"+id).removeClass("fa-plus");
		$("#arrow-"+id).addClass("fa-minus");
	}
}

$( document ).ready(function() {

});



</script>
