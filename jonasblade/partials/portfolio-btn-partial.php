<?php // Portfolio Btn Partial

if( is_product_category( array( 18,19,20,21 ) ) ) {

  $term = get_field('portfolio_link');
  $termID = get_term($term->term_id, $term->slug);
  $count = $term->count;

  if( $term ): 
  
    if ( $count > 0 ) { ?>

    <div id="portfolio-btn">
      <a href="<?php echo get_term_link( $term ); ?>" class="btn btn-hollow black">View Portfolio</a>
    </div>

    <?php }
    
  endif;

} elseif( is_product_category( array( 38,39,40,41 ) ) ) {

  $term = get_field('portfolio_link');
  $termID = get_term($term->term_id, $term->slug);
  $count = $term->count;

  if( $term ): 
  
    if ( $count > 0 ) { ?>

    <div id="portfolio-btn">
      <a href="<?php echo get_term_link( $term ); ?>" class="btn btn-hollow black">View For Sale</a>
    </div>

    <?php }
    
  endif;

}