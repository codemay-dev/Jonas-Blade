<?php // Styles for the <head> ?>

<style>

  <?php if( have_rows('hero_slides') ) { ?>

    <?php while ( have_rows('hero_slides') ) : the_row(); ?>

      <?php if( get_sub_field('slide_type') == 'image' ) {
        if( get_sub_field('image_mobile') ) { ?>
          #slideWrap {
            background-image: url('<?php the_sub_field('image') ?>');
          }
          @media(max-width:575.98px) {
            #slideWrap {
              background-image: url('<?php the_sub_field('image_mobile') ?>');
            }
          }

        <?php }
      }

      if( get_sub_field('show_border') == true ) { ?>

        .home .heroContent .box.num2 {
          border-left: 1px solid #777;
        }

      <?php }

      if( get_sub_field('overlay_type') == 'none' ) { ?>
        
        #hero .lightOverlay,
        #hero .darkOverlay {
          display: none !important;
        }

      <?php } ?>      

    <?php endwhile; ?>

  <?php } ?>


  <?php if( get_field('overlay_type') == 'none' ) { ?>
  
    #hero .lightOverlay,
    #hero .darkOverlay {
      display: none !important;
    }

  <?php } ?>


  <?php if( get_field('hero_type') == 'image' ) {
    
    if( get_field('hero_image_mobile') ) { ?>

      #hero.inner {
        background-image: url('<?php the_field('hero_image') ?>');
      }

      @media(max-width:767px) {
        #hero.inner {
          background-image: url('<?php the_field('hero_image_mobile') ?>');
        }
      }

    <?php } elseif( get_field('hero_image') ) { ?>

      #hero.inner {
        background-image: url('<?php the_field('hero_image') ?>');
      }

    <?php }

  } ?>



  <?php if( is_product_category() ) { ?>

    #wrap .woocommerce {
      background: #f7f6f6;
      margin-left: -15px;
      margin-right: -15px;
      padding-top: 30px;
    }

    .woocommerce .products ul, .woocommerce ul.products {
      width: 91.666667%;
      margin: 0 auto !important;
    }

  <?php } ?>




  <?php if( get_field('overlay_type') == 'dark' ) { ?>
  
    #topBar.fadeOff .logo img.lightLogo {
      opacity: 0;
    }
    #topBar.fadeOff .logo img.darkLogo {
      opacity: 1;
    }
    #topBar.fadeOff .menu a {
      color: #fff !important;
      transition: all 0.5s ease-out;
    }
    #topBar.fadeOff .menu .navbar-collapse.show a {
      color: #000 !important;
    }
    #topBar.fadeOff .menu.desktop li.my-account a {
      border-color: #fff !important;
    }
    .navbar-toggler span {
      background-color: #fff !important;
      transition: all 0.5s ease-out;
    }
    #topBar.fadeOn .navbar-toggler span,
    .navbar-toggler.close span {
      background-color: #000 !important;
    }
  
  <?php } ?>

</style>