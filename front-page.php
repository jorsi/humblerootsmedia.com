<?php get_header(); ?>

  <header data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/camera.jpg" class="slide parallax-window">
    <h1>We're Your Storytellers</h1>
    <h2>Crafting Beautiful Online Content</h2>
    <a class="ghost" href="#intro">Grow With Us</a>
    <div class="scrollDown"><a href="#content"><i class="fa fa-angle-down"></i></a></div>
  </header>

  <main>
      <section id="intro" class="break">
        <div class="container-fluid">
            <p>We're a collaboration between passionate producers and creative clients.  Branching out across the GTA.</p>
        </div>
      </section>

      <section id="productions" class="productions">
        <!-- Modal-->
        <div role="dialog" aria-labelledby="myModalLabel" class="modal fade">
          <div role="document" class="modal-dialog">
            <div class="modal-video-wrapper">
              <iframe src="" mozallowfullscreen allowfullscreen class="modal-iframe"></iframe>
            </div>
          </div>
        </div>

        <div class="container">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <a href="https://vimeo.com/121850734">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cine.gif" alt="aasdf">
                  <div class="carousel-caption">
                    <h3>Catherine North Sessions</h3>
                    <p>Description here</p>
                  </div>
              </div>
              <div class="item">
                <a href="https://vimeo.com/130975587">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cine.gif" alt="aasdf">
                </a>
                  <div class="carousel-caption">
                    <h3>MAC</h3>
                    <p>Description here</p>
                  </div>
              </div>
              <div class="item">
                <a href="https://vimeo.com/135975911">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cine.gif" alt="aasdf">
                </a>
                <div class="carousel-caption">
                  <h3>LOL</h3>
                  <p>Description here</p>
                </div>
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </section>

      <aside data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/film.jpg" class="slide parallax-window">
        <h2>Humble Thoughts</h2>
        <h3>Our blog, our memories and scribes.</h3><a href="/humblethoughts">
        <a class="ghost" href="/humblethoughts">Discover</a>
      </aside>

      <section id="midtro" class="break">
        <div class="wrap">
          <p>Our imagination, experience and dedication are at your service. <a href="/clientele">See how.</a></p>
        </div>
      </section>

      <section id="instafeed" class="">
        <i class="fa fa-fw fa-instagram"></i>
      </section>

      <section id="outro" class="break">
        <div class="wrap">
          <p>We're passionate about our craft. Let's grow together.</p>
        </div>
      </section>

    </div>
  </main>

<?php get_footer(); ?>
