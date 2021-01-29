<?php // Main Menu ?>

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbarMain" aria-controls="bs4navbarMain" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar1"></span>
    <span class="icon-bar2"></span>
    <span class="icon-bar3"></span>
  </button>
  
  <?php wp_nav_menu([
    'menu'            => 'Main Menu',
    'container'       => 'div',
    'container_id'    => 'bs4navbarMain',
    'container_class' => 'collapse navbar-collapse',
    'menu_id'         => false,
    'menu_class'      => 'navbar-nav ml-auto',
    'depth'           => 2,
    'fallback_cb'     => 'bs4navwalker::fallback',
    'walker'          => new bs4navwalker()
  ]); ?>