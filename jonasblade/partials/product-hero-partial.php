<?php // Product Hero ?>

<div id="hero" class="col-12 panelWrap full">

  <div id="prev" class="chevron left"></div>

  <div id="productSlider" class="row">

    <?php while ( have_posts() ) : the_post();
    
      global $product;
      $attachment_ids = $product->get_gallery_attachment_ids();

      if($attachment_ids) {
        foreach( $attachment_ids as $attachment_id ) { ?>

          <a href="<?php echo $image_link = wp_get_attachment_url( $attachment_id ) ?>" rel="lightbox"><img src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ) ?>" /></a>
        
        <?php }
      } else {

        $img_id = get_field('default_product_image','option');
        $size = 'large';
        $image = wp_get_attachment_image_src( $img_id, $size ); ?>

        <a href="<?php echo $image[0]; ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" /></a>

      <?php }
    
    endwhile; ?>

  </div>

  <div id="next" class="chevron right"></div>

</div>