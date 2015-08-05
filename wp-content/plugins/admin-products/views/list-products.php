<h3>Lista de Productos</h3>
<div id='generate-report'>
	<div id='generate-report-container' style="max-height: 500px;overflow: scroll">
		
		<div style="padding:10px 0px;text-align: center;display:table;width: 100%;">
					<li style="display: table-row">
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Nombre</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Precio</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Cantidad</div>
						<div style="width: 25%;display: table-cell;float:left;list-style: none;font-weight: bold;">Imagen</div>
					</li>
					<hr style="border-bottom: 1px solid #333;">
					<?php
					foreach ($products as $key => $product) {
						?>
						<li style="display: table-row;border-bottom: 1px solid #333">
							<div class="my-car-product"><?php echo $product['name'];?></div>
							<div class="my-car-product"><?php echo $product['precio'];?></div>
							<div class="my-car-product"><?php echo $product['cantidad'];?></div>
							<div class="my-car-product"><img src="http://www.importadoraseverino.com/wp-content/plugins/admin-products/uploads/<?php echo (empty($product['image']) == FALSE) ? $product['image'] : 'noimage.jpg';?>" style="width: 100px; height:100px"></div>
						</li>
						<hr>
						<div style="clear: both;"></div>
						<?php
					}
					?>
		</div>
	</div>
</div>