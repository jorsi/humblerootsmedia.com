<?php
  get_header();
  $humble = get_page_by_title( 'Humble Thoughts' );

  //The Query
  global $query_string;

  $query_args = explode("&", $query_string);
  $search_query = array(
    'post_type'=>'post',
    'post_status'=>'publish'
  );

  if( strlen($query_string) > 0 ) {
  	foreach($query_args as $key => $string) {
  		$query_split = explode("=", $string);
  		$search_query[$query_split[0]] = urldecode($query_split[1]);
  	} // foreach
  } //if

  // Search again to keep query
  $search = new WP_Query($search_query);
  $results = $search->found_posts;
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  var_dump($query_string);
?>

<div class="nav-pad"></div>
<main id="main">
  <div class="container-md humble-header">
      <h1 class="humble-title"><?php echo stripslashes( get_post_meta( $humble->ID, 'humblerootsmedia_splash-title', true ) ); ?></h1>
      <h3 class="splash-tagline black"><?php echo stripslashes( get_post_meta(  $humble->ID, 'humblerootsmedia_splash-tagline', true ) ); ?></h3>
      <div><?php get_search_form(); ?></div>
      <div>Found <?php echo $results; ?> results.</div>
  </div>
  <div class="container-lg">
    <section class="blog-posts">
      <!-- Start the Loop. -->
      <?php
        if ( $search->have_posts() ) : while ( $search->have_posts() ) : $search->the_post(); ?>
          <section class="post-summary">
            <div class="container-md">
            	<h2 class="post-title text-center">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
              </h2>
              <p class="post-metadata text-center">
                <?php
                  $categories = get_the_category();
                  echo 'Posted in ';
                  foreach ($categories as $category) {
                    echo $category->name . ' ';
                  }
                  echo 'on ';
                  the_time('F jS, Y');
                  echo ' by ';
                  the_author(); ?>
              </p>

                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img class="post-image block-center" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>"></a>

            	<article class="post-entry">
            		<?php the_content('<span class="ghost">Read More</div>'); ?>
            	</article>
            </div>
          </section>

        <?php
          endwhile;
          // pager
          if( $search->max_num_pages > 1 ) : ?>
              <nav class="pager">
              <?php
              if($search_query['paged'] > 1) : ?>
                <div class="pager-col">
                  <a class="pager-link" href="<?php echo '/?s=' . $search_query['s'] . '&paged=' . ($search_query['paged'] - 1); ?>"><i class="fa fa-fw fa-angle-left"></i> Previous Page</a>
                </div>
              <?php endif;

              for ($i = 1; $i <= $search->max_num_pages; $i++) : ?>
                  <a class="pager-link <?php if ($i == $search_query['paged']) echo 'current-page'; ?>" href="<?php echo '/?s=' . $search_query['s'] . '&paged=' . $i; ?>"><?php echo $i; ?></a>

              <?php endfor;
              if($paged != $search->max_num_pages) : ?>
                <div class="pager-col">
                  <a class="pager-link" href="<?php echo '/?s=' . $search_query['s'] . '&paged=' . ($search_query['paged'] + 1); ?>"> Next Page <i class="fa fa-fw fa-angle-right"></i></a>
                </div>
              <?php endif; ?>
            </nav>
        <?php endif;

          wp_reset_postdata();
          else :
        ?>
      	   <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </section>

    <aside class="break text-center">
      <div class="container-md">
        <p><?php echo stripslashes( get_post_meta($postid, 'humblerootsmedia_outro-text', true ) ); ?></p>
        <p>
          <a href="/contact">Grow with us.</a>
        </p>
      </div>
    </aside>
  </div>
</main>

<?php
  get_footer();
