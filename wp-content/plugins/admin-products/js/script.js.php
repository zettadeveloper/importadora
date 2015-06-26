<script type="text/javascript">
function generate_report_ajax(){
		$.ajax({
		   url: <?=INSERT_PRODUCT_PLUGIN_URL?>."/logic.php",
		   data: $('#generate-report-form').serialize(),
		   success: function ( data ){
		   		console.log(data);
		   }
		});
}
</script>
