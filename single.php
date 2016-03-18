<?php
  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
  <h1><?php single_post_title(); ?></h1>
</header>
  <h2></h2>
  <p><?php the_content(); ?></p>

<?php
  get_footer();
