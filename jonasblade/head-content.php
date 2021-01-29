<?php // <head> Content ?>

<head profile="http://gmpg.org/xfn/11">
  <meta id="viewport" name="viewport" content="width=device-width">

  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php wp_title(); ?></title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.typekit.net/cui4bgo.css">

  <!-- Icons -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/font-awesome.min.css">

  <!-- Styles -->
  <?php locate_template('head-styles.php', true); ?>

  <?php wp_enqueue_script("jquery"); ?>

  <?php wp_head(); ?>

  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1098609003875653');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1098609003875653&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->
</head>