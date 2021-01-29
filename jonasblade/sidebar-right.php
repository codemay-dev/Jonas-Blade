<?php // Right Sidebar (Main) ?>

<ul>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
  <?php endif; ?>
</ul>