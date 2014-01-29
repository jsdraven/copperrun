<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$races = array();
for ($i=0; $i < 3; $i++) { 
	# code...
	switch ($i) {
		case 0:
			# code...
			$race = 'TenK';
			break;
		case 1:
			# code...
			$race = 'HalfMile';
			break;
		case 2:
			# code...
			$race = 'TwoMile';
			break;
	}
	$overall = $race.'OverAll';
	$sql = "SELECT * FROM runners";
	$result = DbConnection($sql);

}
$body .="
Hello there!
";