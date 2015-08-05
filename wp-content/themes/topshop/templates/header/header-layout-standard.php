<div class="site-container">
    
    <div class="site-header-left">
        
        <?php if( get_header_image() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" /></a>
        <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        <?php endif; ?>
        
    </div><!-- .site-branding -->
    
    <div class="site-header-right">
				
				<?php 
				if ( is_user_logged_in() ){
					?>
					<div class="site-header-right-link"><a href="" title=""</a></div>
	                <div class="site-header-right-link"><a href="/mi-cuenta" title="">Mi Cuenta</a></div>
		            <div class="header-cart">
		                <a class="header-cart-contents" href="/mi-carrito" title="">
		                    <span class="header-cart-amount">
		                    </span>
		                    <span class="header-cart-checkout">
		                        <span>Items (0)</span> <i class="fa fa-shopping-cart"></i>
		                    </span>
		                </a>
		            </div>
		            <div class="site-header-right-link"><a href="" title=""</a></div>
		            <div class="site-header-right-link"><a href="<?php echo wp_logout_url("http://www.importadoraseverino.com/"); ?>">Salir</a></div>
					<?
				}else{
					?>
					<div class="site-header-right-link"><a href="" title=""</a></div>
	                <div class="site-header-right-link"><a href="/login" title="">Iniciar Sesion</a></div>
	                <div class="site-header-right-link"><a href="/registrarse" title="">Registrarse</a></div>
					<?
				}
				 ?>
                
            
    </div>
    <div class="clearboth"></div>
    
</div>

<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'topshop-sticky-header', false ) ) ? ' header-stick' : ''; ?>" role="navigation">
    
    <div class="site-container">
        
        <button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'topshop' ); ?></button>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        
    </div>
    
</nav><!-- #site-navigation -->