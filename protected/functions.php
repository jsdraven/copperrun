
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

function getRCnfo($bib){

//this needs to be done after successful input

   

   
    //fetch information on a single racer
    $sql = "SELECT * FROM runners WHERE Bib = $bib";
    $result = DbConnection($sql);
    $result = mysqli_fetch_object($result);



    
}
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


//not using time for sorting will not need this any more
/*function timeToSeconds ($time){
    list($hours, $mins, $secs) = explode(':', $time);
    $seconds = ($hours * 3600)+($mins * 60)+ $secs;
    return $seconds;
}*/


//needs to be redone to support the new info 
function publishListing ($filler, $type, $count){
/*    $filler_r = "<table class=\"copperrun\">\n";
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
    return $filler_r;*/
}
function raceCatArray(){
    //i will create an array based on stored age ranges for each gender. $Array=>raceType=>Gender=>ageRange=>RacerList.
    $year = date('Y');
    $query1 = 'SELECT * FROM raceCat WHERE year = '.$year;
    $result1 = DbConnection($query1);
    //I need to stack each age range into sepporate arrays per race type/gender.
    //Knowing the race type I could search

//All of this is no longer valid and needs rewriting.


/*    $items = array();
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
    return $raceListings;*/
}

function rFeed($id=10){
//here is where the the array will be built. I will also need to include a key for current place and its value.
    //first value in the array must be the racer's current place.
    
/*process list
1) select * from db where ID is ID
2) Test for possible place
3) if not placed then report racer not placed or has not been reported yet.
    a) I may want to report who is first as a place holder until required data is in the db.
4) I can do a while for gathering the other places and putting them into an arra.
5) I will need to use another function for checking place wihtin the catigory and not just over all.
*/



    
}


/*function formProcessor($post, $form){
    /*$form is an array. We will have the key the field name and true or false if it is required. 
    We will need to have a standardization of field names if we are to fully check the data for the required content like name is all letters an age is number etc.
    This function will return an array with errors and items values clean and original? I think I may just translate the htmlspecialchars before human readable.

    */
    //set the arrays for output
    /*
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
    
}*/


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

function catObject($string){

    //I am building the category object for a given runner based on the string returned in a query from the TenTwoHalf field.
    //Below is a development of the object taking into account the futur adition of rank within the category.
    $allCat = new stdClass();
    $allCat->ten = new stdClass();
    $allCat->two = new stdClass();
    $allCat->half = new stdClass();
    //I am exploding the string into its race type parts. the name is also the given order of the race types in the array.
    $explodid = explode(':', $string);
    //$allCat->ten is a std class object. I am setting the value of cat (category) to the first record in the array.
    $allCat->ten->cat = $explodid[0];
    //$allCat->two is a std class object. I am setting the value of cat (category) to the first record in the array.
    $allCat->two->cat = $explodid[1];
    //$allCat->half is a std class object. I am setting the value of cat (category) to the first record in the array.
    $allCat->half->cat =  $explodid[2];
    return $allCat;
    
}



function raceCat($runner, $index, $raceType){
    $Date = date("m/d/Y");
    $catType = $raceType.$runner->Gender;
    $racePlace = 
    $sql =<<<EOT
    SELECT * FROM racecat WHERE $catType > 0 AND $catType < $runner->Age
EOT;
    $result = DbConnection($sql);
    $list = mysqli_fetch_object($result);
    $count = $result->num_rows -1;
   
    $record = $result->data_seek($count);
     
    $cat = $list->id;
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
    $sql1 =<<<EOT
SELECT * FROM runners WHERE TenTwoHalf LIKE '$tentwohalf' AND Date = $Date SORT BY 
EOT;
    $grouping = DbConnection($sql1);
    if ($grouping->num_rows > 0) {
        # code...
       
    }
}