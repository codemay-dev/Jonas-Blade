<?php // Post Single View
get_header(); ?>

  <div id="productPanel" class="col-12">
    <div class="row align-items-center justify-content-center">
      <div id="content" class="col-12 col-xl-11">
        <div class="row align-items-start justify-content-between">
          <div class="col-12 col-md-6 col-lg-8">
            <div class="box description">
              <?php if (have_posts()) : ?>

                <h2 class="pagetitle"><?php the_title(); ?></h2>

                <?php while (have_posts()) : the_post(); ?>

                  <?php the_content(); ?>
                  
                  <p>
                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                      <?php if ($product->get_stock_quantity() > 0) { ?>
                        <span class="price"><?php echo $price_html; ?></span>
                        <a href="<?php bloginfo('siteurl'); ?>/cart/?add-to-cart=<?php echo get_the_id(); ?>" class="btn btn-hollow black">Add to Cart</a>
                      <?php } else { ?>
                        <span class="price">A piece like this would be about <?php echo $price_html; ?></span>
                      <?php } ?>
                    <?php endif; ?>
                  </p>

                <?php endwhile; ?>

              <?php endif; ?>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">

            <?php if( have_rows('right_boxes','option') ):

              while ( have_rows('right_boxes','option') ) : the_row(); ?>
            
                <div class="box order">
                  <h4><?php the_sub_field('title','option') ?></h4>
                  <?php the_sub_field('content','option') ?>
                  <?php if( have_rows('button','option') ): ?>
                    <div class="btns">
                    <?php while ( have_rows('button','option') ) : the_row(); ?>
                      <a href="<?php the_sub_field('link','option') ?>" class="btn btn-<?php the_sub_field('type','option') ?> black"><?php the_sub_field('text','option') ?></a>
                    <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                </div>

              <?php endwhile; ?>

            <?php endif; ?>
          
          </div>
        </div>

        <div class="row">
          <?php $img_id = get_field('zack_bg','option');
          $size = 'large';
          $image = wp_get_attachment_image_src( $img_id, $size ); ?>

          <div id="clicksPanel" class="col-12" style="background-image: url('<?php echo $image[0]; ?>')">
            <div class="row">
              <div class="col-12 offset-md-6 col-md-6 col-lg-6 col-xl-5">
                <h4><?php the_field('zack_intro_text','option') ?></h4>
                <h2><?php the_field('zack_title','option') ?></h2>
                <?php the_field('zack_description','option') ?>
                <div class="button">
                  <a href="<?php the_field('zack_btn_link','option') ?>" class="btn btn-hollow"><?php the_field('zack_btn_text','option') ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row align-items-center justify-content-center">
          <div class="col-12">
            <div class="box">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                  <div class="artist">
                    <h4><?php the_field('bottom_box_title','option') ?></h4>
                    <?php the_field('bottom_box_content','option') ?>
                    <?php if( have_rows('bottom_box_btns','option') ): ?>
                      <div class="btns">
                        <?php while ( have_rows('bottom_box_btns','option') ) : the_row(); ?>
                          <a href="<?php the_sub_field('button_link','option') ?>" class="btn btn-<?php the_sub_field('button_type','option') ?> black"><?php the_sub_field('button_text','option') ?></a>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="artistImg">
                    <img src="<?php the_field('bottom_box_img','option') ?>" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <?php echo do_shortcode('[related_products limit="3" columns="3"]'); ?>
          

<?php get_footer(); ?>