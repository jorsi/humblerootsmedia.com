<?php ?>
		<footer id="footer">
      <div class="container-lg">

        <div id="info" class="row">
          <?php
            // Display Testimonials
            $args = array(
              'post_type' => 'footer',
              'posts_per_page' => 3,
              'orderby' => 'menu_order',
              'order'   => 'ASC',
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
              echo '<div class="col-third center-h">';
                echo '<h2>' . get_the_title() . '</h2>';
                echo '<p>';
                  the_content();
                echo '</p>';
              echo '</div>';
            endwhile;
          ?>
        </div>
          <a class="scroll-up smooth-scroll" href="#top"><i class="fa fa-chevron-circle-up"></i></a>
      </div>

      <div id="copyright">
        <small>&copy; <script>document.write(new Date().getFullYear())</script> Humble Roots Media - Created by <a href="http://www.jonorsi.com" target="_blank">Jonathon Orsi</a></small>
      </div>

    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
