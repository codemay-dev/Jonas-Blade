<?php // Header File ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<?php locate_template('head-content.php', true); ?>

<body <?php body_class(); ?>>
<script>
  fbq('track', 'Purchase', {
    value: 1,
  });
</script>

<div id="wrap" class="container-fluid">
  <div class="headerBorder">
  <header class="row justify-content-center">
    <div id="topBar" class="fadeOff">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-11">
          <div class="row align-items-center justify-content-between">
            <div class="col-2 col-md-4 col-lg-4 menu mobile">
              <nav class="navbar">
                <?php locate_template('menus/mobile-menu.php', true); ?>
              </nav>
            </div>
            <div class="col-auto logo">
              <a href="<?php echo get_option('home'); ?>/">
                <img src="<?php the_field('header_logo_light','option') ?>" class="lightLogo" />
                <img src="<?php the_field('header_logo_dark','option') ?>" class="darkLogo" />
              </a>
            </div>
            <div class="col-2 col-md-4 col-lg-4 shopLinks">
              <?php if ( WC()->cart->get_cart_contents_count() == 0 ) { ?>
              
              <?php } else { ?>
                <div class="cartIcon">
                  <a href="<?php bloginfo('siteurl'); ?>/cart"><span class="text">Cart </span><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </div>
              <?php } ?>
              <ul class="socialIcons">
                <?php if( get_field('facebook_link','option') ) { ?>
                  <li><a href="<?php the_field('facebook_link','option') ?>" target="_new"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <?php } if( get_field('instagram_link','option') ) { ?>
                  <li><a href="<?php the_field('instagram_link','option') ?>" target="_new"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if( is_front_page() ) {
      locate_template('partials/home-hero-partial.php', true);
    } elseif( is_product_category() ) {
      locate_template('partials/prodcat-hero-partial.php', true);
    } elseif( is_product() ) {
      locate_template('partials/product-hero-partial.php', true);
    } elseif( is_single() || is_search() || is_home() ) {
      locate_template('partials/hero-other-partial.php', true);
    } else {
      locate_template('partials/hero-partial.php', true);
    } ?>
  </header>

  <?php if( is_shop() || is_product_category() ) {
    locate_template('partials/filter-partial.php', true);
  } ?>
  </div>