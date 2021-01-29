<?php // Footer File ?>

    <?php if( get_field('show_cta') || is_product() ) {
      locate_template('partials/cta-partial.php', true);
    } ?>

    <footer class="row align-items-center justify-content-between">
      <div class="col-12 col-xl-auto order-12 copyright">
        <ul>
          <li>Copyright <?php echo date('Y'); ?> Jonas Blade</li>
          <li>All Rights Reserved</li>
          <li><a href="https://codemay.com" target="_new">Site by <img src="<?php bloginfo('template_directory'); ?>/images/siteby-codemay-black.png" class="codemay" /></a></li>
        </ul>
      </div>
      <div class="col-12 col-xl-auto order-1 footMenu">
        <?php wp_nav_menu( array(
          'menu' => 'Footer Menu'
        ) ); ?>
      </div>
    </footer>
  
  </div> <!-- End Wrap -->
  
  <?php include (TEMPLATEPATH . '/script.php'); ?>
<?php wp_footer(); ?>
</body>
</html>
