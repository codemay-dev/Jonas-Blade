<?php // Posts Archive
get_header(); ?>

  <div id="contentPanel" class="col-12 col-xl-11 panelWrap">
    <div class="inside row">
      <div id="content" class="col-12 col-md-8">
        <?php if (have_posts()) : ?>

        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h2 class="pagetitle">Author Archive</h2>
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h2 class="pagetitle">Blog Archives</h2>
        <?php } ?>

        <?php while (have_posts()) : the_post(); ?>

          <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <div class="postmetadata">
              <p>Posted: <?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
              <p>Category: <?php the_category(', ') ?></p>
              <?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
            </div>

            <?php the_excerpt(); ?>

            <div class="postmetadata">
              <p><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
            </div>
          </article>

          <hr />

        <?php endwhile; ?>

          <?php include (TEMPLATEPATH . '/pagination.php'); ?>

        <?php else : ?>

          <h2 class="pagetitle">Nothing Found</h2>

          <?php if ( is_category() ) { // If this is a category archive
            printf("<p>Sorry, but there aren't any posts in the %s category yet.</p>", single_cat_title('',false));
          } else if ( is_date() ) { // If this is a date archive
            echo("<p>Sorry, but there aren't any posts with this date.</p>");
          } else if ( is_author() ) { // If this is a category archive
            $userdata = get_userdatabylogin(get_query_var('author_name'));
            printf("<p>Sorry, but there aren't any posts by %s yet.</p>", $userdata->display_name);
          } else {
            echo("<p>No posts found.</p>");
          }
          get_search_form(); ?>

        <?php endif; ?>
        </div>

      <aside id="sidebar" class="col-12 col-md-4">
        <?php get_sidebar('right'); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>