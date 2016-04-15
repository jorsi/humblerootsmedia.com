<?php get_header(); ?>
  <div class="nav-pad"></div>
  <header class="splash flex flex-column flex-center parallax-window" data-parallax="scroll" data-image-src="<?php header_image(); ?>">
    <h1 class="splash-title"><?php echo stripslashes( get_option( 'frontpage_splash_title', 'Splash Title Here' ) ); ?></h1>
    <h3 class="splash-tagline"><?php echo stripslashes( get_option( 'frontpage_splash_tagline', 'Witty splash tagline should go here' ) ); ?></h3>
    <a class="splash-ghost ghost smooth-scroll" href="#main">Grow With Us</a>
  </header>

  <main id="main">
      <aside class="break text-center">
        <div class="container-md">
            <p>
              <?php
              echo stripslashes( get_option( 'frontpage_intro', 'Something profound about the company goes here.' ) );
              ?>
            </p>
        </div>
      </aside>

      <section class="content">
        <div class="container-lg">

          <div id="productions-control">
            <span class="prev"><i class="fa fa-fw fa-angle-left"></i></span>
            <h2>View Our Work</h2>
            <span class="next"><i class="fa fa-fw fa-angle-right"></i></span>
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
                    echo '<a class="fancybox fancybox.iframe" href="' . get_post_meta($post->ID, 'productions_video_uri', true) . '">';
                      echo '<img src="' .  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . '">';
                      echo '<h3>' . get_the_title() . '</h3>';
                      echo '<p>' . get_post_meta($post->ID, 'productions_video_description', true) . '</p>';
                    echo '</a>';
                  echo '</div>';
                endfor;
              echo '</li>';
            endwhile; ?>
          </ul>
        </div>
      </section>

      <aside class="flex flex-column flex-center slide parallax-window" data-parallax="scroll" data-image-src="<?php echo get_theme_mod('humblerootsmedia_slide_image') ?>">
        <h1 class="slide-title">Humble Thoughts</h1>
        <h3 class="slide-tagline">Our blog, our memories and scribes.</h3>
        <a class="ghost" href="/humble-thoughts">Discover</a>
      </aside>

      <aside class="break text-center">
        <div class="container-md">
          <p>
            <?php echo stripslashes( get_option( 'frontpage_midtro', 'A little bit about how you work with people.' ) ); ?>
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
            <?php echo stripslashes( get_option( 'frontpage_outro', 'Any last words, punk?' ) ); ?>
          </p>
          <p>
            <a href="/contact">Grow with us.</a>
          </p>
        </div>
      </aside>

    </div>
  </main>

<?php get_footer(); ?>
