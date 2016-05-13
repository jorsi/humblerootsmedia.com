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
  $start = $paged * 5 - 4;
?>

<div class="nav-pad"></div>
<main id="main">
  <div class="container-md humble-header">
      <h1 class="humble-title"><?php echo stripslashes( get_post_meta( $humble->ID, 'humblerootsmedia_splash-title', true ) ); ?></h1>
      <h3 class="splash-tagline black"><?php echo stripslashes( get_post_meta(  $humble->ID, 'humblerootsmedia_splash-tagline', true ) ); ?></h3>
      <form role="search" method="get" id="searchform" class="searchform" action="/">
          <label class="screen-reader-text" for="s">Search for:</label>
          <input type="text" value="<?php echo $search_query['s']; ?>" name="s" id="s">
          <button type="submit" id="searchsubmit"><i class="fa fa-fw fa-search"></i></button>
      </form>
      <p class="search-results">
        Displaying <?php echo $start . ' to ' . (($start + 4) <= $results ? ($start + 4) : $results); ?> of <?php echo $results; ?> results.
      </p>
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
              <div class="post-metadata">
                <ul class="post-metadata-authorinfo">
                  <li class="post-metadata-author">Written by <span class="author"><a href="/author/<?php echo get_the_author(); ?>"><?php echo get_the_author(); ?></a></span></li>
                  <li class="post-metadata-time"> on <time datetime="<?php echo get_the_time('F jS, Y g:i:s'); ?>" pubdate><?php echo get_the_time('F jS, Y'); ?></time></li>

                  <?php
                  $twitter = get_the_author_meta( 'twitter' );
                  if ( $twitter ) { ?>
                    <li class="post-metadata-twitter">
                      <a href="http://www.twitter.com/<?php echo $twitter; ?>" target="_blank">
                        <i class="fa fa-fw fa-twitter"></i>@<?php echo $twitter; ?>
                      </a>
                    </li>
                  <?php }

                  $instagram = get_the_author_meta( 'instagram' );
                  if ( $instagram ) { ?>
                    <li class="post-metadata-instagram">
                      <a href="http://www.instagram.com/<?php echo $instagram; ?>" target="_blank">
                        <i class="fa fa-fw fa-instagram"></i>@<?php echo $instagram; ?>
                      </a>
                    </li>
                  <?php }

                  $facebook = get_the_author_meta( 'facebook' );
                  if ( $facebook ) { ?>
                    <li class="post-metadata-facebook">
                      <a href="http://www.facebook.com/<?php echo $facebook; ?>" target="_blank">
                        <i class="fa fa-fw fa-facebook"></i>@<?php echo $facebook; ?>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
                <ul class="post-metadata-categories">
                  <?php
                  $categories = get_the_category();
                  if ( $categories ) {
                      foreach ($categories as $category) {
                        if ( $category->name != 'Uncategorised' ) { ?>
                          <li class="post-metadata-category">
                            <a href="/category/<?php echo $category->slug; ?>">
                              <?php echo $category->name; ?>
                            </a>
                          </li>
                        <?php
                        }
                      } ?>
                  <?php } ?>
                </ul>
              </div>

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
                  <a class="pager-link" href="<?php echo '/?s=' . $search_query['s'] . '&paged=' . ($search_query['paged'] - 1); ?>"><i class="fa fa-fw fa-angle-left"></i></a>
                </div>
              <?php endif;

              for ($i = 1; $i <= $search->max_num_pages; $i++) :
                if ($i != $search_query['paged']) : ?>
                  <a class="pager-link page" href="<?php echo '/?s=' . $search_query['s'] . '&paged=' . $i; ?>">
                  <?php echo $i ?></a>
                <?php else : ?>
                  <span class="current-page"><?php echo $i ?></span>
                <?php endif;

              endfor;
              if($paged != $search->max_num_pages) : ?>
                <div class="pager-col">
                  <a class="pager-link" href="<?php echo '/?s=' . $search_query['s'] . '&paged=' . ($search_query['paged'] ? $search_query['paged'] + 1 : 2); ?>"><i class="fa fa-fw fa-angle-right"></i></a>
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
