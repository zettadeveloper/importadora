<?php
/**
 * The template for displaying search forms in TopShop
 *
 */
?>
<form role="search" method="get" class="search-form test has-feedback" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-field " placeholder="<?php echo esc_attr_x( 'Buscar&hellip;', 'placeholder', 'topshop' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'topshop' ); ?>" style="height: 23px;width:97%;"/>
		<div style="width: 32px;height: 31px;background-color: #F94304;float: left;padding: 3px 6px;border-radius: 0px 3px 3px 0px;position:absolute;right:-2px;top:0;">
			<img src="http://www.importadoraseverino.com/wp-content/themes/topshop/images/lupa.png" alt="lupa" title="lupa" style="width: 100%;height: 100%;">
		</div>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( '&nbsp;', 'submit button', 'topshop' ); ?>" />
</form>
<div class="clearboth"></div>
