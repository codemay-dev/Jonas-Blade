<?php if( have_rows('panels') ): ?>
  <div class="contentBorder">
  <div id="contentPanels" class="row justify-content-center">
  <?php $layout_counts = array();

while ( have_rows('panels') ) : the_row();

$layout = get_row_layout();

if( !isset($layout_counts[$layout]) ) {
  $layout_counts[$layout] = 0;
}
$layout_counts[$layout]++;
$class = 'even';

  // Single Layout with full-width content only
  if( get_row_layout() == 'layout_content' ): ?>

    <div id="mainSingle" class="col-12">
      <div class="row panelRow single align-items-center justify-content-center">
        <div class="col-12 col-lg-11 panelBox">
          <?php the_sub_field('panel_content_single'); ?>
        </div>
      </div>
    </div>

  <?php // Layout with content and image split
  elseif( get_row_layout() == 'layout_content_image' ):

      $img_id = get_sub_field('panel_image');
      $size = 'large';
      $image = wp_get_attachment_image_src( $img_id, $size );

    if( get_sub_field('panel_image_position') == true /* Right */ ) { ?>
      <div id="mainSplit" class="col-12 col-lg-11">
        <div class="row panelRow align-items-center justify-content-around">
          <div class="col-12 col-md-6 order-12 order-md-1 panelBox">
            <div class="text">
              <?php the_sub_field('panel_content'); ?>
            </div>
          </div>
          <div class="col-12 col-md-6 order-1 order-md-12 panelImg right">
            <img src="<?php echo $image[0]; ?>" />
          </div>
        </div>
      </div>
    <?php } elseif( get_sub_field('panel_image_position') == false /* Left */ ) { ?>
      <div id="mainSplit" class="col-12 col-lg-11">
        <div class="row panelRow align-items-center justify-content-around">
          <div class="col-12 col-md-6 panelImg left">
            <img src="<?php echo $image[0]; ?>" />
          </div>
          <div class="col-12 col-md-6 panelBox">
            <div class="text">
              <?php the_sub_field('panel_content'); ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

  <?php // Layout with two content columns
  elseif( get_row_layout() == 'layout_content_content' ): ?>

    <div id="mainContent" class="col-12 col-lg-11">
      <div class="row panelRow align-items-center justify-content-around">
        <div class="col-12 col-md-6 panelBox">
          <div class="text">
            <?php the_sub_field('content_left') ?>
          </div>
        </div>
        <div class="col-12 col-md-6 panelBox">
          <div class="text">
            <?php the_sub_field('content_right') ?>
          </div>
        </div>
      </div>
    </div>
  
  <?php // Layout with content and sidebar column
  elseif( get_row_layout() == 'layout_sidebar_content' ): ?>

    <div id="mainSidebar" class="col-12">
      <div class="row mainRow align-items-center justify-content-center">
        <div class="col-12 col-xl-11">
          <div class="row align-items-start justify-content-between">
            
            <div class="col-12<?php if( get_sub_field('main_sidebar') ) { ?> col-md-7 col-xl-8<?php } ?> mainContent">
              <div class="contentBox">
                <?php the_sub_field('main_content') ?>
              </div>
            </div>
            
            <?php if( have_rows('main_sidebar') ) : ?>

              <div class="col-12 col-md-5 col-xl-4 mainSidebar">
              
                <?php while( have_rows('main_sidebar') ) : the_row(); ?>

                  <div class="sidebarBox">
                    <?php if( get_sub_field('title') ) { ?>
                      <h4><?php the_sub_field('title') ?></h4>
                    <?php } ?>
                    <?php the_sub_field('content') ?>
                  </div>

                <?php endwhile; ?>

              </div>

            <?php endif; ?>
            
          </div>
        </div>
      </div>
    </div>

  <?php // Menu Boxes
  elseif( get_row_layout() == 'menu_boxes' ): ?>

    <?php if( have_rows('menu_boxes') ) : ?>

      <div id="menuBoxes" class="col-12 col-xl-11">

        <?php while( have_rows('menu_boxes') ) : the_row();

          $img_left = get_sub_field('image_left');
          $img_right = get_sub_field('image_right');
          $size = 'medium';
          $imageLeft = wp_get_attachment_image_src( $img_left, $size );
          $imageRight = wp_get_attachment_image_src( $img_right, $size );

        if( get_row_layout() == 'half' ): ?>

          <div class="row menuRow half align-items-center justify-content-between no-gutters">
            <div class="col-12 col-md-6 menuBox">
              <div class="linkBox left">
                <a href="<?php the_sub_field('link_left') ?>">
                  <div class="row align-items-center justify-content-center no-gutters" style="background-image:url('<?php echo $imageLeft[0]; ?>');">
                    <div class="darkOverlay"></div>
                    <div class="col-12 text-center">    
                      <h1><?php the_sub_field('title_left'); ?></h1>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-md-6 menuBox">
              <div class="linkBox right">
                <a href="<?php the_sub_field('link_right') ?>">
                  <div class="row align-items-center justify-content-center no-gutters" style="background-image:url('<?php echo $imageRight[0]; ?>');">
                    <div class="darkOverlay"></div>  
                    <div class="col-12 text-center">
                      <h1><?php the_sub_field('title_right'); ?></h1>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        <?php elseif( get_row_layout() == 'small_left' ): ?>

          <div class="row menuRow small-left align-items-center justify-content-between no-gutters">
            <div class="col-12 col-md-4 menuBox">
              <div class="linkBox left">
                <a href="<?php the_sub_field('link_left') ?>">
                  <div class="row align-items-center justify-content-center no-gutters" style="background-image:url('<?php echo $imageLeft[0]; ?>');">
                    <div class="darkOverlay"></div>
                    <div class="col-12 text-center">    
                      <h1><?php the_sub_field('title_left'); ?></h1>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-md-8 menuBox">
              <div class="linkBox right">
                <a href="<?php the_sub_field('link_right') ?>">
                  <div class="row align-items-center justify-content-center no-gutters" style="background-image:url('<?php echo $imageRight[0]; ?>');">
                    <div class="darkOverlay"></div>  
                    <div class="col-12 text-center">
                      <h1><?php the_sub_field('title_right'); ?></h1>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        <?php elseif( get_row_layout() == 'small_right' ): ?>

          <div class="row menuRow small-right align-items-center justify-content-between no-gutters">
            <div class="col-12 col-md-8 menuBox">
              <div class="linkBox left">
                <a href="<?php the_sub_field('link_left') ?>">
                  <div class="row align-items-center justify-content-center no-gutters" style="background-image:url('<?php echo $imageLeft[0]; ?>');">
                    <div class="darkOverlay"></div>
                    <div class="col-12 text-center">    
                      <h1><?php the_sub_field('title_left'); ?></h1>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-md-4 menuBox">
              <div class="linkBox right">
                <a href="<?php the_sub_field('link_right') ?>">
                  <div class="row align-items-center justify-content-center no-gutters" style="background-image:url('<?php echo $imageRight[0]; ?>');">
                    <div class="darkOverlay"></div>  
                    <div class="col-12 text-center">
                      <h1><?php the_sub_field('title_right'); ?></h1>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        
        <?php endif; endwhile; ?>
        
      </div>

    <?php endif; ?>

  <?php // Testimonial Slider
  elseif( get_row_layout() == 'testimonials' ):

    $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
    $term = get_sub_field('testimonial_category', $term_id);

    if( $term ) {
      $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'testimonial',
        'tax_query' => array(
          array(
          'taxonomy' => 'category',
          'terms' => $term,
          'field' => 'term_id'
        )),
        'orderby' => 'rand',
      );
    } else {
      $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'testimonial',
        'orderby' => 'rand',
      );
    }

    $the_query = new WP_Query( $args ); 

    if( $the_query->have_posts() ): ?>

      <div id="testSliderWrap" class="col-12<?php if( get_sub_field('type') == 'light' ) { ?> light<?php } elseif( get_sub_field('type') == 'dark' ) { ?> dark<?php } ?>">
        <div class="row align-items-center justify-content-center">
          <div class="col-12">
            <div class="row align-items-center justify-content-center">
              <div class="col-12">
                <h3 class="title">What our clients are saying</h3>
              </div>
            </div>

            <div class="row align-items-center justify-content-center">
              <div class="col-0 col-lg-1 p-0">
                <div id="testPrev" class="chevron left"></div>
              </div>

              <div class="col-12 col-lg-10">
                <div id="testSlider" class="cycle-slideshow"
                    data-cycle-fx=scrollHorz
                    data-cycle-timeout=30000
                    data-cycle-slides="> div"
                    data-cycle-pause-on-hover=true
                    data-cycle-auto-height=calc
                    data-cycle-center-horz=true
                    data-cycle-center-vert=true
                    data-cycle-prev="#testPrev"
                    data-cycle-next="#testNext"
                    data-cycle-swipe=true
                    data-cycle-swipe-fx=scrollHorz
                    >

                  <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    
                    <div id="slide" class="testSlide">
                      <?php the_field('testimonial_text') ?>
                      <h3 class="author">- <?php the_field('testimonial_author') ?></h3>
                    </div>

                  <?php endwhile; ?>
                </div>
              </div>

              <div class="col-0 col-lg-1 p-0">
                <div id="testNext" class="chevron right"></div>
              </div>
            </div>

          </div>
        </div>
      </div>

    <?php endif;
    wp_reset_postdata();?>

  <?php // FAQ List
  elseif( get_row_layout() == 'faq' ):

    $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
    $term = get_sub_field('faq_category', $term_id); ?>

    <div id="faqPanel" class="col-12 col-lg-11">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-lg-10">
          <h2>Frequently Asked Questions</h2>

          <div id="accordion" role="tablist" aria-multiselectable="true">
          
          <?php
            if( $term ) {
              $args = array(
                'post_type' => 'faq',
                'tax_query' => array(
                  array(
                  'taxonomy' => 'category',
                  'terms' => $term,
                  'field' => 'term_id'
                )),
                'posts_per_page' => -1
              );
            } else {
              $args = array(
                'post_type' => 'faq',
                'posts_per_page' => -1
              );
            }
            $the_query = new WP_Query( $args ); 
            $i = 0; if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); $i++; ?>

            <div class="card">
              <div class="card-header" role="tab" id="heading<?php echo $i ?>">
                <h5>
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" aria-expanded="false" aria-controls="collapse<?php echo $i ?>">
                    <?php the_title(); ?>
                    <div class="dirLines">
                      <span class="line1"></span>
                      <span class="line2"></span>
                    </div>
                  </a>
                </h5>
              </div>
              <div id="collapse<?php echo $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i ?>">
                <div class="card-body panel-body">
                  <?php the_content(); ?>
                  <br class="clear" />
                  <button class="btn btn-hollow black d-block d-md-none" style="float:right;margin-bottom:15px;" onclick="$('#collapseOne').collapse('toggle');">Close</button>
                </div>
              </div>
            </div>

          <?php endwhile; endif; wp_reset_postdata(); ?>

          </div>
        </div>
      </div>
    </div>

  <?php // Feature Panel
  elseif( get_row_layout() == 'feature_panel' ):

    $totalrows = count( get_sub_field('feature_boxes') );

    if( have_rows('feature_boxes') ): $rownum = 1; 
      $img_id = get_sub_field('bg_image');
      $size = 'medium';
      $image = wp_get_attachment_image_src( $img_id, $size ); ?>

      <div id="featurePanel" class="panelWrap col-12">
        <div class="row">

          <?php while ( have_rows('feature_boxes') ) : the_row(); ?>

            <?php if( get_sub_field('bg_image') ) { ?>
              <?php if( $totalrows == 4 ) { ?>
                <div class="col-12 col-sm-6 col-xl featureBox row<?php echo $rownum; ?> total<?php echo $totalrows; ?>" style="background-image: url('<?php echo $image[0]; ?>');">
              <?php } else { ?>
                <div class="col-12 col-md featureBox row<?php echo $rownum; ?> total<?php echo $totalrows; ?>" style="background-image: url('<?php echo $image[0]; ?>');">
              <?php } ?>
                <div class="darkOverlay"></div>
                <h2 class="title"><?php the_sub_field('box_title') ?></h2>
                <?php the_sub_field('box_content') ?>
                <a href="<?php the_sub_field('box_btn_link') ?>"><?php the_sub_field('box_btn_text') ?></a>
              </div>
            <?php } ?>
            
          <?php $rownum++; endwhile; ?>
          
        </div>
      </div>

    <?php endif; ?>

  <?php // Content Boxes
  elseif( get_row_layout() == 'content_boxes' ): 

    if( have_rows('content_boxes') ) : ?>

      <div id="contentBoxes" class="col-12 col-lg-11">

        <?php while( have_rows('content_boxes') ) : the_row();

          $img_left = get_sub_field('left_image');
          $img_right = get_sub_field('right_image');
          $size = 'medium';
          $imageLeft = wp_get_attachment_image_src( $img_left, $size );
          $imageRight = wp_get_attachment_image_src( $img_right, $size );

        if( get_row_layout() == 'one_left' ): ?>

          <div class="row boxRow">
            <div class="col-12 col-md-6 contentBox">
              <div class="oneLeft">
                <img src="<?php echo $imageLeft[0]; ?>" />
                <div class="inside">
                  <h3><?php the_sub_field('left_title') ?></h3>
                  <?php the_sub_field('left_content') ?>
                  <a href="<?php the_sub_field('left_button_link') ?>" class="btn btn-hollow black"><?php the_sub_field('left_button_text') ?></a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 contentBox">
              <div class="twoRight row no-gutters">
                <div class="col-12 inside align-self-start">
                  <h3><?php the_sub_field('right_top_title') ?></h3>
                  <?php the_sub_field('right_top_content') ?>
                  <a href="<?php the_sub_field('right_top_button_link') ?>" class="btn btn-hollow black"><?php the_sub_field('right_top_button_text') ?></a>
                </div>
                <div class="col-12 inside align-self-end">
                  <h3><?php the_sub_field('right_bottom_title') ?></h3>
                  <?php the_sub_field('right_bottom_content') ?>
                  <a href="<?php the_sub_field('right_bottom_button_link') ?>" class="btn btn-hollow black"><?php the_sub_field('right_bottom_button_text') ?></a>
                </div>
              </div>
            </div>
          </div>

        <?php elseif( get_row_layout() == 'one_right' ): ?>

          <div class="row boxRow">
            <div class="col-12 col-md-6 contentBox">
              <div class="twoLeft row no-gutters">
                <div class="col-12 inside align-self-start">
                  <h3><?php the_sub_field('left_top_title') ?></h3>
                  <?php the_sub_field('left_top_content') ?>
                  <a href="<?php the_sub_field('left_top_button_link') ?>" class="btn btn-hollow black"><?php the_sub_field('left_top_button_text') ?></a>
                </div>
                <div class="col-12 inside align-self-end">
                  <h3><?php the_sub_field('left_bottom_title') ?></h3>
                  <?php the_sub_field('left_bottom_content') ?>
                  <a href="<?php the_sub_field('left_bottom_button_link') ?>" class="btn btn-hollow black"><?php the_sub_field('left_bottom_button_text') ?></a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 contentBox">
              <div class="oneRight">
                <img src="<?php echo $imageRight[0]; ?>" />
                <div class="inside">
                  <h3><?php the_sub_field('right_title') ?></h3>
                  <?php the_sub_field('right_content') ?>
                  <a href="<?php the_sub_field('right_button_link') ?>" class="btn btn-hollow black"><?php the_sub_field('right_button_text') ?></a>
                </div>
              </div>
            </div>
          </div>
        
        <?php endif; endwhile; ?>
        
      </div>

    <?php endif; ?>



  <?php // Content Columns
  elseif( get_row_layout() == 'content_columns' ): 

    if( have_rows('columns') ) : ?>

      <div id="contentColumns" class="col-12 col-lg-11">

        <?php while( have_rows('columns') ) : the_row();

          if( get_row_layout() == 'one_column' ): ?>

            <div class="row columnRow">

            <?php if( have_rows('boxes') ): ?>

              <?php while( have_rows('boxes') ) : the_row();

                $img_id = get_sub_field('image');
                $size = 'medium';
                $image = wp_get_attachment_image_src( $img_id, $size ); ?>

                <div class="col-12 contentBox <?php the_sub_field('alignment') ?>">
                  <?php if( get_sub_field('image') ) { ?>
                    <img src="<?php echo $image[0]; ?>" />
                  <?php } ?>
                  <div class="inside">
                    <?php the_sub_field('content') ?>
                    
                    <?php if( have_rows('button') ): while( have_rows('button') ): the_row(); ?>
                      <a href="<?php the_sub_field('link') ?>" class="btn btn-<?php the_sub_field('style') ?> black"><?php the_sub_field('text') ?></a>
                    <?php endwhile; endif; ?>
                  </div>
                </div>

              <?php endwhile; ?>

            <?php endif; ?>

            </div>

          <?php elseif( get_row_layout() == 'two_column' ): ?>

            <div class="row columnRow">

              <div class="col-12 col-md-6">
                <div class="row">

                  <?php if( have_rows('boxes_left') ): while( have_rows('boxes_left') ) : the_row();

                    $img_id = get_sub_field('image');
                    $size = 'medium';
                    $image = wp_get_attachment_image_src( $img_id, $size ); ?>

                    <div class="col-12 contentBox <?php the_sub_field('alignment') ?>">
                      <?php if( get_sub_field('image') ) { ?>
                        <img src="<?php echo $image[0]; ?>" />
                      <?php } ?>
                      <div class="inside">
                        <?php the_sub_field('content') ?>
                        
                        <?php if( have_rows('button') ): while( have_rows('button') ): the_row(); ?>
                          <a href="<?php the_sub_field('link') ?>" class="btn btn-<?php the_sub_field('style') ?> black"><?php the_sub_field('text') ?></a>
                        <?php endwhile; endif; ?>
                      </div>
                    </div>

                  <?php endwhile; endif; ?>

                </div>
              </div>

              <div class="col-12 col-md-6">
                <div class="row">

                  <?php if( have_rows('boxes_right') ): while( have_rows('boxes_right') ) : the_row();

                    $img_id = get_sub_field('image');
                    $size = 'medium';
                    $image = wp_get_attachment_image_src( $img_id, $size ); ?>

                    <div class="col-12 contentBox <?php the_sub_field('alignment') ?>">
                      <?php if( get_sub_field('image') ) { ?>
                        <img src="<?php echo $image[0]; ?>" />
                      <?php } ?>
                      <div class="inside">
                        <?php the_sub_field('content') ?>
                        
                        <?php if( have_rows('button') ): while( have_rows('button') ): the_row(); ?>
                          <a href="<?php the_sub_field('link') ?>" class="btn btn-<?php the_sub_field('style') ?> black"><?php the_sub_field('text') ?></a>
                        <?php endwhile; endif; ?>
                      </div>
                    </div>

                  <?php endwhile; endif; ?>

                </div>
              </div>

            </div>
        
          <?php endif; 
        
        endwhile; ?>
        
      </div>

    <?php endif; ?>



  <?php // Clicks Panel
  elseif( get_row_layout() == 'clicks' ): 

    $img_id = get_field('zack_bg','option');
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

  <?php // Buttons Panel
  elseif( get_row_layout() == 'buttons' ): ?>

    <div id="buttonPanel" class="col-12">
      <div class="row">

        <?php if( have_rows('buttons') ): ?>

        <?php while ( have_rows('buttons') ) : the_row(); ?>

          <div class="col-12 col-md bigBtn<?php if( get_sub_field('button_type') == 'gold' ) { ?> gold<?php } elseif( get_sub_field('button_type') == 'black') { ?> black<?php } ?>">          
            <a href="<?php the_sub_field('button_link') ?>">
              <div class="row align-items-center">
                <div class="col-12">
                  <?php the_sub_field('button_text') ?> <i class="fa fa-caret-right" aria-hidden="true"></i>
                </div>
              </div>
            </a>
          </div>

        <?php endwhile; endif; ?>

      </div>
    </div>

  <?php // Gallery
  elseif( get_row_layout() == 'gallery' ):
    
    $images = get_sub_field('gallery_images');
    if( $images ): ?>

      <div id="galleryWrap" class="imgList row align-items-center justify-content-center">

        <?php $i=1; foreach( $images as $image ) { ?>

        <div class="galleryImg col-12 col-sm-auto"><a href="<?php echo $image['sizes']['large']; ?>" rel="lightbox"><img src="<?php echo $image['sizes']['medium']; ?>" /></a></div>
      
        <?php if( $i++ == 12 ) break; } ?>
      
      </div>

    <?php endif; ?>



  
  <?php /* End of Panels */ endif; endwhile; ?>

  </div>
  </div>

  <?php else :

// no layouts found

endif; ?>