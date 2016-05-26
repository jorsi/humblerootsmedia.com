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
            // Display Testimonials
            $args = array(
              'post_type' => 'production',
              'orderby' => 'menu_order',
              'order'   => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) :
              echo '<li>';
                for ( $i = 0; $i < 3; $i++ ) : $loop->the_post();
                  echo '<div class="item">';
                    echo '<div class="img-overlay">';
                      echo '<a class="fancybox fancybox.iframe" href="' . get_post_meta($post->ID, 'productions_video_uri', true) . '?autoplay=true">';
                        echo '<i class="fa fa-fw fa-play-circle-o"></i>';
                        echo '<img src="' .  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . '">';
                      echo '</a>';
                    echo '</div>';
                    echo '<a class="fancybox fancybox.iframe" href="' . get_post_meta($post->ID, 'productions_video_uri', true) . '?autoplay=true">';
                      echo '<h3>' . get_the_title() . '</h3>';
                    echo '</a>';
                    echo '<p>' . get_post_meta($post->ID, 'productions_video_description', true) . '</p>';

                  echo '</div>';
                endfor;
              echo '</li>';
            endwhile; ?>
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
          <i id="instagram-icon" class="fa fa-fw fa-instagram"></i>
          <div id="instafeed" class="clearfix"></div>
          <i id="load-more" class="fa fa-fw fa-ellipsis-h"></i></button>
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
