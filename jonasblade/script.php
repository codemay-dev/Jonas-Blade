<?php // JavaScript Code ?>


<?php if( is_front_page() ) { ?>

  <script>
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $(document).ready(function() {
        $winHeight = window.innerHeight - 30;
        $('.home #hero.full #heroSlider').css('height',$winHeight);
      });
    } else {
      $(document).ready(function() {
        $winHeight = window.innerHeight - 30;
        $('.home #hero.full #heroSlider').css('height',$winHeight);
      });
      $(window).resize(function() {
        $winHeight = window.innerHeight - 30;
        $('.home #hero.full #heroSlider').css('height',$winHeight);
      });
    }
  </script>

  <script>
    $(document).ready(function() {

      $('#heroSlider').cycle({
        fx: "scrollHorz",
        timeout: 15000,
        speed: 500,
        slides: "> div",
        prev: "#prev",
        next: "#next",
        swipe: true,
        hideNonActive: true,
        slideActiveClass: "active",
        allowWrap: true
      });

      if ( $('#heroSlider').children().length == 1 )
        $('#prev,#next').hide();
      
      $('#slideWrap:first-of-type').addClass('firstSlide');

      // Play first slide if video and pause slider
      $('#heroSlider').on('cycle-initialized', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        if( $('.firstSlide').hasClass('videoSlide') ) {
          $('#heroSlider').cycle('pause');
        }
        if( $('.firstSlide').hasClass('light') ) {
          $('body').removeClass('dark');
          $('body').addClass('light');
        } else {
          $('body').removeClass('light');
          $('body').addClass('dark');
        }
      });

      if( document.getElementById('video') ) {
        document.getElementById('video').muted = true;

        // Pause video on outgoing slide, and pause slider if new slide is video
        $('#heroSlider').on('cycle-before', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
          if( $(outgoingSlideEl).hasClass('videoSlide') ) {
            $('video', outgoingSlideEl)[0].pause();
          } else {
            $('#heroSlider').cycle('resume');
          }
        });

        // Play the video on the incoming slide
        $('#heroSlider').on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
          if( $(incomingSlideEl).hasClass('videoSlide') ) {
            $('video', incomingSlideEl)[0].play();
            $('#heroSlider').cycle('pause');
          } else {
            $('#heroSlider').cycle('resume');
          }
        });

        // Go to the next slide when video of current slide ends
        $(function() {
          $('video').on('ended', function() { 
            $('#heroSlider').cycle('next'); // trigger next slide 
          }); // addition end 
          $('video')[0].play();
        });
      }

      $('#heroSlider').on('cycle-before', function (event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        if( $(incomingSlideEl).hasClass('light') ) {
          $('body').removeClass('dark');
          $('body').addClass('light');
        } else {
          $('body').removeClass('light');
          $('body').addClass('dark');
        }
      });

    });
  </script>

<?php } ?>



<?php if( is_product() ) { ?>

  <script>
    
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $(document).ready(function() {
        //$winHeight = window.innerHeight;
        //$('.single-product #hero #productSlider').css('height',$winHeight);
      });
    } else {
      $(document).ready(function() {
        $winHeight = window.innerHeight - 30;
        $('.single-product #hero #productSlider').css('height',$winHeight);
      });
      $(window).resize(function() {
        $winHeight = window.innerHeight - 30;
        $('.single-product #hero #productSlider').css('height',$winHeight);
      });
    }
    

    $(document).ready(function() {

      // Product Slider
      $('#productSlider').cycle({
        fx: "fade",
        timeout: 0,
        speed: 500,
        slides: "> a",
        prev: "#prev",
        next: "#next",
        swipe: true,
        hideNonActive: true,
        slideActiveClass: "active",
        allowWrap: true,
        autoHeight: "container"
      });

      if ( $('#productSlider').children().length == 1 )
        $('#prev,#next').hide();
    
    });
  </script>

<?php } ?>



<script>
  // Header Fade on Scroll
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if( scroll >= 1 ) {
      $('#topBar').removeClass('fadeOff');
      $('#topBar').addClass('fadeOn');
    } else {
      $('#topBar').removeClass('fadeOn');
      $('#topBar').addClass('fadeOff');
    }
  });


  $(window).scroll(function() {
    var height = $('.headerBorder').height();
    var scroll = $(window).scrollTop();
    if( scroll >= height ) {
      $('#portfolio-btn').addClass('show');
    } else {
      $('#portfolio-btn').removeClass('show');
    }
  });


  
  $(window).on('scroll', function() {
    $('#clicksPanel').each(function() {
      if (isScrolledIntoView($(this))) {
        $(this).addClass('scroll');
      }
    });
  });

  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }



  $(document).ready(function () {

    // Mobile Menu Script
    $('#bs4navbarMobile').on('show.bs.collapse', function () {
      $('body').addClass('menuOpen');
      $('.navbar-toggler').addClass('close');
    });
    $('#bs4navbarMobile').on('hide.bs.collapse', function () {
      $('body').removeClass('menuOpen');
      $('.navbar-toggler').removeClass('close');
    });
    $(document).click(function(e) {
      if (!$(e.target).is('.panel-body')) {
        $('.collapse').collapse('hide');
      }
    });

    // Fade In Body
    $('body.home #wrap').queue(function(next) {
      $(this).addClass('fadein');
      next();
    });

    // Fade In Hero Content Home
    /*
    $('.home #hero .heroText').delay(250).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    $('.home #hero .heroBtns').delay(500).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    */
    /*
    $('.home #hero .box.num1 .heroText').delay(500).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    $('.home #hero .box.num1 .heroBtns').delay(1000).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    $('.home #hero .box.num2 .heroText').delay(2000).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    $('.home #hero .box.num2 .heroBtns').delay(2500).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    */

    // Fade In Hero Content Inner
    /*
    $('#hero.inner .heroText').delay(1000).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    $('#hero.inner .heroBtns').delay(3000).queue(function(next) {
      $(this).addClass('fadein');
      next();
    });
    */


    // Testimonial Slider Length
    <?php if( get_field('testimonial_length') ) { ?>
    $(function() {
      $("span.inquote").each(function(i) {
        len=$(this).text().length;
        if(len><?php the_field('testimonial_length') ?>) {
          $(this).text($(this).text().substr(0,<?php the_field('testimonial_length') ?>)+'...');
        }
      });
    });
    <?php } ?>

    // Responsive Video Wrap
    // $("#vidWrap").fitVids();

  });
</script>