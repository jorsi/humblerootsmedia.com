<?php
  $status = $post->post_content;

  if ( isset($_POST['action']) ) {
    $name = $_POST['name_full'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'hello@humblerootsmedia.com';
    $subject = 'New Email from Humble Roots Media Website';
    $msg = 'This message is being sent to you through the Humble Roots Media website.<br><br>'
          .'From: ' . $name . '<br>'
          .'Email: ' . $email . '<br>'
          .'Message: <br><br>' .$message . '<br><br>'
	  .'Reply to the email address given in the information above. Replies to this email will not be received by the person who sent this message.';
//    $headers = 'From: Wordpress <wordpress@jonorsi.com>' . '\r\n';

    if ( wp_mail($to, $subject, $msg) ) {
      $status = 'Thank you for contacting us. We\'ll get back to you shortly.';
    }
    else {
      $status = 'We\'re super sorry, but we couldn\'t send your message! Try again, or send to us directly via hello@humblerootsmedia.com.';
    }
  }

  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="nav-pad"></div>
<main id="main" class="contact">
  <div class="container-md contact-container clearfix">
    <p class="contact-intro"><?php echo stripslashes( get_post_meta($post->ID, 'humblerootsmedia_intro-text', true ) ); ?></p>
    <aside class="contact-text">
      <div>
        <?php echo $status; ?>
      </div>
    </aside>

    <section class="contact-form">
      <form method="post">
        <input type="hidden" name="action" value="contact">
        <label>
          <input type="text" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" name="name.full" value="Your Name">
        </label>
        <label>
          <input type="email" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" value="Your email" name="email">
        </label>
        <label>
          <textarea name="message" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue">Tell us about your project.</textarea>
        </label>
        <button type="submit">
          Send
          <i class="fa fa-fw fa-paper-plane"></i>
        </button>
      </form>
    </section>
  </div>

  <aside class="break text-center">
    <div class="container-md contact-footer row">
      <div class="col-third">
        <i class="fa fa-fw fa-envelope-o"></i>
        <p>
          <a href="mailto:hello@humblerootsmedia.com" target="_blank">hello@humblerootsmedia.com</a>
        </p>
      </div>
      <div class="col-third">
        <i class="fa fa-fw fa-phone"></i>
        <p>Toronto: 647-773-7301</p>
        <p>Hamilton: 905-929-5417</p>
      </div>
      <div class="col-third">
        <ul class="social-media-bar">
          <li><a href="https://www.linkedin.com/company/humble-roots-media" target="_blank"><i class="fa fa-fw fa-linkedin"></i></a></li>
          <li><a href="https://twitter.com/humblerootsnews" target="_blank"><i class="fa fa-fw fa-twitter"></i></a></li>
          <li><a href="https://www.instagram.com/humble_roots_media/" target="_blank"><i class="fa fa-fw fa-instagram"></i></a></li>
          <li><a href="https://vimeo.com/humblerootsmedia" target="_blank"><i class="fa fa-fw fa-vimeo"></i></a></li>
          <li><a href="https://www.facebook.com/HumbleRootsMedia/" target="_blank"><i class="fa fa-fw fa-facebook"></i></a></li>
        </ul>
      </div>
    </div>

  </aside>
</main>
<?php
  get_footer();
