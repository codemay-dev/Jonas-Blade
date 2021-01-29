<?php // Left Sidebar ?>

<ul>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
  <?php endif; ?>
</ul>