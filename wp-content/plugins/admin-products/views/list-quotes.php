<?php



$quotes = $wpdb->get_results("SELECT q.id_quote,q.date_quote,q.subtotal_quote,q.total_quote,u.display_name,u.ID,(SELECT COUNT(*) FROM user_products WHERE id_quote = q.id_quote) AS stock FROM quotes AS q INNER JOIN wp_users AS u ON (u.ID = q.id_user) ", OBJECT_K);

echo '<pre>';
print_r($quotes);
echo '</pre>';

?>

<style>
/*
 * Row with equal height columns
 * --------------------------------------------------
 */
.row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
}

/*
 * Styles copied from the Grid example to make grid rows & columns visible.
 */
.container {
  padding-right: 15px;
  padding-left: 15px;
}

h4 {
  margin-top: 25px;
}
.row {
  margin-bottom: 20px;
}
.row .row {
  margin-top: 10px;
  margin-bottom: 0;
}
[class*="col-"] {
  padding-top: 15px;
  padding-bottom: 15px;
  /*background-color: #eee;
  background-color: rgba(86,61,124,.15);
  border: 1px solid #ddd;
  border: 1px solid rgba(86,61,124,.2);*/
}

/*
 * Callout styles copied from Bootstrap's main docs.
 */
/* Common styles for all types */
/*.bs-callout {
  padding: 20px;
  margin: 20px 0;
  border-left: 3px solid #eee;
}
.bs-callout h4 {
  margin-top: 0;
  margin-bottom: 5px;
}
.bs-callout p:last-child {
  margin-bottom: 0;
}
.bs-callout code {
  background-color: #fff;
  border-radius: 3px;*/
}
/* Variations */
/*.bs-callout-danger {
  background-color: #fdf7f7;
  border-color: #d9534f;
}
.bs-callout-danger h4 {
  color: #d9534f;
}
.bs-callout-warning {
  background-color: #fcf8f2;
  border-color: #f0ad4e;
}
.bs-callout-warning h4 {
  color: #f0ad4e;
}
.bs-callout-info {
  background-color: #f4f8fa;
  border-color: #5bc0de;
}
.bs-callout-info h4 {
  color: #5bc0de;
}*/
	
</style>

<div class="row">
	<div class="col-md-12">
		<div class="row">
	
			<div class="col-md-3">Id Cotización</div>
	
			<div class="col-md-3">Fecha</div>
	
			<div class="col-md-3">Usuario</div>
	
			<div class="col-md-3">Cantidad</div>	
	
		</div>
	
		<?php
	
		foreach ($quotes as $key => $quote) {
		?>
	
			<div class="row row-eq-height">
	
				<div class="col-md-2 border-gray"><?php echo $quote->id_quote;?></div>
	
				<div class="col-md-3 border-gray"><?php echo $quote->date_quote;?></div>
	
				<div class="col-md-3 border-gray"><?php echo $quote->display_name;?></div>
	
				<div class="col-md-2 border-gray"><?php echo $quote->stock;?></div>	
				
				<div class="col-md-2 border-gray"><button id="create_quote" class="btn btn-primary" onclick="createQuote(<?php echo $quote->id_quote;?>)">Cotizar</button></div>	
	
			</div>
	
		<?	
		}
	
		?>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		console.log("JSDO");
		
		jQuery("#create_quote").click(function(){
			jQuery.ajax({
				url: "http://www.importadoraseverino.com/wp-content/themes/topshop/functions/send_quote.php",
				dataType: "json",
				success: function(result){
					console.log(result);
		        }
		   	});
		});
		
	});
	
	

	function createQuote(id){
		var data = {
	      'action': 'my_action',
	      'id_quote':id
	    };
		
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	    jQuery.post(ajaxurl, data, function(response) {
	      console.log(response);
	    });
	}
	
</script>
