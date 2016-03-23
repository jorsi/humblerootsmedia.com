<?php
  get_header();

  the_post();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="nav-pad"></div>
<header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
  <h1 class="post-title tangerine"><?php single_post_title(); ?></h1>
  <h2 class="post-metadata text-center">
    Posted in <?php the_category( ', ' ); ?> on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?>
  </h2>
</header>
<main id="main">
  <section class="post-content">
    <div class="container-md">
      <article class="post-entry">
        <?php the_content(); ?>
      </article>
    </div>
  </section>
</main>

<?php
  get_footer();
