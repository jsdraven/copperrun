<?php
//DB Settings, easy to find. 
define('dbUser', 'copperrun');
define('dbPass', 'copperrun');
define('dbHost', 'localhost');
define('dbname', 'copperrun');
function DbConnection($query){

    $DB_User = constant('dbUser');
    $DB_Password = constant('dbPass');
    $DB_Host = constant('dbHost');
    $DB_Name = constant('dbname');
    $copperrun = mysqli_connect($DB_Host, $DB_User, $DB_Password, $DB_Name);
    $result = mysqli_query($copperrun, $query);
    if(!$result){
        $end = "MySQL Failed to comply: ".mysqli_error($copperrun);
    }else{
        $end = $result;
    }
    mysqli_close($copperrun);
    return $end;
}

$sql =<<<SQL
SELECT * FROM racecat WHERE TenKF > 0
SQL;

$result = DbConnection($sql);
$resultArray = mysqli_fetch_assoc($result);
$count = count($resultArray);
$place = 1;
$sample = 1;
for ($i=1; $i < ($count+1) ; $i++) { 
	# code...
	$topAge = $resultArray[$i]['TenKF'];
	$sql = "SELECT * FROM runners WHERE TenK > 0 AND Gender = 'F' AND Age < $topAge";
	$runners = DbConnection($sql);
	while ($runner = mysqli_fetch_object($$runners)) {
		# code...
		$catID = $i - 1;
		if ($i != $sample) {
			# code...
			$place = 1;
		}
		$TenTwoHalf = "0_0:"$catID."_".$place.":0_0";
		$sql1 = "UPDATE runners SET TenTwoHalf = $TenTwoHalf"
	}


}

$raceList = explode(":", $sample);
var_dump($raceList);

