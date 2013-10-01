<?php
$option = $_POST['race'];
$bib = $_POST['bib'];
$place = $_POST['place'];

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

$lastSubmit = "<p>Last input was bib $bib and their place is $place</p>";