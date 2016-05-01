<?php
  get_header();

  the_post();
  $humble = get_page_by_title( 'Humble Thoughts' );
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="nav-pad"></div>
<header class="flex flex-column flex-center text-center">
  <h1 class="humble-title"><?php echo stripslashes( get_post_meta( $humble->ID, 'humblerootsmedia_splash-title', true ) ); ?></h1>
  <h3 class="splash-tagline black"><?php echo stripslashes( get_post_meta(  $humble->ID, 'humblerootsmedia_splash-tagline', true ) ); ?></h3>
  <?php
    if ( get_post_meta($postid, 'humblerootsmedia_ghost-checkbox', true) ) {
      ?>
      <a class="splash-ghost ghost smooth-scroll" href="#main">
        <?php echo stripslashes( get_post_meta($postid, 'humblerootsmedia_ghost-text', true ) ); ?>
      </a>
  <?php
    }
  ?>
</header>
<main id="main">
  <section class="post-content">
    <div class="container-md">
      <h2 class="post-title text-center"><?php single_post_title(); ?></h2>
      <p class="post-metadata text-center">Posted in <?php the_category( ', ' ); ?> on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></p>
      <img src="<?php echo $thumb; ?>"></img>
      <article class="post-entry">
        <?php the_content(); ?>
      </article>
    </div>
  </section>
</main>

<?php
  get_footer();
