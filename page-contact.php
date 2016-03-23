<?php
  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
  <div class="nav-pad"></div>
<header class="splash flex flex-column flex-center text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo $thumb; ?>">
  <h1><?php echo stripslashes( get_option( 'frontpage_splash_title', 'Splash Title Here' ) ); ?></h1>
  <h3><?php echo stripslashes( get_option( 'frontpage_splash_tagline', 'Witty splash tagline should go here' ) ); ?></h3>
  <a class="ghost smooth-scroll" href="#main">Grow With Us</a>
</header>
  <h2>Contact</h2>
<?php
  get_footer();
