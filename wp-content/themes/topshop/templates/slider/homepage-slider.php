<?php
if ( get_theme_mod( 'topshop-slider-type', false ) == 'topshop-no-slider' ) : ?>
    <!-- No Slider -->
<?php
elseif ( get_theme_mod( 'topshop-slider-type', false ) == 'topshop-meta-slider' ) : ?>
    <?php
    $slider_code = '';
    if ( get_theme_mod( 'topshop-meta-slider-shortcode', false ) ) {
        $slider_code = get_theme_mod( 'topshop-meta-slider-shortcode' );
    } ?>
    <?php echo do_shortcode( esc_html( $slider_code ) ); ?>
<?php else : ?>
    <?php
    $slider_cats = '';
    if ( get_theme_mod( 'topshop-slider-cats', false ) ) {
        $slider_cats = get_theme_mod( 'topshop-slider-cats' );
    } ?>
    <?php if( $slider_cats ) : ?>
        <?php $slider_query = new WP_Query( 'cat=' . esc_html( $slider_cats ) . '&posts_per_page=-1&orderby=date&order=DESC' ); ?>
        <?php if ( $slider_query->have_posts() ) : ?>
          <div class="home_slick">
            <?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
                <div class="image_style">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?>
                    <?php endif; ?>
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                </div>
            <?php endwhile; ?>
          </div>
    <?php endif; wp_reset_query(); ?>
    <?php else : ?>
        <div class="home_slick">
              <div class="image_style">
                  <img src="<?php echo get_template_directory_uri() ?>/images/demo/car.png" alt="<?php esc_attr_e('Demo Slide One', 'topshop') ?>" />
              </div>
              <div class="image_style">
                  <img src="<?php echo get_template_directory_uri() ?>/images/demo/car2.png" alt="<?php esc_attr_e('Demo Slide Two', 'topshop') ?>" />
              </div>
              <div class="image_style">
                  <img src="<?php echo get_template_directory_uri() ?>/images/demo/car.png" alt="<?php esc_attr_e('Demo Slide One', 'topshop') ?>" />
              </div>
              <div class="image_style">
                  <img src="<?php echo get_template_directory_uri() ?>/images/demo/car1.png" alt="<?php esc_attr_e('Demo Slide One', 'topshop') ?>" />
              </div>
        </div>
    <?php endif; ?>

<?php endif; ?>
