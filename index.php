<?php

//var is set so to display credit on public sites.
$programingCredit = "<h3>And programing is brought to you by Mother Lode Makers</h3>";

//the page with the collection of functions so to be used globally if needed.
require 'functions.php';

if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
	//if it is the hosting computer they will be the only controlling admin with the panel giving them access to other features
	require 'adminPanel.php';
	require $choice;

}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.10') {
	//data entry IP is the only other computer with access to data entry not controlling at all
	require 'runners.php';

}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.15') {
	//TV Feed only IP to the TV Feed. May open up to others later as another page options. Down side you cannot make it mobile friendly very easy.
	require 'tvFeed.php';

}else{
	//all other traffic is directed to the search form to look up racers results and stats.
	require 'runnerSearch.php';
	
}
