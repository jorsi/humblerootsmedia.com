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
      <form role="search" method="get" id="searchform" class="searchform" action="/">
          <label class="screen-reader-text" for="s">Search for:</label>
          <input type="text" value="" name="s" id="s">
          <button type="submit" id="searchsubmit"><i class="fa fa-fw fa-search"></i></button>
      </form>
  </div>
  <section class="post-content">
    <div class="container-md">
      <h2 class="post-title text-center"><?php single_post_title(); ?></h2>
      <div class="post-metadata">
        <ul class="post-metadata-authorinfo">
          <li class="post-metadata-author">Written by <span class="author"><a href="/author/<?php echo get_the_author_meta('user_nicename'); ?>"><?php echo get_the_author(); ?></a></span></li>
          <li class="post-metadata-time"> on <time datetime="<?php echo get_the_time('F jS, Y g:i:s'); ?>" pubdate><?php echo get_the_time('F jS, Y'); ?></time></li>

          <?php
          $twitter = get_the_author_meta( 'twitter' );
          if ( $twitter ) { ?>
            <li class="post-metadata-twitter">
              <a href="http://www.twitter.com/<?php echo $twitter; ?>" target="_blank">
                <i class="fa fa-fw fa-twitter"></i>@<?php echo $twitter; ?>
              </a>
            </li>
          <?php }

          $instagram = get_the_author_meta( 'instagram' );
          if ( $instagram ) { ?>
            <li class="post-metadata-instagram">
              <a href="http://www.instagram.com/<?php echo $instagram; ?>" target="_blank">
                <i class="fa fa-fw fa-instagram"></i>@<?php echo $instagram; ?>
              </a>
            </li>
          <?php }

          $facebook = get_the_author_meta( 'facebook' );
          if ( $facebook ) { ?>
            <li class="post-metadata-facebook">
              <a href="http://www.facebook.com/<?php echo $facebook; ?>" target="_blank">
                <i class="fa fa-fw fa-facebook"></i>@<?php echo $facebook; ?>
              </a>
            </li>
          <?php } ?>
        </ul>
        <ul class="post-metadata-categories">
          <?php
          $categories = get_the_category();
          if ( $categories ) {
              foreach ($categories as $category) {
                if ( $category->name != 'Uncategorised' ) { ?>
                  <li class="post-metadata-category">
                    <a href="/category/<?php echo $category->slug; ?>">
                      <?php echo $category->name; ?>
                    </a>
                  </li>
                <?php
                }
              } ?>
          <?php } ?>
        </ul>
      </div>
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

  <aside class="break text-center">
    <div class="container-md">
      <p><?php echo stripslashes( get_post_meta( $humble->ID, 'humblerootsmedia_outro-text', true ) ); ?></p>
      <p>
        <a href="/contact">Grow with us.</a>
      </p>
    </div>
  </aside>
</main>

<?php
  get_footer();
