<?php
  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
  <div class="nav-pad"></div>
<main id="main">
  <aside class="break text-center">
    <div class="container-md">
      <p>
        Oops... it looks like we can't find the page you are looking for.
      </p>
      <p>
        <a href="javascript:history.back()">Return from whence ye came</a>
      </p>
    </div>
  </aside>
  
</main>
<?php
  get_footer();
