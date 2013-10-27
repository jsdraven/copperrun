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
    while ($row = mysqli_fetch_assoc($result1)) {
     	# code...
     	foreach ($row as $key => $value) {
     		# code...
	 		if (strlen($value) > 0 && $key != 'id' && $key != 'year') {
	 			# code...
	 			$items[$key][] = $value;
	 		}	
     	}
    } 
    $testing = '';
    foreach ($items as $key => $part) {
            # code...
            $types = $key;
        foreach ($part as $key => $value) {
            # code...
            if ($types == 'TwoMileF' || $types == 'HalfMileF' || $types == 'TenKF') {
                # code...
                $typeParts = explode('F', $types);
                $type = $typeParts['0'];
                $gender = "F";
            }else{
                $typeParts = explode("M", $types);
                $type = $typeParts['0'];
                $gender = 'M';
            }
            $ageRange = explode('-', $value);
            $ageStart = $ageRange['0'];
            $ageStop = $ageRange['1'];
            $sql = "SELECT * FROM runners WHERE $type > 0 And Gender = '$gender' AND Age BETWEEN $ageStart AND $ageStop ORDER BY $type ASC";
            
            $testing[] = DbConnection($sql);
            
        }            
    }
    return $testing;
}
$result = raceCatArray();
while ($row = $result) {
    # code...
    
echo "<pre>\n";
print_r($result);
echo "</pre>";
}