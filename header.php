<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Humble Roots Media</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>

  <link href="<?php echo get_template_directory_uri(); ?>/styles/normalize.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/styles/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
</head>
  <body>

    <nav class="nav-desktop">
      <div class="container">
        <div class="row">
          <div class="col-half">
            <a href="/">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <img id="brand-image" src="<?php echo get_template_directory_uri(); ?>/images/humble-logo.png">
                  </div>
                  <div class="col">
                    <div id="welcometo">Welcome to</div>
                    <div id="humblerootsmedia">Humble Roots Media</div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-half">
            <ul class="nav-links clearfix">
              <li class="active"><a href="/clientele">Clientele</a></li>
              <li><a href="/humblethoughts">Humble Thoughts</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
