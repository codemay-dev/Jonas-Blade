<?php // Hero ?>

<?php
  global $wp_query;
  $cat = $wp_query->get_queried_object();
  $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
  $image = wp_get_attachment_url( $thumbnail_id ); 
?>

<div id="hero" class="col-12 p-0 panelWrap inner" style="background-image:url('<?php echo $image ?>');">

  <?php if( get_field('overlay_type',261) == 'light' ) { ?>
    <div class="lightOverlay" style="background: rgba(255,255,255,<?php the_field('overlay_opacity',261) ?>);"></div>
  <?php } elseif( get_field('overlay_type',261) == 'dark' ) { ?>
    <div class="darkOverlay" style="background: rgba(36,34,33,<?php the_field('overlay_opacity',261) ?>);"></div>
  <?php } ?>

  <div class="heroContent row align-items-center justify-content-center <?php if( get_field('overlay_type',261) == 'light' ) { ?>light<?php } elseif( get_field('overlay_type',261) == 'dark' ) { ?>dark<?php } ?>">
    <div class="col-12 col-md-9 col-lg-6 col-xl-5">
      
      <div class="heroText text-center">
        <h1><?php the_title(); ?></h1>
        <div class="heroBtns">
          <?php $term = get_field('portfolio_link');
                $count = $term->count;

          if( $term ): 
          
            if ( $count > 0 ) { ?>

              <a href="<?php echo get_term_link( $term ); ?>" class="btn btn-hollow"><?php the_field('button_text') ?></a>

            <?php }
          
          endif; ?>
        </div>
      </div>

    </div>
  </div>

</div>