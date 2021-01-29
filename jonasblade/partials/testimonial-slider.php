<?php // Testimonial Slider

$args = array(
  'numberposts'	=> -1,
  'post_type'		=> 'testimonial',
  'orderby' => 'rand'
);

$the_query = new WP_Query( $args ); 

if( $the_query->have_posts() ): ?>

<div id="testSliderWrap" class="container-fluid">
  <div class="row align-items-center justify-content-center">

    <div class="col-0 col-lg-1 p-0">
      <div id="prev" class="chevron left"></div>
    </div>

    <div class="col-12 col-lg-10">

      <div id="testSlider" class="cycle-slideshow"
          data-cycle-fx=scrollHorz
          data-cycle-timeout=8000
          data-cycle-slides="> div"
          data-cycle-pause-on-hover=true
          data-cycle-auto-height=calc
          data-cycle-center-horz=true
          data-cycle-center-vert=true
          data-cycle-prev="#prev"
          data-cycle-next="#next"
          data-cycle-swipe=true
          data-cycle-swipe-fx=scrollHorz
          >

        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
          
          <div id="slide" class="testSlide">
            <?php the_field('testimonial_text') ?>
            <h3>- <?php the_field('testimonial_author') ?></h3>
          </div>

        <?php endwhile; ?>

      </div>

    </div>

    <div class="col-0 col-lg-1 p-0">
      <div id="next" class="chevron right"></div>
    </div>

  </div>
</div>

<?php endif;
wp_reset_postdata();?>