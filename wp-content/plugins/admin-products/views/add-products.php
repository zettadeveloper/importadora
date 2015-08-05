<h3>Crear Producto</h3>
<div id='generate-report'>
<p><b>Porfavor ingrese los datos requeridos para crear un producto:</b></p>
	<div id='generate-report-container' style="height: 500px;">
		<form id='generate-report-form' action="<?=INSERT_PRODUCT_PLUGIN_URL.'/logic.php';?>" method='POST' enctype="multipart/form-data">
			<div style="width: 50%;float:left">
				<div>
					<div>Nombre:</div> <input type='text' name='nombre'><br>
				</div>
				<div>
					<div>Referencia:</div> <input type='text' name='ref'><br>
				</div>
				<div>
					<div>Precio:</div> <input type='number' name='price'><br>
				</div>
				<div>
					<div>Cantidad en Motor:</div> <input type='text' name='qty'><br>
				</div>
				<div>
					<div>Descripcion:</div>
					<textarea cols="50" rows="5" name='desc'></textarea>
				</div>
				
				<div>
					<div>Imagen:</div> <input type="file" name="fileToUpload" id="fileToUpload" /><br>
				</div>
				
			</div>	
			<div style="width: 50%;float:left">
				<!-- -->
				<div>Categorias</div>
				<div style="height: 350px;max-height: 350px;overflow: scroll;background-color: #EFEDED;padding:15px">
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
										<i onclick="showSubCategories(<?=$category['id_category'];?>)" id="arrow-<?=$category['id_category'];?>" class="fa fa-plus" style="margin-left: 5px;">+</i>
									<?php
									}else{
										?>
										<label><?= $category['category_name'];?></label>
										<input type="checkbox" name="category[]" id="category" value="<?=$category['id_category'];?>"/>
										<?php
									}
									?>
								</div>
								<?php
								if(array_key_exists('sub', $category)){
									?>
									<div id="category-<?php echo $category['id_category'];?>" style="display:none;margin-left: 30px;">
									<?php
										foreach ($category['sub'] as $sub_key => $subcategory) {	
										?>
											<div class="sub-category"><br />
												<label><?= $subcategory['category_name'];?></label>
												<input type="checkbox" name="category[]" id="category" value="<?=$subcategory['id_category'];?>"/>
											</div>
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
				<!-- -->
			</div>
			<div style="height: 20px;clear: both;"></div>
			<div><input type="submit" value="Crear"></div>
		</form>
	</div>
</div>