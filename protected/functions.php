
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
define('dbname', 'copperrun');

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
    $DB_Name = constant('dbname');
    $copperrun = mysqli_connect($DB_Host, $DB_User, $DB_Password, $DB_Name);
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
/*function raceCatArray(){
    //i will create an array based on stored age ranges for each gender. $Array=>raceType=>Gender=>ageRange=>RacerList.
    $year = date('Y');
    $query1 = 'SELECT * FROM raceCat WHERE year = '.$year;
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
        $ageRange = explode('-', $value);
        $ageStart = $ageRange['0'];
        $ageStop = $ageRange['1'];
        $sql = "SELECT * FROM runners WHERE $type > 0 And Gender = \'$gender\' AND Age BETWEEN $ageStart AND $ageStop ORDER BY $type ASC";
        $testing .= $sql.'\n<br />\n';
    }

    return $testing;
}*/
function getRinfo($id){
    $items['fname'] = 'Jim';
    $items['bib'] = 110;

    return $items;
}
function rFeed($id=10){
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
    $sql = "SELECT * FROM runners WHERE id = $id";
    $result = DbConnection($sql);
   /* $info['oPlace'] = 6;
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
    $info['4']['cPlace'] = 5;*/

    return $info;
}
function formProcessor($post, $form){
    /*$form is an array. We will have the key the field name and true or false if it is required. 
    We will need to have a standardization of field names if we are to fully check the data for the required content like name is all letters an age is number etc.
    This function will return an array with errors and items values clean and original? I think I may just translate the htmlspecialchars before human readable.

    */
    //set the arrays for output
    $items = array();
    $errors = array();

    //we are using the list supplied at the form to process the POST array.
    foreach ($form as $key => $value) {
        # If the form field is required and is not found in the post then we will send error.
        if ($value == 'true' && !isset($post[$key])) {
            # code...
            $errors[$key] = 'is required.';

            //else we will move onto the next round of checking data and cleaning
        }elseif (isset($post[$key])) {
            # code...
            //Since there might be a time for optional info we will need to see if it was sent after all before we work it.
            //switch case is why we need to know ahead of time the possible field names for their associated types.
            //I will use the field name as the case selecter then within each handle the data accordingly.
            switch ($key) {
                case 'fname':
                    # code...
                        //here we will make sure content is what we want
                    break;
                
                default:
                    # code...
                    break;
            }
            //even though someone trying to send in hacking stuff may not pass our above checks I want to sanatize it anyway just in case.
            //trimed is removing newlines. extra spaces and that sort. stripslashes is doing just that removing slashes so they cannot interup our code for cross site scripts.
            //htmlspecialchars is turning everything that could be interperted by the browser as html code and turning it into plain text that will not run as code. this could 
            //be converted back into human readable later if we choose if there is an error so they dont have to fill out the hole form again. I am half tempted to check if this 
            //does need to be done and error on it.
            $trimed = trim($post[$key]);
            $stripped = stripcslashes($trimed);
            $clean = htmlspecialchars($stripped);
            //We send back the sanatized content from the POST data so we can do what we will with it.
            $items[$key] = $clean;
        }
    }
    
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
if (isset($items['bib'])) {
    # code...
    $list['bib']['source'] = 'runnerSearch';
    $list['bib']['option'] = 'id='.$items['bib'];
}else{
$list = array();

$sql = "SELECT * FROM runners WHERE FName LIKE $items['fname']";
$result = DbConnection($sql);

/*foreach ($result as $key => $value) {
    # code...
    $list[]['fname'] = 'Jim';
    $list[]['bib'] = 119;
    $list[]['id'] = 32;
}*/

/*$list['0']['fname'] = 'Jim';
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
}*/

return $result;
}
