
<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/functions.php'){
    die("Not allowed back here!");
}
//var is set so to display credit on public sites.
$programingCredit = "<h3>And programing is brought to you by Mother Lode Makers</h3>";

/*
**
** What we have here is a set of all functions. 
**
*/
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
function DbConnection($query, $table){
    $copperrun = mysql_connect('localhost', 'root', '');
    mysql_selectdb($table, $copperrun);
    $result = mysql_query($query);
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
function getRinfo($id){
    $result['fname'] = 'Justin';
    $result['bib'] = '123';
    return $result;
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
    $info['0']['id'] = 12;
    $info['0']['fname'] = "John";
    $info['0']['bib'] = 123;
    $info['0']['time'] = '1:00:01.23';

    $info['1']['id'] = 12;
    $info['1']['fname'] = "Jim";
    $info['1']['bib'] = 123;
    $info['1']['time'] = '1:00:02.23';

    $info['2']['id'] = 12;
    $info['2']['fname'] = "John";
    $info['2']['bib'] = 123;
    $info['2']['time'] = '1:00:10.23';

    $info['3']['id'] = 12;
    $info['3']['fname'] = "John";
    $info['3']['bib'] = 123;
    $info['3']['time'] = '1:01:01.23';

    $info['4']['id'] = 12;
    $info['4']['fname'] = "John";
    $info['4']['bib'] = 123;
    $info['4']['time'] = '1:16:01.23';
}
function rSearchList($items){
    
}