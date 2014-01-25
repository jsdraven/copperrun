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
    $today = date("m/d/Y");
    $races = array();
    $query1 = 'SELECT * FROM raceCat WHERE year = '.$year;
    $result1 = DbConnection($query1);
    //I need to stack each age range into sepporate arrays per race type/gender.
    //Knowing the race type I could search

//All of this is no longer valid and needs rewriting.


    $items = array();
    while ($row = mysqli_fetch_object($result1)) {
        # code...
        if (strlen($row->TenKF) > 0) {
            # code...
            $items['TenK']['F'][] = $row->id;
        }elseif (strlen($row->TenKM) > 0) {
            # code...
            $items['TenK']['M'][] = $row->id;
        }elseif (strlen($row->TwoMileF) > 0) {
            # code...
            $items['TwoMile']['F'][] = $row->id;
        }elseif (strlen($row->TwoMileM) > 0) {
            # code...
            $items['TwoMile']['M'][] = $row->id;
        }elseif (strlen($row->HalfMileF) > 0) {
            # code...
            $items['HalfMile']['F'][] = $row->id;
        }elseif (strlen($row->HalfMileM) > 0) {
            # code...
            $items['HalfMile']['M'][] = $row->id;
        }
    }
    $raceListings = array();
    foreach ($items as $type => $genders) {
        # code...
        $races[$type] = array();
        $oPlaceField = $type.'OverAll';
        foreach ($genders as $gender => $catID) {
            # code...
            $races[$type][$gender] = array();
            foreach ($catID as $id) {
                # code...
                
                $races[$type][$gender][$id] = array();
                switch ($type) {
                    case 'TenK':
                        # code...
                        $catField = $id.":%:%";
                        break;
                    case 'TwoMile':
                        # code...
                        $catField = '%:'.$id.':%';
                        break;
                    case 'HalfMile':
                        # code...
                        $catField = '%:%:'.$id;
                }
                $sql =<<<SQL
SELECT * FROM runners WHERE Date = '$today' AND $oPlaceField > 0 AND TenTwoHalf LIKE '$catField'
SQL;
                $results = DbConnection($sql);
                $races[$type][$gender][$id]['count'] = $results->num_rows;
                var_dump($races[$type][$gender][$id]['count']);
                $runners = mysqli_fetch_array($results);
                if ($runners) {
                    # code...

                    $races[$type][$gender][$id]['runners'][] = $runners;
                }

            }
        }
    }
    return $races;
}
$id = 10;
$sample = raceCatArray();
var_dump($sample['TenK']['M'][$id]);

for ($i=0; $i < $sample['TenK']['M'][$id]['count']; $i++) { 
    # code...
    //$sample;
    var_dump($sample['TenK']['M'][$id]['runners'][$i]);

}
