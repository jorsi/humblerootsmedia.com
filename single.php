<?php
  get_header();

  the_post();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
  <h1><?php single_post_title(); ?></h1>
</header>
<main id="main">
  <section class="post-content">
    <div class="container-md">
      <h3 class="post-metadata text-center">
        Posted in <?php the_category( ', ' ); ?> on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?>
      </h3>
      <article class="post-entry">
        <?php the_content(); ?>
      </article>
    </div>
  </section>
</main>

<?php
  get_footer();
