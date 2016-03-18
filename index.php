<?php get_header(); ?>

  <header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php header_image(); ?>">
    <h1><?php echo stripslashes( get_option( 'frontpage_splash_title', 'Splash Title Here' ) ); ?></h1>
    <h3><?php echo stripslashes( get_option( 'frontpage_splash_tagline', 'Witty splash tagline should go here' ) ); ?></h3>
    <a class="ghost smooth-scroll" href="#main">Grow With Us</a>
  </header>

  <main id="main">
      <aside class="break text-center">
        <div class="container-md">
            <p><?php echo stripslashes( get_option( 'frontpage_intro', 'Something profound about the company goes here.' ) ); ?></p>
        </div>
      </aside>

      <section class="content">
        <div class="container-lg">

          <div id="productions-control">
            <span class="prev"><i class="fa fa-fw fa-chevron-left"></i></span>
            <h2>Our Pieces</h2>
            <span class="next"><i class="fa fa-fw fa-chevron-right"></i></span>
          </div>

          <ul class="bxslider">
            <li>
              <div class="item">
                <a href="https://vimeo.com/121850734">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="aasdf">
                  <h3>Catherine North Sessions</h3>
                  <p>Description here</p>
                </a>
              </div>
              <div class="item">
                <a href="https://vimeo.com/130975587">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="aasdf">
                  <h3>MAC</h3>
                  <p>Description here</p>
                </a>
              </div>
              <div class="item">
                <a href="https://vimeo.com/135975911">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="aasdf">
                  <h3>LOL</h3>
                  <p>Description here</p>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <aside class="flex flex-column flex-center slide text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/film.jpg">
        <h1>Humble Thoughts</h1>
        <h3>Our blog, our memories and scribes.</h3>
        <a class="ghost" href="/humblethoughts">Discover</a>
      </aside>

      <aside class="break text-center">
        <div class="container-md">
          <p><?php echo stripslashes( get_option( 'frontpage_midtro', 'A little bit about how you work with people.' ) ); ?> <a href="/clientele">See how.</a></p>
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
          <p><?php echo stripslashes( get_option( 'frontpage_outro', 'Any last words, punk?' ) ); ?></p>
        </div>
      </aside>

    </div>
  </main>

<?php get_footer(); ?>
