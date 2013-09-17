<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/feed.php'){
    die("Not allowed back here!");
}

switch($_GET['feed']){
	case 'rSearch':
		echo "Race Search Result Page!";
	break;
	case 'tvFeed':
		echo "TV Feed Result Page!";
	break;
}