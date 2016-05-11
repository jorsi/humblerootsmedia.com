<?php
  get_header();

  the_post();
  $humble = get_page_by_title( 'Humble Thoughts' );
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="nav-pad"></div>
<main id="main">
  <div class="container-md humble-header">
      <h1 class="humble-title"><?php echo stripslashes( get_post_meta( $humble->ID, 'humblerootsmedia_splash-title', true ) ); ?></h1>
      <h3 class="splash-tagline black"><?php echo stripslashes( get_post_meta(  $humble->ID, 'humblerootsmedia_splash-tagline', true ) ); ?></h3>
  </div>
  <section class="post-content">
    <div class="container-md">
      <h2 class="post-title text-center"><?php single_post_title(); ?></h2>
      <p class="post-metadata text-center">
        <?php
          $categories = get_the_category();
          echo 'Posted in ';
          foreach ($categories as $category) {
            echo $category->name . ' ';
          }
          echo 'on ';
          the_time('F jS, Y');
          echo ' by ';
          the_author(); ?>
      </p>
      <img src="<?php echo $thumb; ?>"></img>
      <article class="post-entry">
        <?php the_content(); ?>
      </article>
    </div>
  </section>

  <section class="recent-posts">
    <div class="container-md">
      <h2 class="recent-posts_h2">Read On</h2>
      <ul class="recent-posts_ul clearfix">
      <?php
        $args = array(
          'numberposts' => 3,
          'offset' => 0,
          'category' => 0,
          'orderby' => 'post_date',
          'exclude' => $post->ID,
          'order' => 'DESC',
          'post_type' => 'post',
          'post_status' => 'publish',
          'suppress_filters' => true );
      	$recent_posts = wp_get_recent_posts( $args );
      	foreach( $recent_posts as $recent ){
      		echo '<li class="recent-posts_li">';
            echo '<a class="recent-posts_a" href="' . get_permalink($recent["ID"]) . '">';
              echo '<img class="recent-posts_img" src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'featured-thumb' )[0] . '">';
              echo '<h4 class="recent-posts_h4">' . $recent["post_title"] . '</h4>';
            echo '</a>';
          echo '</li>';
      	}
      ?>
      </ul>
    </div>
  </section>
</main>

<?php
  get_footer();
