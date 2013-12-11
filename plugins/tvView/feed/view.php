<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
    ?>
<html>
	<header>

	</header>
	<body>
		<table width="100%">
			<thead>
				<tr>
					<td colspan="2">Half Mile</td><td colspan="2">Two Mile</td><td colspan="2">10K</td>
				</tr>
				<tr>
					<td>Male</td><td>Female</td><td>Male</td><td>Female</td><td>Male</td><td>Female</td>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
		<pre>
<?php 
$tvData=raceCatArray(); 
$type='TenK';
$gender='F';
echo "$type ---- $gender\n";
$ranking=array();
foreach ($tvData[$type][$gender] as $entries) {
	$tempdata = $entries;
	foreach ($tempdata as $runnerinfo) {
		$ranking[] = $runnerinfo[$type].','.$runnerinfo['FName'].','.$runnerinfo['LName'];
//		echo $runnerinfo[$type].','.$runnerinfo['FName'].','.$runnerinfo['LName'];
	}
	sort($ranking);
	foreach ($ranking as $runners) {
		echo $runners . "\n";
	}
}

?>
		</pre>
	</body>
</html>