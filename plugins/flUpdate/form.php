<?php

$option = $_POST['race'];
$place = $_POST['place'];
$time = $_POST['time'];

$lastSubmit = "Last submit was place $place with a time of $time";
switch ($option) {
	case 'half':
		# code...
		$half = ' selected';
		$race = 'HalfMile';
		break;
	case 'tenk':
		$tenk = ' selected';
		$race = 'TenK';
		break;
	case 'two':
		# code...
		$two = ' selected';
		$race = 'TwoMile';
		break;
}
$fieldOverAll = $race.'OverAll';
$sql =<<<EOT
UPDATE runners SET $race = $time WHERE $fieldOverAll = $place
EOT;
 