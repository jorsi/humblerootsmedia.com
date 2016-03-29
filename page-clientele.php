<?php
  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
  <div class="nav-pad"></div>
  <header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
    <h1 class="splash-title"><?php echo stripslashes( get_option( 'clientele_splash_title' ) ); ?></h1>
    <h3 class="splash-tagline"><?php echo stripslashes( get_option( 'clientele_splash_tagline' ) ); ?></h3>
    <a class="splash-ghost ghost smooth-scroll" href="#main"><?php echo stripslashes( get_option( 'clientele_ghost_text', 'See What We Mean' ) ); ?></a>
  </header>

<main id="main">

  <section class="content text-center">
    <div class="container-lg">
      <h2 class="testimonial-title">What Our Clients Say About Us</h2>
      <?php
        // Display Testimonials
        $args = array( 'post_type' => 'testimonial', 'posts_per_page' => get_option( 'clientele_max_testimonials' ) );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
          echo '<div class="testimonial clearfix">';
            echo '<div class="row">';
              echo '<div class="col-half">';
                echo '<img class="testimonial-image" src="' .  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . '">';
              echo '</div>';
              echo '<div class="testimonial-info col-half">';
                echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
                echo '<blockquote class="testimonial-quote">' . get_post_meta($post->ID, 'testimonial_quote', true) . '</blockquote>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
        endwhile; ?>
    </div>
  </section>

    <aside class="break text-center">
      <div class="container-md clearfix">
      <?php
        // Display Clientele
        $args = array( 'post_type' => 'client', 'posts_per_page' => get_option( 'clientele_max_clients' ) );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
          echo '<div class="col-third client">';
            echo '<img class="client-image" src="' .  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . '" title="' . get_the_title() . '" alt="' . get_the_title() . '">';
          echo '</div>';
        endwhile;
      ?>
      </div>
    </aside>


  <aside class="break text-center">
    <div class="container-md">
      <p><?php echo stripslashes( get_option( 'clientele_outro', 'Any last words, punk?' ) ); ?></p>
    </div>

  </aside>
</main>

<?php

  get_footer();
