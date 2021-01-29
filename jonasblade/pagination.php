<?php // Pagination for Posts

global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>
  <div class="navigation">
    <?php global $wp_query;
      $big = 999999999; // need an unlikely integer

      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'prev_text'    => __('<i class="fa fa-chevron-left" aria-hidden="true"></i> Prev'),
        'next_text'    => __('Next <i class="fa fa-chevron-right" aria-hidden="true"></i>'),
        'total' => $wp_query->max_num_pages
      ) ); ?>
  </div>
<?php endif; ?>