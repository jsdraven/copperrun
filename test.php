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

//static data used for triggering function.
	$select =<<<SQL
SELECT * FROM `runners` WHERE `Bib` = '125'
SQL;

	$result = DbConnection($select);
$count = $result->num_rows;
$runner = mysqli_fetch_object($result);
$index = 0;
$raceType = 'TenK';
//End of static data used for triggering function.


function raceCat($runner, $index, $raceType){
    
    $catType = $raceType.$runner->Gender;
    $sql =<<<SQL
    SELECT * FROM racecat WHERE $catType > 0 AND $catType < $runner->Age
SQL;
    $result = DbConnection($sql);
    $count = $result->num_rows - 1;
    //$list = mysqli_fetch_array($result);
    $list = $result->data_seek($count);
    var_dump($list);
    $record = $list[$count];
    $cat = $record['id'];
    switch ($index) {
        case 0:
            # code... Tenk
            $tentwohalf = '$cat:%:%';
            break;
        case 1:
            # code... Two Mile
            $tentwohalf = '%:$cat:%';
            break;
        case 2:
            # code... Half Mile
            $tentwohalf = '%:%:$cat';
            break; 
    }
    $sql1 =<<<SQL
SELECT * FROM runners WHERE TenTwoHalf LIKE '$tentwohalf' 
SQL;
	$items = DbConnection($sql);
	$racerCount = $items->num_rows - 1;
	$catPlace = $items->data_seek($racerCount);

	return $items;
	
}



$raceCatStuff = raceCat($runner, $index, $raceType);
var_dump($raceCatStuff);

