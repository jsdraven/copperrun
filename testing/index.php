<?php

define('dbUser', 'copperrun');
define('dbPass', 'copperrun');
define('dbHost', 'localhost');
define('dbName', 'copperrun');

function DbConnection($query){

    $DB_User = constant('dbUser');
    $DB_Password = constant('dbPass');
    $DB_Host = constant('dbHost');
    $DB_Name = constant('dbName');
    $copperrun = mysqli_connect($DB_Host, $DB_User, $DB_Password, $DB_Name);
    $result = mysqli_query($copperrun, $query);
    mysqli_close($copperrun);
    return $result;


}

function raceCatArray(){
    //i will create an array based on stored age ranges for each gender. $Array=>raceType=>Gender=>ageRange=>RacerList.
    $year = date('Y');
    $query1 = 'SELECT * FROM raceCat WHERE year = '.$year;
    $result1 = DbConnection($query1);
    //I need to stack each age range into sepporate arrays per race type/gender.
    //Knowing the race type I could search
    $items = array();
    while ($row = mysqli_fetch_array($result1)) {
     	# code...
     	foreach ($row as $key => $value) {
     		# code...
	 		if (strlen($value) > 0) {
	 			# code...
	 			$items[$key][] = $value;
	 		}	
     	}
    } 

    return $items;
}
$result = raceCatArray();

print_r($result);