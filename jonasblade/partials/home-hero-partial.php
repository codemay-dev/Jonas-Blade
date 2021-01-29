<?php // Home Hero ?>


<?php if( have_rows('hero_slides') ) { ?>

  <div id="hero" class="col-12 panelWrap <?php if( get_field('hero_type') == 'full' ) { ?> full<?php } elseif( get_field('hero_type') == 'standard') { ?> standard<?php } ?>">

    <div id="prev" class="chevron left"></div>

    <div id="heroSlider" class="row">

    <?php while ( have_rows('hero_slides') ) : the_row(); ?>

      <?php if( get_sub_field('slide_type') == 'image' ) { ?>
        <div id="slideWrap" class="col-12 p-0 imageSlide<?php if( get_sub_field('overlay_type') == 'light' ) { ?> light<?php } elseif( get_sub_field('overlay_type') == 'dark' ) { ?> dark<?php } ?>">
      <?php } elseif( get_sub_field('slide_type') == 'video' ) { ?>
        <div id="slideWrap" class="col-12 p-0 videoSlide<?php if( get_sub_field('overlay_type') == 'light' ) { ?> light<?php } elseif( get_sub_field('overlay_type') == 'dark' ) { ?> dark<?php } ?>">
          <div class="video-responsive">
            <?php if( get_sub_field('video_mobile') ) { ?>
              <video id="video" class="desktopVid" preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
                <source src="<?php the_sub_field('video') ?>" type="video/mp4" >
              </video>
              <video id="video" class="mobileVid" preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
                <source src="<?php the_sub_field('video_mobile') ?>" type="video/mp4">
              </video>
            <?php } else { ?>
              <video id="video" preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
                <source src="<?php the_sub_field('video') ?>" type="video/mp4">
              </video>
            <?php } ?>
          </div>
      <?php } ?>

        <?php if( get_sub_field('overlay_type') == 'light' ) { ?>
          <div class="lightOverlay" style="background: rgba(255,255,255,<?php the_sub_field('overlay_opacity') ?>);"></div>
        <?php } elseif( get_sub_field('overlay_type') == 'dark' ) { ?>
          <div class="darkOverlay" style="background: rgba(36,34,33,<?php the_sub_field('overlay_opacity') ?>);"></div>
        <?php } ?>

        <div class="heroContent row align-items-center justify-content-center <?php if( get_sub_field('overlay_type') == 'light' ) { ?>light<?php } elseif( get_sub_field('overlay_type') == 'dark' ) { ?>dark<?php } ?>">
          
          <?php if( have_rows('content') ): $rownum = 1; ?>

            <?php while( have_rows('content') ) : the_row(); ?>

              <div class="col-12 col-md-6 box num<?php echo $rownum; ?>">
                <?php if( get_sub_field('title') ) { ?>
                  <h1 class="title"><?php the_sub_field('title') ?></h3>
                <?php } ?>
                <?php if( get_sub_field('description') ) { ?>
                  <div class="heroText"><?php the_sub_field('description') ?></div>
                <?php }

                if( have_rows('buttons') ) { ?>

                  <div class="heroBtns">

                    <?php while( have_rows('buttons') ) : the_row(); ?>

                      <a href="<?php the_sub_field('link') ?>" class="btn btn-<?php the_sub_field('type') ?>"><?php the_sub_field('text') ?></a>

                    <?php endwhile; ?>

                  </div>

                <?php } ?>

              </div>

            <?php $rownum++; endwhile; ?>
          
          <?php endif; ?>

        </div>

      </div>

    <?php endwhile; ?>

    </div>

    <div id="next" class="chevron right"></div>

  </div>

<?php } ?>