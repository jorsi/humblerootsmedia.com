<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="<?php echo get_bloginfo( 'author' ); ?>">

	<title><?php echo get_bloginfo(); ?></title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
</head>
  <body id="top" <?php body_class( $class ); ?>>

    <nav class="nav nav-mobile">
      <div class="container clearfix">
        <a class="brand" href="/">
          <img class="brand-image" src="<?php echo get_template_directory_uri(); ?>/images/humble-logo.png">
          <div class="humblerootsmedia">Humble Roots Media</div>
        </a>
        <i class="menu fa fa-fw fa-bars"></i>
        <?php
          if ( has_nav_menu( 'pages' ) ) {
              wp_nav_menu( array(
                'theme_location' => 'pages',
                'menu_class' => 'links'
              ) );
            }
        ?>
      </div>
    </nav>

    <nav class="nav nav-desktop">
      <div class="container-md">
        <div class="row">
          <div class="col-half">
            <div class="container-sm">
              <div class="row">
                <a href="/">
                  <div class="col">
                    <img class="brand-image" src="<?php echo get_template_directory_uri(); ?>/images/humble-logo.png">
                  </div>
                  <div class="col brand-name">
                    <div class="humblerootsmedia">Humble Roots Media</div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-half">
            <?php
              if ( has_nav_menu( 'pages' ) ) {
									wp_nav_menu( array(
                    'theme_location' => 'pages',
                    'menu_class' => 'links'
                  ) );
								}
            ?>
          </div>
        </div>
      </div>
    </nav>
