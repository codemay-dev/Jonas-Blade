<?php // Post Single View
get_header(); ?>

  <div id="contentPanel" class="col-12 col-xl-11 panelWrap">
    <div class="inside row">
      <main id="content" class="col-12 col-md-8">
        <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

          <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class="postmetadata">
              <p>Posted: <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></p>
              <p>Category: <?php the_category(', ') ?></p>
              <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
            </div>

            <?php the_content(); ?>
          </article>

        <?php endwhile; ?>

          <?php // comments_template(); ?>

        <?php else: ?>

          <h2 class="pagetitle">Sorry</h2>

          <p>No posts matched your criteria.</p>

        <?php endif; ?>
      </main>

      <aside id="sidebar" class="col-12 col-md-4">
        <?php get_sidebar('right'); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>