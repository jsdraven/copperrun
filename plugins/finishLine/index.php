<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}







$half = '';
$tenk = '';
$two = '';
$lastSubmit = '';
$error = '';
if (isset($form)) {
	# code...
	require 'form.php';
	if (isset($result) && $result == TRUE) {
	# code...
	$select =<<<EOT
SELECT * FROM `runners` WHERE `Bib` = '$bib'
EOT;

	$result = DbConnection($select);

/*

*/

	$runner = mysqli_fetch_object($result);
	$racePalce = $raceType.'OverAll';
$sql =<<<EOF
	UPDATE runners SET $racePalce = $place WHERE ID = $runner->id
EOF;

}
$report = DbConnection($sql);
var_dump($report);
}





require 'view.php';