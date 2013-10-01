
<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
//var is set so to display credit on public sites.
$programingCredit = "<h3>And programing is brought to you by<br /> Mother Lode Makers</h3>";

/*
**
** What we have here is a set of all functions. 
**
*/
//DB Settings, easy to find. 
define('dbUser', 'copperrun');
define('dbPass', 'copperrun');
define('dbHost', 'localhost');

function listing ($filler){
    $filler_r = '';
    ksort($filler);
    reset($filler);
    $place = 1;
    while (list($key, $val) = each($filler)){
        $fname = $val['FName'];
        $lname = $val['LName'];
        $bib = $val['Bib'];
        $time = $val['time'];
        if ($place < 4){

        	$filler_r .= "<tr><td><strong>$place</strong></td><td><strong>$fname</strong></td><td><strong>$lname</strong></td><td><strong>$bib</strong></td><td><strong>$time</strong></td></tr>";
        
        }else{
        	
        	$filler_r .= "<tr><td>$place</td><td>$fname</td><td>$lname</td><td>$bib</td><td>$time</td></tr>";
    	
    	}
        $place++;
    }
    return $filler_r;
}
function DbConnection($query){

    $DB_User = constant('dbUser');
    $DB_Password = constant('dbPass');
    $DB_Host = constant('dbHost');
    $copperrun = mysqli_connect($DB_Host, $DB_User, $DB_Password, 'copperrun');
    $result = mysqli_query($copperrun, $query);
    mysqli_close($copperrun);
    return $result;
}
function timeToSeconds ($time){
    list($hours, $mins, $secs) = explode(':', $time);
    $seconds = ($hours * 3600)+($mins * 60)+ $secs;
    return $seconds;
}

function publishListing ($filler, $type, $count){
    $filler_r = "<table class=\"copperrun\">\n";
    $yr = date('Y');
    switch($type){
        case 'halfmile':
            $filler_r .= "<caption>$yr Half Mile with a total of $count runners</caption>\n";
            break;
        case 'twomile':
            $filler_r .= "<caption>$yr Two Mile with a total of $count runners</caption>\n";
            break;
        case 'tenk':
            $filler_r .= "<caption>$yr Ten K with a total of $count runners</caption>\n";
            break;
    }
    $filler_r .= "<thead><tr><td>Bib</tb><td>Last, First Name</td><td>Age</td><td>Gender</td><td>Time</td></tr></thead>\n";
    while (list($key, $val) = each($filler)){
        $fname = $val['FName'];
        $lname = $val['LName'];
        $bib = $val['Bib'];
        $age = $val['Age'];
        $gender = $val['Gender'];
        $time = $val['Time'];
        $filler_r .= "<tr><td>$bib</td><td>$lname, $fname</td><td>$age</td><td>$gender</td><td>$time</td></tr>\n";
    }
    $filler_r .= "</table>\n";
    return $filler_r;
}
function raceCatArray(){
    //i will create an array based on stored age ranges for each gender. $Array=>raceType=>Gender=>ageRange=>RacerList.
    $year = date('Y');
    $query1 = 'SELECT * FROM raceCat WHERE year == '.$year;
    $result1 = DbConnection($query1);
    //I need to stack each age range into sepporate arrays per race type/gender.
    //Knowing the race type I could search 
    $testing = '';
    foreach ($result1 as $key => $value) {
        # code...
        if ($key == 'TwoMileF' || $key == 'HalfMileF' || $key == 'TenKF') {
            # code...
            $typeParts = explode('F', $key);
            $type = $typeParts['0'];
            $gender = "F";
        }else{
            $typeParts = explode("M", $key);
            $type = $typeParts['0'];
            $gender = 'M';
        }
        $ageRange = explode('-', $value)
        $ageStart = $ageRange['0'];
        $ageStop = $ageRange['1'];
        $sql = "SELECT * FROM runners WHERE $type > 0 And Gender = \'$gender\' AND Age BETWEEN $ageStart AND $ageStop ORDER BY $type ASC";
        $testing .= $sql.'\n<br />\n';
    }

    return $testing;
}
function getRinfo($id){
    $items['fname'] = 'Jim';
    $items['bib'] = 110;

    return $items;
}
function rFeed($id){
//here is where the the array will be built. I will also need to include a key for current place and its value.
    //first value in the array must be the racer's current place.
    $info = array();

/*process list
1) select * from db where ID is ID
2) user other function to create arrays for searching to find placement and IDs
3) sort by fastest to slowest within the defined group.
4) if ID current place is 1 or 2 then truncate array to 4 not 5.
5) select all needed from db to start return array ID, fname, bib, time , their place
*/
    $info['oPlace'] = 6;
    $info['cPlace'] = 2;

    //below is a pre-built array for testing and place holding.
    $info['0']['id'] = 1;
    $info['0']['fname'] = "Tod";
    $info['0']['bib'] = 123;
    $info['0']['time'] = '1:00:01.23';
    $info['0']['cPlace'] = 1;

    $info['1']['id'] = 128;
    $info['1']['fname'] = "Jim";
    $info['1']['bib'] = 110;
    $info['1']['time'] = '1:00:02.23';
    $info['1']['cPlace'] = 2;

    $info['2']['id'] = 115;
    $info['2']['fname'] = "Tim";
    $info['2']['bib'] = 124;
    $info['2']['time'] = '1:00:10.23';
    $info['2']['cPlace'] = 3;

    $info['3']['id'] = 92;
    $info['3']['fname'] = "Greg";
    $info['3']['bib'] = 116;
    $info['3']['time'] = '1:01:01.23';
    $info['3']['cPlace'] = 4;

    $info['4']['id'] = 12;
    $info['4']['fname'] = "John";
    $info['4']['bib'] = 128;
    $info['4']['time'] = '1:16:01.23';
    $info['4']['cPlace'] = 5;

    return $info;
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

$list['0']['fname'] = 'Jim';
$list['0']['bib'] = 119;
$list['0']['id'] = 32;

$list['1']['fname'] = 'Jim';
$list['1']['bib'] = 135;
$list['1']['id'] = 68;

$list['2']['fname'] = 'Jim';
$list['2']['bib'] = 104;
$list['2']['id'] = 12;

$list['3']['fname'] = 'Jim';
$list['3']['bib'] = 110;
$list['3']['id'] = 128;

$list['4']['fname'] = 'Jim';
$list['4']['bib'] = 101;
$list['4']['id'] = 9;

return $list;
}
