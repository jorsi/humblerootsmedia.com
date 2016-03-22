<?php
  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<header class="padding-menu text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
  <h1>Our Humble Thoughts</h1>
</header>
<main id="main">
  <div class="container-lg">

    <!-- Start the Loop. -->
    <?php
      query_posts(null);
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      	<h2 class="post-title">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h2>
        <p class="post-metadata">
          Posted in <?php the_category( ', ' ); ?> on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?>
        </p>

        <img class="post-image block-center" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>">

      	<article class="post-summary">
      		<?php the_content(); ?>
      	</article>

      <?php endwhile; else : ?>
    	   <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

  </div>
</main>

<?php
  get_footer();
