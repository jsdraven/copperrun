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


function raceCatArray(){
    //i will create an array based on stored age ranges for each gender. $Array=>raceType=>Gender=>ageRange=>RacerList.
    $year = date('Y');
    $query1 = 'SELECT * FROM raceCat WHERE year = '.$year;
    $result1 = DbConnection($query1);
    //I need to stack each age range into sepporate arrays per race type/gender.
    //Knowing the race type I could search

//All of this is no longer valid and needs rewriting.


    $items = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        # code...
        foreach ($row as $key => $value) {
            # code...
            if (strlen($value) > 0 && $key == 'id' && $key != 'year') {
                # code...
                $items[$key][] = $value;
            }   
        }
    }
var_dump($items);
    /*$raceListings = array();
    foreach ($items as $key => $part) {
            # code...
            $types = $key;
        foreach ($part as $key => $value) {
            # code...
            $strCount = strlen($types) -1;
            $typeParts = str_split($types, $strCount);
            $type = $typeParts['0'];
            $gender = $typeParts['1'];
            $ageRange = explode('-', $value);
            $ageStart = $ageRange['0'];
            $ageStop = $ageRange['1'];
            $sql = "SELECT * FROM runners WHERE $type > 0 And Gender = '$gender' AND Age BETWEEN $ageStart AND $ageStop ORDER BY $type ASC";
            
            $result = DbConnection($sql);
            $records = mysqli_num_rows($result);
            for ($i=0; $i < $records; $i++) { 
                # code...
                $row = mysqli_fetch_assoc($result);
                $raceListings[$type][$gender][$value][] = $row;
                mysqli_field_seek($result, $i);
            }
            mysqli_free_result($result);  
        }            
    }*/
    //return $raceListings;
}

raceCatArray();
