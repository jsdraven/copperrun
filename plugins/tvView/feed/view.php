<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
    ?>
<html>
	<header>

	</header>
	<body>
<?php
$curSeconds=date("s");
$displayRace=2;
if ($curSeconds < 21) {
	$displayRace=0;
} elseif ($curSeconds > 20 && $curSeconds < 41) {
	$displayRace=1;
}
$races=array('TenK','TwoMile','HalfMile');

$currentRace=$races[$displayRace];
$raceGender=array("Male","Female");
foreach ($raceGender as $gender) {


?>
		<table style="width: 550px; float: left; margin: .5em">
			<thead>
				<tr>
					<td colspan="4"><?php echo $currentRace . ' - ' . $gender ?></td>
				</tr>
				<tr>
					<td style="width: 30px;">Place:</td><td style="width: 90px">Time:</td>
					<td style="width: 30px">Bib:</td><td>Name:</td>
				</tr>
			</thead>
			<tbody>
<?php



?>
			</tbody>
	</body>
</html>

<?php
}

function displayTableResults($raceType, $gender) {
	//if age=0, then this function will output all of the racers, regardless of age in one sorted variable.
	//the output is: time | bib | first name | last name | Age
	//sorted in order of time. 
	$tvData = raceCatArray();
	$ranking='';
	foreach ($tvData[$raceType][$gender] as $age=>$value) {
		foreach($value as $person) {
			$ranking[]=$person[$raceType].'|'.$person['Bib'].'|'.$person['FName'].'|'.$person['LName'].'|'.$person['Age'];
		}
	}

	sort($ranking);
	return $ranking;
}