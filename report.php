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
    ksort($filler);
    reset($filler);
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

$date = date("m/d/Y");
$copperrun = mysql_connect('localhost', 'root', '');
mysql_selectdb('copperrun', $copperrun);
$result = mysql_query("SELECT * FROM runners");



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

echo $halfmiler."<br />\n";
echo $twomiler."<br />\n";
echo $tenkr."<br />\n";