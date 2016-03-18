<?php
  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
  <h1><?php echo stripslashes( get_option( 'frontpage_splash_title', 'Splash Title Here' ) ); ?></h1>
  <h3><?php echo stripslashes( get_option( 'frontpage_splash_tagline', 'Witty splash tagline should go here' ) ); ?></h3>
  <a class="ghost smooth-scroll" href="#main">Grow With Us</a>
</header>
  <h2>Humble Thoughts</h2>
  <!-- Start the Loop. -->
  <?php
    query_posts($arg=null);
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    	<h2>
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
      </h2>
    	<small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>

    	<div class="entry">
    		<?php the_content(); ?>
    	</div>

    	<p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
    <?php endwhile; else : ?>
  	   <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<?php
  get_footer();
