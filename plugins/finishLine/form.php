<?php
$option = $_POST['race'];
$bib = $_POST['bib'];
$place = $_POST['place'];

switch ($option) {
	case 'half':
		# code...
		$half = ' selected';
		$raceType = 'HalfMile';
		$index = 2;
		break;
	case 'tenk':
		$tenk = ' selected';
		$raceType = 'TenK';
		$index = 0;
		break;
	case 'two':
		# code...
		$two = ' selected';
		$raceType = 'TwoMile';
		$index = 1;
		break;
}

$raceTypeC = $raceType.'OverAll';
$sql =<<<SQL
UPDATE `copperrun`.`runners`
SET
`$raceTypeC` = '$place',
WHERE `Bib` = '$bib'

SQL;

$result = DbConnection($sql);


$lastSubmit = "<p>Last input was bib $bib and their place is $place</p>";