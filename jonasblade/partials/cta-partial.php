<?php /*** CTA Panel ***/ ?>

<?php if( get_field('cta_boxes','option') ) { 
  $totalrows = count( get_sub_field('cta_boxes','option') );
}

if( have_rows('cta_boxes','option') ): $rownum = 1; ?>

<div id="ctaWrap" class="row align-items-center justify-content-center">

    <?php while ( have_rows('cta_boxes','option') ) : the_row(); ?>

      <?php if( get_sub_field('bg_image','option') ) {
        $attachment_id = get_sub_field('bg_image','option');
        $size = 'medium';
        $image = wp_get_attachment_image_src( $attachment_id, $size );
        
        if( get_field('cta_boxes','option') ) {
          if( $totalrows == 4 ) { ?>
            <div id="ctaPanel" class="col-12 col-sm-6 col-xl row<?php echo $rownum; ?> total<?php echo $totalrows; ?>" style="background-image: url('<?php echo $image[0]; ?>');">
          <?php } else { ?>
            <div id="ctaPanel" class="col-12 col-lg row<?php echo $rownum; ?> total<?php echo $totalrows; ?>" style="background-image: url('<?php echo $image[0]; ?>');">
          <?php } 
        } else { ?>
          <div id="ctaPanel" class="col-12 col-sm-6 col-xl row<?php echo $rownum; ?>" style="background-image: url('<?php echo $image[0]; ?>');">
        <?php } ?>

            <div class="darkOverlay"></div>

            <div class="row align-items-center justify-content-center no-gutters">
              <div class="ctaBox col-12 col-md-9">

                <h2 class="title"><?php the_sub_field('box_title','option') ?></h2>
                <?php the_sub_field('box_content','option') ?>
                <a href="<?php the_sub_field('box_btn_link','option') ?>" class="btn btn-hollow"><?php the_sub_field('box_btn_text','option') ?></a>
        
              </div>
            </div>

          </div>
      <?php } ?>
      
    <?php $rownum++; endwhile; ?>

</div>

<?php endif; ?>