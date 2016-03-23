<?php
  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
  <div class="nav-pad"></div>
<main id="main">
  <aside class="break text-center">
    <div class="container-md">
      <p><?php echo stripslashes( get_option( 'contact_intro', 'You are only a few moments away from creating beautiful content for your next major project.' ) ); ?></p>
    </div>
  </aside>

  <section class="content contact-form">
    <div class="container-lg">
      <form method="post">
        <input type="hidden" name="action" value="contact">
        <label>
          <input type="text" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" name="name.full" value="Your Name">
        </label>
        <label>
          <input type="email" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" value="Your email" name="email">
        </label>
        <label>
          <input type="text" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" value="Your contact number" name="phone">
        </label>
        <label>
          <select name="enquiryType">
            <option selected disabled>What are you contacting us about?</option>
            <option value="message">Just leaving a message</option>
            <option value="question">I've got a question</option>
            <option value="other">Something else...</option>
          </select>
        </label>
        <label>
          <textarea name="message" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue">Tell us a bit about yourself</textarea>
        </label>
        <button type="submit">Send</button>
      </form>
    </div>
  </section>
</main>
<?php
  get_footer();
