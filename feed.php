<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/feed.php'){
    die("Not allowed back here!");
}
require 'functions.php';
switch($_GET['feed']){
	case 'rSearch':
		if (isset($_GET['id']) && $_GET['id'] > 0) {
				# code...
			$info = rFeed($_GET['id'])
			//array shift pops the first element into the var removing it from the rest of the array.
			$oPlace = array_shift($info);
			$cPlace = array_shift($info);
			foreach ($info as $key => $value) {
				# code...
			}
			//I will need to format the data with a foreach after I pop the place key from the array only leaving the racers list.
			}else{
				echo "Sorry captain just can't do it. Something went wrong!";
			}	
	break;
	case 'tvFeed':
		echo "TV Feed Result Page!";
	break;
}