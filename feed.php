<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/feed.php'){
    die("Not allowed back here!");
}
require 'functions.php';
switch($_GET['feed']){
	case 'rSearch':
		if (isset($_GET['bnumber']) && $_GET['bnumber'] > 0 && strlen($_GET['fname']) <= 0) {
			# code...
			$bnumber = $_GET['bnumber'];
			echo "Race Search Result Page! bnumber= $bnumber";
		}elseif (isset($_GET['fname']) && strlen($_GET['fname']) > 0 && $_GET['bnumber'] <= 0) {
			# code...
			$fname = $_GET['fname'];
			echo "Race Search Result Page! fname = $fname";
		}elseif (!isset($_GET['fname']) && !isset($_GET['bnumber'])){
			echo "Race Search Result Page!";
		}else{
			$bnumber = $_GET['bnumber'];
			$fname = $_GET['fname'];
			echo "Race Search Result Page! bnumber= $bnumber && fname= $fname";
		}	
	break;
	case 'tvFeed':
		echo "TV Feed Result Page!";
	break;
}