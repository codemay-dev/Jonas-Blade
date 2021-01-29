<?php /*** Portfolios Panel ***/ ?>

<?php if( have_rows('portfolio_boxes') ): ?>

  <div id="portfolios" class="row align-items-center justify-content-center no-gutters">
    <div class="col-12 col-md-11">
      <div class="row align-items-center justify-content-between">

        <?php while ( have_rows('portfolio_boxes') ) : the_row(); 
        
          $term = get_sub_field('portfolio');
          $termID = get_term($term->term_id, $term->slug);
          $count = $term->count;
          
          if( $term ): ?>

            <div class="col-12 col-md-6">
              <div class="row align-items-center no-gutters">
                <div class="col-12 box">
                  <a href="<?php echo get_term_link( $term ); ?>">
                    <img src="<?php the_sub_field('image') ?>" />
                  </a>
                  <div class="row align-items-center justify-content-between inside">
                    <div class="col-12 col-lg-auto">
                      <h3><?php echo $term->name; ?></h3>
                    </div>
                    <div class="col-12 col-lg-auto">
                      <a href="<?php echo get_term_link( $term ); ?>" class="btn btn-hollow black">View Portfolio</a>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
            </div>

          <?php endif;

        endwhile; ?>

      </div>
    </div>
  </div>

<?php endif; ?>