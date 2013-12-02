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
function rSearchList($items){
/*
Process for this
1) check for items in the items array
2) if bib use it for certain one result
3) select all with similar fname limit 5 to reduce loading time and clutter.
4) build array id, fname, bib. Must also include original search fname for using with more list option. 
*/
//Jim is the name we used to test with targeted bib 110. cannot use 123, 124, 116, 128.
    $list = array();

    if (isset($items['bib'])) {
        # code...
        $list['bib']['source'] = 'runnerSearch';


        $bib = $items['bib'];
        $sql = "SELECT * FROM runners WHERE Bib = '$bib'"; 
        $result = DbConnection($sql);
        $object = mysqli_fetch_object($result);
        $list['bib']['option'] = 'id='.$object->id;


    }else{
        
        $fname = $items['fname'];
        $sql = "SELECT * FROM runners WHERE FName LIKE '$fname'";
        $result = DbConnection($sql);

            $records = mysqli_num_rows($result);

            for ($i=0; $i < $records; $i++) { 
                # code...
                $row = mysqli_fetch_assoc($result);
                $list[] = $row;
                mysqli_field_seek($result, $i);
            }
            mysqli_free_result($result);

}


return $list;
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

    $raceListings = array();
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
    }
    return $raceListings;
}
function rFeed($id){
//here is where the the array will be built. I will also need to include a key for current place and its value.
    //first value in the array must be the racer's current place.
    $info = array();

/*process list
1) select * from db where ID is ID
2) Test for possible place
3) if not placed then report racer not placed or has not been reported yet.
    a) I may want to report who is first as a place holder until required data is in the db.
4) I can do a while for gathering the other places and putting them into an arra.
5) I will need to use another function for checking place wihtin the catigory and not just over all.
*/

//detect race catigory
    $year = date('Y');
    $query1 = 'SELECT * FROM raceCat WHERE year = '.$year;
    $result1 = DbConnection($query1);
    //I need to stack each age range into sepporate arrays per race type/gender.
    //Knowing the race type I could search
    $items = array();

    while ($row = mysqli_fetch_object($result1)) {
        # code...
        
    }
//end of detection
    $sql = "SELECT * FROM runners WHERE id = $id";
    $result = DbConnection($sql);




    return $info;
}

$id = 123;

$result = raceCatArray();

echo "<p><pre> \n";
print_r($result);
echo "</pre></p>";

echo "hello.".array_search("123",$result['Tenk']['M'], true);
