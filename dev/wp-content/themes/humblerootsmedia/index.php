<?php get_header();
      $homeID = $post->ID;
?>
  <div class="nav-pad"></div>
  <header class="splash flex table parallax-window" data-parallax="scroll" data-image-src="<?php header_image(); ?>">
    <div class="table-cell">
      <h1 class="splash-title"><?php echo stripslashes( get_post_meta($homeID, 'humblerootsmedia_splash-title', true) ); ?></h1>
      <h3 class="splash-tagline"><?php echo stripslashes( get_post_meta($homeID, 'humblerootsmedia_splash-tagline', true) ); ?></h3>

      <?php
        if ( get_post_meta($homeID, 'humblerootsmedia_ghost-checkbox', true) ) {
          ?>
          <a class="splash-ghost ghost smooth-scroll" href="#main">
            <?php echo stripslashes( get_post_meta($homeID, 'humblerootsmedia_ghost-text', true ) ); ?>
          </a>
      <?php
        }
      ?>
    </div>
  </header>

  <main id="main">
      <aside class="break text-center">
        <div class="container-md">
            <p>
              <?php echo stripslashes( get_post_meta($homeID, 'humblerootsmedia_intro-text', true ) ); ?>
            </p>
        </div>
      </aside>

      <section class="content">
        <div class="container-lg">

          <div id="productions-control">
            <span class="prev"><i class="fa fa-fw fa-chevron-circle-left"></i></span>
            <h2>View Our Work</h2>
            <span class="next"><i class="fa fa-fw fa-chevron-circle-right"></i></span>
          </div>

          <ul class="bxslider">
          <?php
            // Display Productions
            $args = array(
              'post_type' => 'production',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'orderby' => 'menu_order',
              'order'   => 'ASC'
            );
            $query = new WP_Query( $args );
            while ( $query->have_posts() ) : ?>
              <li>
            <?php for ( $i = 0; $i < 3; $i++ ) : $query->the_post(); ?>
                <div class="item">
                  <div class="img-overlay">
                    <a class="fancybox fancybox.iframe" href="<?php echo get_post_meta($post->ID, 'productions_video_uri', true); ?>?autoplay=true">
                      <i class="fa fa-fw fa-play-circle-o"></i>
                      <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>">
                    </a>
                  </div>
                  <a class="fancybox fancybox.iframe" href="<?php echo get_post_meta($post->ID, 'productions_video_uri', true); ?>?autoplay=true">
                    <h3><?php echo get_the_title(); ?></h3>
                  </a>
                  <p><?php echo get_post_meta($post->ID, 'productions_video_description', true); ?></p>

                </div>
            <?php
              endfor;
            ?>
            </li>
            <?php
            endwhile;
            ?>
          </ul>
        </div>
      </section>

      <aside class="flex table slide parallax-window" data-parallax="scroll" data-image-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $homeID ) ); ?>">
        <div class="table-cell">
          <h1 class="slide-title">Humble Thoughts</h1>
          <h3 class="slide-tagline">Our blog, our memories and scribes.</h3>
          <a class="ghost" href="/humble-thoughts">Discover</a>
        </div>
      </aside>

      <aside class="break text-center">
        <div class="container-md">
          <p>
            <?php echo stripslashes( get_post_meta($homeID, 'humblerootsmedia_midtro-text', true ) ); ?>
          </p>
          <p>
            <a href="/clientele">See how.</a>
          </p>
        </div>
      </aside>

      <section class="content text-center">
        <div class="container-md">
          <a href="https://www.instagram.com/humble_roots_media/" target="_blank"><i id="instagram-icon" class="fa fa-fw fa-instagram"></i></a>
          <div id="instafeed" class="clearfix"></div>
          <i id="load-more" class="fa fa-fw fa-ellipsis-h"></i>
        </div>
      </section>

      <aside class="break text-center">
        <div class="container-md">
          <p>
            <?php echo stripslashes( get_post_meta($homeID, 'humblerootsmedia_outro-text', true ) ); ?>
          </p>
          <p>
            <a href="/contact">Grow with us.</a>
          </p>
        </div>
      </aside>

    </div>
  </main>

<?php get_footer(); ?>
