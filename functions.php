<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

// Require the custom options page for Humble Roots Media
require_once( 'inc/humblerootsmedia-options.php' );
require_once( 'inc/humblerootsmedia-enqueue.php' );
require_once( 'inc/humblerootsmedia-pages.php' );
require_once( 'inc/humblerootsmedia-customposts.php' );
require_once( 'inc/humblerootsmedia-admin.php' );
