<?php // Default Custom Post Type Template
get_header(); ?>

  <div id="contentPanel" class="col-12 col-xl-11 panelWrap">
    <div class="inside row">
      <div id="content" class="col-12 col-md-8">
        <?php $args = array(
                        'post_type' => 'post_type',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'asc'
                      );
              query_posts( $args ); if (have_posts()) : ?>

          <h2 class="pagetitle"><?php the_title(); ?></h2>

        <?php while (have_posts()) : the_post(); ?>

          <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <div class="postmetadata">
              <p>Posted: <?php the_time('F jS, Y') ?></p>
              <p>Category: <?php the_category(', ') ?></p>
              <?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
            </div>

            <?php the_excerpt(); ?>

            <div class="postmetadata">
              <p><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
            </div>
            <hr />
          </article>

        <?php endwhile; ?>

          <?php include (TEMPLATEPATH . '/pagination.php'); ?>

        <?php else : ?>

          <h2 class="pagetitle"><?php the_title(); ?></h2>

          <section class="post" id="post-<?php the_ID(); ?>">
            <p>Sorry, nothing found.</p>
            <?php get_search_form(); ?>
          </section>

        <?php endif; ?>
      </div>

      <aside id="sidebar" class="col-12 col-md-4">
        <?php get_sidebar('right'); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>