<?php // 404 Not Found
get_header(); ?>

  <div id="contentPanel" class="col-12 col-xl-11 panelWrap">
    <div class="inside row">
      <main id="content" class="col-12 col-md-8">
        <?php if (have_posts()) : ?>
        
          <h2 class="pagetitle">Page Not Found</h2>

        <?php while (have_posts()) : the_post(); ?>

          <p>Sorry!</p>
          <p>The page you were looking for doesn't exist. Try making another selection from the menu at the top.</p>

        <?php endwhile; endif; ?>
      </main>

      <aside id="sidebar" class="col-12 col-md-4">
        <?php get_sidebar('right'); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>