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

$raceType = $raceType.'OverAll';
$sql =<<<SQL
UPDATE `copperrun`.`runners`
SET
`$raceType` = '$place',
WHERE `Bib` = '$bib'

SQL;

if (DbConnection($sql)) {
	# code...
	$select =<<<SQL
SELECT * FROM `runners` WHERE `Bib` = '$bib'
SQL;

	$result = DbConnection($select);
	$runner = mysqli_fetch_object($result);
	$raceCatNFO = $runner->TenTwoHalf;

	if ($raceCatNFO[$index] != getRCnfo($bib, $index)) {
		# code...
		
	}

}
$lastSubmit = "<p>Last input was bib $bib and their place is $place</p>";