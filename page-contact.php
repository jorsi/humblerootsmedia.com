<?php
  $status = $post->post_content;

  if ( isset($_POST['action']) ) {
    $name = $_POST['name_full'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'jonathon.orsi@gmail.com';
    $subject = 'New Email from Humble Roots Media Website';
    $msg = 'This message is being sent to you through the Humble Roots Media website.<br><br>'
          .'From: ' . $name . '<br>'
          .'Email: ' . $email . '<br>'
          .'Message: ' .$message . '<br><br>'
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
<main id="main" class="contact" style="background-image: url(<?php echo $thumb; ?>);">
  <div class="container-sm contact-container clearfix">
    <aside class="contact-text">
      <h1>Contact Us</h1>
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
</main>
<?php
  get_footer();
