<?php // Filter Partial ?>

<?php if( is_product_category( array( 18,19,20,21 ) ) ) { ?>


  <div id="filter">
    
    <?php if( have_rows('cat_filter','option') ): ?>

      <ul>

        <?php while ( have_rows('cat_filter','option') ) : the_row();

          $term = get_sub_field('category','option');
          $termID = get_term($term->term_id, $term->slug);
          $count = $term->count;

          $altTerm = get_sub_field('alt_cat','option');
          $altTermID = get_term($altTerm->term_id, $altTerm->slug);

          if( $term ):

            if ( $count > 0 ) { ?>

              <li><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></li>

            <?php } else { ?>
          
              <li><a href="<?php echo get_term_link( $altTerm ); ?>"><?php the_sub_field('name','option') ?></a></li>
              
            <?php }
          
          endif;

        endwhile; ?>

        <li><a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">View All</a></li>

      </ul>

    <?php endif; ?>

  </div>


<?php } elseif( is_product_category( array( 38,39,40,41 ) ) ) { ?>


  <div id="filter">
    
    <?php if( have_rows('cat_filter','option') ): ?>

      <ul>

        <?php while ( have_rows('cat_filter','option') ) : the_row();

          $term = get_sub_field('category','option');
          $termID = get_term($term->term_id, $term->slug);

          $altTerm = get_sub_field('alt_cat','option');
          $altTermID = get_term($altTerm->term_id, $altTerm->slug);
          $count = $altTerm->count;

          if( $altTerm ):

            if ( $count > 0 ) { ?>

              <li><a href="<?php echo get_term_link( $altTerm ); ?>"><?php the_sub_field('name','option') ?></a></li>              


            <?php } else { ?>
          
              <li><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></li>
              
            <?php }
          
          endif;

        endwhile; ?>

        <li><a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">View All</a></li>

      </ul>

    <?php endif; ?>

  </div>


<?php } ?>