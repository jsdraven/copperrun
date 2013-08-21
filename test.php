<?php


function timeKey($time){
        $time_parts = explode(':', $time);
        $more_parts = explode('.', end($time_parts));
        $seconds = $more_parts['0'];
        $milliseconds = $more_parts['1'];
        $minutes = prev($time_parts);
        $hours = prev($time_parts);
        $time_number = $milliseconds+($seconds*100)+($minutes*60*100)+($hours*60*60*100);
        return $time_number;
}

function listing ($filler, $type, $count){
    $fillerf_r = "<table class=\"copperrun\">\n";
    $fillerm_r = "<table class=\"copperrun\">\n";
    $yr = date('Y');
    switch($type){
        case 'halfmile':
            $fillerf_r .= "<caption>$yr Women's Half Mile with a total of $count runners</caption>\n";
            $fillerm_r .= "<caption>$yr Men's Half Mile with a total of $count runners</caption>\n";
            break;
        case 'twomile':
            $fillerf_r .= "<caption>$yr Women's Two Mile with a total of $count runners</caption>\n";
            $fillerm_r .= "<caption>$yr Men's Two Mile with a total of $count runners</caption>\n";
            break;
        case 'tenk':
            $fillerf_r .= "<caption>$yr Women's Ten K with a total of $count runners</caption>\n";
            $fillerm_r .= "<caption>$yr Men's Ten K with a total of $count runners</caption>\n";
            break;
    }
    ksort($filler);
    reset($filler);
    $fillerf_r .= "<thead><tr><td>Place</td><td>Last, First Name</td><td>Age</td><td>Bib</tb><td>Time</td></tr></thead>\n";
    $fillerm_r .= "<thead><tr><td>Place</td><td>Last, First Name</td><td>Age</td><td>Bib</tb><td>Time</td></tr></thead>\n";
    $place_m = 1;
    $place_f = 1;
    while (list($key, $val) = each($filler)){
        $fname = $val['FName'];
        $lname = $val['LName'];
        $bib = $val['Bib'];
        $age = $val['Age'];
        $gender = $val['Gender'];
        $time = $val['Time'];
        if($gender == 'F'){
            $fillerf_r .= "<tr><td>$place_f</td><td>$lname, $fname</td><td>$age</td<td>$bib</td>><td>$time</td></tr>\n";
            $place_f++;
        }else{
            $fillerm_r .= "<tr><td>$place_m</td><td>$lname, $fname</td><td>$age</td><td>$bib</td><td>$time</td></tr>\n";
            $place_m++;
        }
    }
    $fillerf_r .= "</table>\n";
    $fillerm_r .= "</table>\n";
    $filler_r['f'] = $fillerf_r;
    $filler_r['m'] = $fillerm_r;
    return $filler_r;
}
if(!isset($max)){
    $max = 100;
    $min = 1;
}
$date = date("Y");
$copperrun = mysql_connect('localhost', 'root', '');
mysql_selectdb('copperrun', $copperrun);
$result = mysql_query("SELECT * FROM runners WHERE Date = '$date' AND Age BETWEEN $min AND $max");



$totalcount = '';
$halfmile_runners = '';
$twomile_runners = '';
$tenk_runners = '';
$TenK_count = '';
$TwoMile_count = '';
$HalfMile_count = '';
$halfmile = array();
$twomile = array();
$tenk = array();

    while ($row = mysql_fetch_array($result)){
        if ($row['HalfMile'] > 0){
            $key = timeKey($row['HalfMile']);
            $halfmile[$key]['Time'] = $row['HalfMile'];
            $halfmile[$key]['FName'] = $row['FName'];
            $halfmile[$key]['LName'] = $row['LName'];
            $halfmile[$key]['Age'] = $row['Age'];
            $halfmile[$key]['Gender'] = $row['Gender'];
            $halfmile[$key]['Bib'] = $row['Bib'];
            $halfmile_runners++;

        }
        elseif($row['TwoMile'] > 0){

            $key = timeKey($row['TwoMile']);
            $twomile[$key]['Time'] = $row['TwoMile'];
            $twomile[$key]['FName'] = $row['FName'];
            $twomile[$key]['LName'] = $row['LName'];
            $twomile[$key]['Age'] = $row['Age'];
            $twomile[$key]['Gender'] = $row['Gender'];
            $twomile[$key]['Bib'] = $row['Bib'];
            $twomile_runners++;
        }
        elseif($row['TenK'] > 0){

            $key = timeKey($row['TenK']);
            $tenk[$key]['Time'] = $row['TenK'];
            $tenk[$key]['FName'] = $row['FName'];
            $tenk[$key]['LName'] = $row['LName'];
            $tenk[$key]['Age'] = $row['Age'];
            $tenk[$key]['Gender'] = $row['Gender'];
            $tenk[$key]['Bib'] = $row['Bib'];
            $tenk_runners++;

        }
        $totalcount++;
        if($row['Bib'] < 100){
            $TwoMile_count++;
        }elseif($row['Bib'] < 200){
            $TenK_count++;
        }else{
            $HalfMile_count++;
        }
    }

if (count($halfmile)){

    $halfmiler = listing($halfmile, 'halfmile', $halfmile_runners);

}
if(count($twomile)){

    $twomiler = listing($twomile, 'twomile', $twomile_runners);

}
if (count($tenk)){

    $tenkr = listing($tenk, 'tenk', $tenk_runners);

}
?>

<table>
    <tr>
        <td>
            <?php echo $halfmiler['f']; ?>
        </td>
        <td>
            <?php echo $halfmiler['m']; ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $twomiler['f']; ?>
        </td>
        <td>
            <?php echo $twomiler['m']; ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $tenkr['f']; ?>
        </td>
        <td>
            <?php echo $tenkr['m']; ?>
        </td>
    </tr>
</table>


