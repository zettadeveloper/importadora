<?php
/**
 * @package topshop
 */

 global $wpdb;

 $id_product = get_the_ID();

 $product = $wpdb->get_row("SELECT * FROM products WHERE id_post = ".$id_product);

?>

<div class="col-md-9 col-xs-12">
    <div class="col-md-4 col-xs-12 text-center">
        <div class="visible-xs visible-sm hidden-md hidden-lg">
            <img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="img-responsive center-block" style=" border: 1px solid #C5BABA;">
        </div>
        <div class="hidden-xs hidden-sm visible-md visible-lg ">
            <img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="img-responsive" style=" border: 1px solid #C5BABA;">
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="col-xs-12 text-center">
            <?php echo $product->name;?>
            <div class="clearfix"></div>
            Referencia: <span class="orange"><?php echo $product->referencia;?></span>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="clearfix"></div>
        <div class="col-xs-12 col-md-6 text-center">
            $<?php echo $product->precio;?>
        </div>
        <div class="clearfix visible-xs"><br></div>
        <div class="col-xs-12 col-md-6 text-center">
            <div style="width:190px;" class="center-block">
                Cantidad:
                <button type="button" class="btn btn-default" onclick="lessStock()" style="margin-top:-1px;border-radius: 3px 0px 0px 3px;">
                    <i class="fa fa-minus"></i>
                </button>
                <input id="count" type="number" min="1" max="99" style="width:50px;margin-left:-4px;border-radius: 0px;height: 34px;text-align: center;padding-left: 15px;" disabled="disabled" value="1"/>
                <button type="button" class="btn btn-default" onclick="moreStock()" style="margin-left: -3px;border-radius: 0px 3px 3px 0px;margin-top: -1px;">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="clearfix"></div>
        <div class="col-xs-12 text-center">
            <button class="bg-orange" onclick="addProductFromPI(<?php echo $product->id_product;?>)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="clearfix"></div>
    <div class="col-xs-12">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="other-images max-width-400">
				<img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="other-images-img img-responsive"><br>
			</div>
        </div>
        <div class="clearfix visible-xs"><br></div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="other-images max-width-400">
				<img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="other-images-img img-responsive"><br>
			</div>
        </div>
        <div class="clearfix visible-xs"><br></div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="other-images max-width-400">
				<img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="other-images-img img-responsive"><br>
			</div>
        </div>
        <div class="clearfix visible-xs"><br></div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="other-images max-width-400">
				<img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="other-images-img img-responsive"><br>
			</div>
        </div>
    </div>
     <div class="clearfix"><br></div>
    <div id="produc-detail">
        <div id="produc-detail-title">Detalles del producto</div>
        <div id="produc-detail-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>

    <div id="related-products-title">Productos relacionados</div><br>

    <div class="col-xs-12 col-sm-4 col-md-3 ">
        <div class="related-productss">
            <div class="">
              <img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="border-general img-responsive margin-auto-xs">
            </div>
            <div class="clearfix"></div>
            <div class="center-text-xs">
                <div>Test</div>
                <div class="orange">$30000</div>
                <div><button class="related-products-btn btn-block"><i class="fa fa-shopping-cart"></i></button></div>
            </div>
        </div>
    </div>
    <div class="clearfix visible-xs"><br></div>
    <div class="col-xs-12 col-sm-4 col-md-3 ">
      <div class="related-productss">
          <div class="">
            <img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="border-general img-responsive margin-auto-xs">
          </div>
          <div class="clearfix"></div>
          <div class="center-text-xs">
              <div>Test</div>
              <div class="orange">$30000</div>
              <div><button class="related-products-btn btn-block"><i class="fa fa-shopping-cart"></i></button></div>
          </div>
      </div>
    </div>
    <div class="clearfix visible-xs"><br></div>
    <div class="col-xs-12 col-sm-4 col-md-3 ">
      <div class="related-productss">
          <div class="center-text-xs">
            <img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="border-general img-responsive margin-auto-xs">
          </div>
          <div class="clearfix"></div>
          <div class="center-text-xs">
              <div>Test</div>
              <div class="orange">$30000</div>
              <div><button class="related-products-btn btn-block"><i class="fa fa-shopping-cart"></i></button></div>
          </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3 ">
      <div class="related-productss">
          <div class="center-text-xs">
            <img src="<?php echo plugins_url(); ?>/admin-products/uploads/noimage.jpg" alt="product" class="border-general img-responsive margin-auto-xs">
          </div>
          <div class="clearfix"></div>
          <div class="center-text-xs">
              <div>Test</div>
              <div class="orange">$30000</div>
              <div><button class="related-products-btn btn-block"><i class="fa fa-shopping-cart"></i></button></div>
          </div>
      </div>
    </div>
    <div class="clearfix visible-xs"><br></div>
</div>
