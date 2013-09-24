<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/feed/index.php'){
    die("Not allowed back here!");
}

require 'protected/functions.php';


if (isset($_GET['feed'])) {
	# code...
	echo $_GET['feed'];
	$path = 'plugins/'.$_GET['feed'].'/feed';

	if (is_dir($path)) {
	        require $path.'/index.php';
	    }
}



/*switch($_GET['feed']){
	case 'rSearch':
		require 'fviews/rSearch/index.php';	
	break;
	case 'tvFeed':
		require 'fViews/tvFeed/index.php';
	break;
	case 'Lboard':
		echo "Leader board results";
	break;
	case 'raceCat':
		require 'fViews/raceCat/index.php';
	break;
}*/