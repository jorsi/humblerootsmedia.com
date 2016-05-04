<?php
  get_header();
  $postid = $post->ID;
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
  <div class="nav-pad"></div>
  <!-- <header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
    <h1 class="splash-title"><?php echo stripslashes( get_post_meta($postid, 'humblerootsmedia_splash-title', true) ); ?></h1>
    <h3 class="splash-tagline"><?php echo stripslashes( get_post_meta($postid, 'humblerootsmedia_splash-tagline', true) ); ?></h3>

    <?php
      if ( get_post_meta($postid, 'humblerootsmedia_ghost-checkbox', true) ) {
        ?>
        <a class="splash-ghost ghost smooth-scroll" href="#main">
          <?php echo stripslashes( get_post_meta($postid, 'humblerootsmedia_ghost-text', true ) ); ?>
        </a>
    <?php
      }
    ?>
  </header> -->

<main id="main">
  <div class="container-md">
    <h1 class="testimonial-title text-center"><?php echo stripslashes( get_post_meta( $post->ID, 'humblerootsmedia_intro-text', true )); ?></h2>
  </div>
  <aside class="break text-center">
    <div class="container-lg clearfix">
    <?php
      // Display Clientele
      $args = array(
        'post_type' => 'client',
        'orderby' => 'menu_order',
        'order'   => 'ASC'
      );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
        echo '<div class="client">';
          echo '<img class="client-image" src="' .  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . '" title="' . get_the_title() . '" alt="' . get_the_title() . '">';
        echo '</div>';
      endwhile;
    ?>
    </div>
  </aside>

  <section class="content text-center">
    <div class="container-lg clearfix">
      <?php
        // Display Testimonials
        $args = array(
          'post_type' => 'testimonial',
          'orderby' => 'menu_order',
          'order'   => 'ASC'
         );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
            echo '<div class="testimonial col-third">';
              echo '<div class="flex flex-column flex-center testimonial-content">';
                echo '<blockquote class="testimonial-quote">' . get_post_meta($post->ID, 'testimonial_quote', true) . '</blockquote>';
              echo '</div>';
              echo '<div class="testimonial-footer">';
                echo '<img class="testimonial-image" src="' .  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . '">';
                echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
                echo '<h4 class="testimonial-jobtitle">' . get_post_meta($post->ID, 'testimonial_jobtitle', true) . '</h4>';
                echo '<h4 class="testimonial-company">';
                  echo '<a href="'. get_post_meta($post->ID, 'testimonial_link', true) . '" target="_blank">' . get_post_meta($post->ID, 'testimonial_company', true) . '</a>';
                echo '</h4>';
              echo '</div>';
            echo '</div>';
        endwhile;
      ?>
    </div>
  </section>

  <aside class="break text-center">
    <div class="container-md">
      <p><?php echo stripslashes( get_post_meta($postid, 'humblerootsmedia_outro-text', true ) ); ?></p>
    </div>

  </aside>
</main>

<?php

  get_footer();
