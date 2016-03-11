<?php get_header(); ?>

  <header data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/camera.jpg" class="flex-center slide parallax-window">
    <h1>We're Your Storytellers</h1>
    <h2>Crafting Beautiful Online Content</h2>
    <a class="ghost" href="#intro">Grow With Us</a>
    <div class="scrollDown"><a href="#content"><i class="fa fa-angle-down"></i></a></div>
  </header>

  <main>
      <section id="intro" class="flex-center break">
        <div class="container">
            <p>We're a collaboration between passionate producers and creative clients.  Branching out across the GTA.</p>
        </div>
      </section>

      <section id="productions">
        <div class="container">

          <ul class="bxslider">
            <li>
              <a href="https://vimeo.com/121850734">
                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="aasdf">
                <div class="carousel-caption">
                  <h3>Catherine North Sessions</h3>
                  <p>Description here</p>
                </div>
              </li>
            <li>
              <a href="https://vimeo.com/130975587">
                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="aasdf">
              </a>
                <div class="carousel-caption">
                  <h3>MAC</h3>
                  <p>Description here</p>
                </div>
              </li>
            <li>
              <a href="https://vimeo.com/135975911">
                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="aasdf">
              </a>
              <div class="carousel-caption">
                <h3>LOL</h3>
                <p>Description here</p>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <aside data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/film.jpg" class="flex-center slide parallax-window">
        <h2>Humble Thoughts</h2>
        <h3>Our blog, our memories and scribes.</h3><a href="/humblethoughts">
        <a class="ghost" href="/humblethoughts">Discover</a>
      </aside>

      <section id="midtro" class="flex-center break">
        <div class="wrap">
          <p>Our imagination, experience and dedication are at your service. <a href="/clientele">See how.</a></p>
        </div>
      </section>

      <section id="instafeed" class="flex-center">
        <i class="fa fa-fw fa-instagram"></i>
      </section>

      <section id="outro" class="flex-center break">
        <div class="wrap">
          <p>We're passionate about our craft. Let's grow together.</p>
        </div>
      </section>

    </div>
  </main>

<?php get_footer(); ?>
