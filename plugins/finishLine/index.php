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
	$select =<<<SQL
SELECT * FROM `runners` WHERE `Bib` = '$bib'
SQL;

	//$result = DbConnection($select);

/*on a successfull updatre to runner record for race finishline I want to add TenTwohalf option.
I will need a function to find what race cat the runner is in. Then another to determin the place of the runner in that cat
*/

	$runner = mysqli_fetch_object($result);
	
	raceCat($runner, $index, $raceType);
	


}
}





require 'view.php';