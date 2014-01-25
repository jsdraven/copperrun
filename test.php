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


$runner = new stdClass;
$runner->Gender = 'M';
$runner->Age = 32;



function setCat($runner){

    //this creates a string to be stored within a runners record showing the race catigory ids they belong to under all race types for search ability and reporting.
    $catArray = array();
    

$year = date('Y');
    for ($i=0; $i < 3; $i++) { 
        # code...
        switch ($i) {
            case 0:
                # code...
                $catType = 'TenK';
                break;
            case 1:
                # code...
                $catType = 'TwoMile';
                break;
            case 2:
                # code...
                $catType = 'HalfMile';
                break;
        }
        $field = $catType.$runner->Gender;
        $sql =<<<EOT
SELECT * FROM racecat WHERE $field > 0 AND $field < $runner->Age AND year = $year
EOT;
        $raceCatR = DbConnection($sql);
        $recordID = $raceCatR->num_rows - 1;
        $sample = mysqli_fetch_object($raceCatR);
        $raceCatR->data_seek($recordID);
        $catArray[$catType] = $sample->id;

    }
    $string = $catArray['TenK'].':'.$catArray['TwoMile'].':'.$catArray['HalfMile'];
    return $string;
}
$result = setCat($runner);
var_dump($result);