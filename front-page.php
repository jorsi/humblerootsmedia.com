<?php get_header(); ?>

  <header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/camera.jpg">
    <h1>We're Your Storytellers</h1>
    <h3>Crafting beautiful online content</h3>
    <a class="ghost" href="#intro">Grow With Us</a>
  </header>

  <main>
      <aside class="break text-center">
        <div class="container-md">
            <p>We're a collaboration between passionate producers and creative clients.  Branching out across the GTA.</p>
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
        <h2>Humble Thoughts</h2>
        <h3>Our blog, our memories and scribes.</h3><a href="/humblethoughts">
        <a class="ghost" href="/humblethoughts">Discover</a>
      </aside>

      <aside class="break text-center">
        <div class="wrap">
          <p>Our imagination, experience and dedication are at your service. <a href="/clientele">See how.</a></p>
        </div>
      </aside>

      <section class="content text-center">
        <div class="container-md">
          <i class="fa fa-fw fa-instagram"></i>
          <div id="instafeed" class="clearfix"></div>
          <button id="load-more"><i class="fa fa-fw fa-ellipsis-h"></i></button>
        </div>
      </section>

      <aside id="outro" class="flex-center break">
        <div class="wrap">
          <p>We're passionate about our craft. Let's grow together.</p>
        </div>
      </aside>

    </div>
  </main>

<?php get_footer(); ?>
