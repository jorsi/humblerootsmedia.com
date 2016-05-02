<?php
  get_header();
  // the query
  $post_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=> 5));
  $postid = $post->ID;
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

<div class="nav-pad"></div>
<header class="flex flex-column flex-center text-center">
  <h1 class="humble-title"><?php echo stripslashes( get_post_meta( $postid, 'humblerootsmedia_splash-title', true ) ); ?></h1>
  <h3 class="splash-tagline black"><?php echo stripslashes( get_post_meta( $postid, 'humblerootsmedia_splash-tagline', true ) ); ?></h3>
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
  <div class="container-lg">
    <section class="blog-posts">
      <!-- Start the Loop. -->
      <?php
        if ( $post_query->have_posts() ) : while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
          <section class="post-summary">
            <div class="container-md">
            	<h2 class="post-title text-center">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
              </h2>
              <p class="post-metadata text-center">
                Posted in <?php the_category( ', ' ); ?> on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?>
              </p>

              <img class="post-image block-center" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>">

            	<article class="post-entry">
            		<?php the_content('Read on...'); ?>
            	</article>
            </div>
          </section>

        <?php
          endwhile;
          wp_reset_postdata();
          else :
        ?>
      	   <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </section>

    <aside class="break text-center">
      <div class="container-md">
        <p><?php echo stripslashes( get_post_meta($postid, 'humblerootsmedia_outro-text', true ) ); ?></p>
      </div>
    </aside>
  </div>
</main>

<?php
  get_footer();
