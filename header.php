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

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/">
            <img id="brand-image" src="<?php echo get_template_directory_uri(); ?>/images/humble-logo.png">
              <div>Welcome to</div>
              <div>Humble Roots Media</div>
          </a>
      </div>
      <div class="col-sm-6">
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/clientele">Clientele</a></li>
            <li><a href="/humblethoughts">Humble Thoughts</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
      </div>
    </nav>
