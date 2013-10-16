<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
print_r($_POST);
$option = $_POST['raceType'];
$gender = $_POST['gen'];
$minAge = $_POST['minAge'];
$maxAge = $_POST['maxAge'];

switch ($option) {
	case 'halfMile':
		# code...
		$halfMile = ' selected';
		break;
	case 'tenK':
		$tenK = ' selected';
		break;
	case 'twoMile':
		# code...
		$twoMile = ' selected';
		break;
}
switch ($gender) {
	case 'male':
		# code...
		$male = ' checked';
		break;
	case 'female':
		# code...
		$female = ' checked';
		break;
}
