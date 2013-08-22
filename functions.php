<?php
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
function DbConnection($query){
    $copperrun = mysql_connect('localhost', 'root', 'root');
    mysql_selectdb('copperrun', $copperrun);
    $result = mysql_query($query);
    return $result;
}
function timeToSeconds ($time){
    list($hours, $mins, $secs) = explode(':', $time);
    $seconds = ($hours * 3600)+($mins * 60)+ $secs;
    return $seconds;
}