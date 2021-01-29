<?php /*** Collections Panel ***/ ?>

<?php if( have_rows('collection_boxes') ): ?>

  <div id="collections" class="row align-items-center justify-content-center no-gutters">
    <div class="col-12 col-md-11">
      <div class="row align-items-center justify-content-between">

        <?php while ( have_rows('collection_boxes') ) : the_row();

          $term = get_sub_field('collection');
          $termID = get_term($term->term_id, $term->slug);
          $count = $term->count;

          $altTerm = get_sub_field('alt_link');
          $altTermID = get_term($altTerm->term_id, $altTerm->slug);

          if( $term ):

            if ( $count > 0 ) { ?>

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
                      <a href="<?php echo get_term_link( $term ); ?>" class="btn btn-hollow black">View Collection</a>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
            </div>

            <?php } else { ?>
          
            <div class="col-12 col-md-6">
              <div class="row align-items-center no-gutters">
                <div class="col-12 box">
                  <a href="<?php echo get_term_link( $altTerm ); ?>">
                    <img src="<?php the_sub_field('image') ?>" />
                  </a>
                  <div class="row align-items-center justify-content-between inside">
                    <div class="col-12 col-lg-auto">
                    <h3><?php echo $term->name; ?></h3>
                    </div>
                    <div class="col-12 col-lg-auto">
                      <a href="<?php echo get_term_link( $altTerm ); ?>" class="btn btn-hollow black">View Collection</a>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
            </div>

            <?php }
          
          endif;

        endwhile; ?>

      </div>
      <div class="row align-items-center justify-content-center">
        <div class="col-12 btn-row">
          <a href="<?php bloginfo('siteurl'); ?>/shop" class="btn btn-hollow black">View All</a>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>