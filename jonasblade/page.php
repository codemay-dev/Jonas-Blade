<?php // Default Page Template
get_header(); ?>

  <?php if( is_product_category() ) {
    locate_template('partials/portfolio-btn-partial.php', true);
  } ?>

  <?php if( is_page('collections') ) {
    locate_template('partials/collections-partial.php', true);
  } ?>

  <?php if( is_page('portfolios') ) {
    locate_template('partials/portfolios-partial.php', true);
  } ?>

  <?php if( is_product_category() ) { ?>
    
    <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

      <?php the_content(); ?>

    <?php endwhile; ?>

      <?php include (TEMPLATEPATH . '/pagination.php'); ?>

    <?php endif;
  } ?>

  <?php if( is_cart() || is_checkout() || is_account_page() ) {
    if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
      
      <div class="row align-items-center justify-content-center">
        <div id="cartWrap" class="col-12 col-xl-11">
          <?php the_content(); ?>
        </div>
      </div>

    <?php endwhile; ?>

    <?php endif;
  } ?>

  <?php locate_template('partials/contentpanels-partial.php', true); ?>

<?php get_footer(); ?>