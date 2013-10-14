<?php

$option = $_POST['race'];
$place = $_POST['place'];
$time = $_POST['time'];

$lastSubmit = "Last submit was place $place with a time of $time";
switch ($option) {
	case 'half':
		# code...
		$half = ' selected';
		break;
	case 'tenk':
		$tenk = ' selected';
		break;
	case 'two':
		# code...
		$two = ' selected';
		break;
}