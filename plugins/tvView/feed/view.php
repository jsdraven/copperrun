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
	$fRanking=displayTableResults($currentRace, 'F');

?>
		<table style="width: 450px; float: left;">
			<thead>
				<tr>
					<td colspan="3"><?php echo $currentRace; ?> - Female</td>
				</tr>
				<tr>
					<td style="width: 80px;">Time</td><td style="width:70px">Bib</td><td>Name</td>
				</tr>
			</thead>
			<tbody>
<?php
	foreach ($fRanking as $items) {
		$out=explode("|", $items);
		echo "<tr><td>$out[0]</td><td>$out[1]</td><td>$out[2] $out[3]</td></tr>";
	}
	$mRanking=displayTableResults($currentRace, 'M');
?>
			</tbody>
		</table>

		<table style="width: 450px; float: left; margin-left: 25px">
			<thead>
				<tr>
					<td colspan="3"><?php echo $currentRace; ?> - Male</td>
				</tr>
				<tr>
					<td>Time</td><td>Bib</td><td>Name</td>
				</tr>
			</thead>
			<tbody>
<?php
	foreach ($mRanking as $items) {
		$out=explode("|", $items);
		echo "<tr><td>$out[0]</td><td>$out[1]</td><td>$out[2] $out[3]</td></tr>";
	}
?>
			</tbody>
	</body>
</html>

<?php


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