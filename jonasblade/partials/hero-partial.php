<?php // Hero ?>

<div id="hero" class="col-12 p-0 panelWrap inner">

  <?php if( get_field('hero_type') == 'video' ) { ?>
    <div class="video-responsive">
      <?php if( get_field('hero_video_mobile') ) { ?>
        <video id="video" class="desktopVid" autoplay loop preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
          <source src="<?php the_field('hero_video') ?>" type="video/mp4" >
        </video>
        <video id="video" class="mobileVid" autoplay loop preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
          <source src="<?php the_field('hero_video_mobile') ?>" type="video/mp4">
        </video>
      <?php } else { ?>
        <video id="video" autoplay loop preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
          <source src="<?php the_field('hero_video') ?>" type="video/mp4">
        </video>
      <?php } ?>
    </div>
  <?php } ?>

  <?php if( get_field('overlay_type') == 'light' ) { ?>
    <div class="lightOverlay" style="background: rgba(255,255,255,<?php the_field('overlay_opacity') ?>);"></div>
  <?php } elseif( get_field('overlay_type') == 'dark' ) { ?>
    <div class="darkOverlay" style="background: rgba(36,34,33,<?php the_field('overlay_opacity') ?>);"></div>
  <?php } ?>

  <div class="heroContent row align-items-center justify-content-center <?php if( get_field('overlay_type') == 'light' ) { ?>light<?php } elseif( get_field('overlay_type') == 'dark' ) { ?>dark<?php } ?>">
    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
      <?php if( get_field('hero_content') ) { ?>
        <div class="heroText"><?php the_field('hero_content') ?></div>
      <?php } else { ?>
        <div class="heroText text-center"><h1><?php the_title(); ?></h1></div>
      <?php }

      if( have_rows('hero_buttons') ) { ?>

        <div class="heroBtns">

          <?php while( have_rows('hero_buttons') ) : the_row(); ?>

            <a href="<?php the_sub_field('link') ?>" class="btn btn-<?php the_sub_field('type') ?>"><?php the_sub_field('text') ?></a>

          <?php endwhile; ?>

        </div>

      <?php } ?>
    </div>
  </div>

</div>