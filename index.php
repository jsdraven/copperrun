<html>

<?php
/*
 Things to do...
 1) Fix sorting of times cannot trust natural sort. may want to do a pop to end of array. 
    (convert time stamp into seconds then sort seconds with natural sort. will need two functions, convert time to seconds and convert seconds to time readable)
 2) Set multiple tables for results.
 3) create a pre-emptive form for traking order of incoming bib numbers.

 ages
 1-5
 6-7
 
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
        $time = $key;
        $filler_r .= "<tr><td>$place</td><td>$fname</td><td>$lname</td><td>$bib</td><td>$time</td></tr>";
        $place++;
    }
    return $filler_r;
}
function DbConnection($query){
    $copperrun = mysql_connect('localhost', 'root', '');
    mysql_selectdb('copperrun', $copperrun);
    $result = mysql_query($query);
    return $result;
}
function timeToSeconds ($time){
    list($hours, $mins, $secs) = explode(':', $time);
    $seconds = ($hours * 3600)+($mins * 60)+ $secs;
    return $seconds;
}


if(isset($_POST['form'])){
    switch ($_POST['form']){
        case 1:
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $fm = $_POST['fm'];
            $age = $_POST['age'];
            $bib = $_POST['bib'];
            $date = date("m/d/Y");
            $query = "INSERT INTO runners (FName, LName, Gender, Age, Bib, Date)
                        VALUES ('$fname', '$lname', '$fm', '$age', '$bib', '$date')";
            DbConnection($query);
            break;
        case 2:
            $bib = $_POST['bib'];
            $time = $_POST['time'];
            $query = "UPDATE runners SET HalfMile = '$time' WHERE Bib = '$bib'";
            DbConnection($query):
            break;
        case 3:
            $bib = $_POST['bib'];
            $time = $_POST['time'];
            $query = "UPDATE runners SET TwoMile = '$time' WHERE Bib = '$bib'";
            DbConnection($query):
            break;
        case 4:
            $bib = $_POST['bib'];
            $time = $_POST['time'];
            $query = "UPDATE runners SET TenK = '$time' WHERE Bib = '$bib'";
            DbConnection($query);
            break;
        case 5:
            $max = $_POST['maxAge'];
            $min = $_POST['minAge'];
            break;
    }
}
if(!isset($max)){
    $max = 100;
    $min = 1;
}
$date = date("m/d/Y");
$query = "SELECT * FROM runners WHERE Age BETWEEN $min AND $max";
$result = DbConnection($query);



$totalcount = '';
$TenK_count = '';
$TwoMile_count = '';
$HalfMile_count = '';
$halfmile_f = array();
$halfmile_m = array();
$twomile_f = array();
$twomile_m = array();
$tenk_f = array();
$tenk_m = array();

    while ($row = mysql_fetch_array($result)){
        if ($row['HalfMile'] > 0){
            if($row['Gender'] == 'F'){
                $key = $row['HalfMile'];
                $halfmile_f[$key]['FName'] = $row['FName'];
                $halfmile_f[$key]['LName'] = $row['LName'];
                $halfmile_f[$key]['Bib'] = $row['Bib'];
            }else{
                $time = $row['HalfMile'];
                $key = timeToSeconds($time);
                $halfmile_m[$key]['FName'] = $row['FName'];
                $halfmile_m[$key]['LName'] = $row['LName'];
                $halfmile_m[$key]['Bib'] = $row['Bib'];
                $halfmile_m[$key]['time'] = $time;

            }

        }
        elseif($row['TwoMile'] > 0){

             if($row['Gender'] == 'F'){
                $key = $row['TwoMile'];
                $twomile_f[$key]['FName'] = $row['FName'];
                $twomile_f[$key]['LName'] = $row['LName'];
                $twomile_f[$key]['Bib'] = $row['Bib'];
             }else{
                $key = $row['TwoMile'];
                $twomile_m[$key]['FName'] = $row['FName'];
                $twomile_m[$key]['LName'] = $row['LName'];
                $twomile_m[$key]['Bib'] = $row['Bib'];
             }

        }
        elseif($row['TenK'] > 0){

            if($row['Gender'] == 'F'){
                $key = $row['TenK'];
                $tenk_f[$key]['FName'] = $row['FName'];
                $tenk_f[$key]['LName'] = $row['LName'];
                $tenk_f[$key]['Bib'] = $row['Bib'];
            }else{
                $key = $row['TenK'];
                $tenk_m[$key]['FName'] = $row['FName'];
                $tenk_m[$key]['LName'] = $row['LName'];
                $tenk_m[$key]['Bib'] = $row['Bib'];
            }

        }else{}
        $totalcount++;
        if($row['Bib'] < 100){
            $TwoMile_count++;
        }elseif($row['Bib'] < 200){
            $TenK_count++;
        }else{
            $HalfMile_count++;
        }
    }
    echo "<br />";

if (count($halfmile_f)){

    $halfmiler_f = listing($halfmile_f);

}else{
    $halfmiler_f = '';
}
if(count($twomile_f)){

    $twomiler_f = listing($twomile_f);

}else{
    $twomiler_f = '';
}
if (count($tenk_f)){

    $tenkr_f = listing($tenk_f);

}else{
    $tenkr_f = '';
}
if (count($halfmile_m)){

    $halfmiler_m = listing($halfmile_m);

}else{
    $halfmiler_m = '';
}
if(count($twomile_m)){

    $twomiler_m = listing($twomile_m);

}else{
    $twomiler_m = '';
}
if (count($tenk_m)){

    $tenkr_m = listing($tenk_m);

}else{
    $tenkr_m = '';
}
?>
<h1>Copper Run</h1>
    <p>
        <form action="index.php" method="POST">
            First Name<input type="text" name="fname"><br />
            Last Name<input type="text" name="lname"><br />
            F / M: M<input type="radio" name="fm" value="M"> F<input type="radio" name="fm" value="F" tabindex=3><br />
            Age<input type="text" name="age"><br />
            Bib Number<input type="text" name="bib"><br />
            <input type="submit" name="runner" value="Add/Update">
            <input type="hidden" name="form" value=1>
        </form>
        Total Count of runners for today (<?php echo $totalcount; ?>) Total Two Mile (<?php echo $TwoMile_count; ?>) Total TenK (<?php echo $TenK_count; ?>) Total Half Mile (<?php echo $HalfMile_count; ?>)
    <p>
    <hr />
        Add / Update .5 Mile Time
        <form action="index.php" method="POST">
            Bib Number<input type="text" name="bib">
            Time<input type="text" name="time">
            <input type="submit" name="half" value="Add">
            <input type="hidden" name="form" value=2>
        </form>
    <p>
        Add / Update 2 Mile Time
        <form action="index.php" method="POST">
            Bib Number<input type="text" name="bib">
            Time<input type="text" name="time">
            <input type="submit" name="two" value="Add">
            <input type="hidden" name="form" value=3>
        </form>
    <p>
        Add / Update 10k Time
        <form action="index.php" method="post">
            Bib Number<input type="text" name="bib">
            Time<input type="text" name="time">
            <input type="submit" name="tenk" value="Add">
            <input type="hidden" name="form" value=4>
        </form>
    <hr />

<br />
<form action="index.php" method="post">
    <table>
        <tr>
            <td>
                <input type="text" maxlength="3" lang="4" name="minAge" value="<?php echo $min; ?>"/>
            </td>
            <td>
                <input type="text" maxlength="3" lang="4" name="maxAge" value="<?php echo $max; ?>"/>
            </td>
            <td>
                <input type="submit" value="Age Set" />
                <input type="hidden" name="form" value="5" />
            </td>
        </tr>
    </table>
</form>
<table>
    <capttion>Half Mile Result</capttion>
    <tr>
        <td>
            <table border=1>
                <caption>Women's</caption>
                <tr>
                    <td>Place</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Bib</td>
                    <td>Time</td>
                </tr>
                <?php echo $halfmiler_f; ?>
            </table>
        </td>
        <td>
            <table border=1>
                <caption>Men's</caption>
                <tr>
                    <td>Place</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Bib</td>
                    <td>Time</td>
                </tr>
                <?php echo $halfmiler_m; ?>
            </table>
        </td>
    </tr>
</table>
<br />
<table>
    <capttion>Two Mile Result</capttion>
    <tr>
        <td>
            <table border=1>
                <caption>Women's</caption>
                    <tr>
                        <td>Place</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Bib</td>
                        <td>Time</td>
                    </tr>
                    <?php echo $twomiler_f; ?>
            </table>
        </td>
        <td>
            <table border=1>
                <caption>Men's</caption>
                    <tr>
                        <td>Place</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Bib</td>
                        <td>Time</td>
                    </tr>
                    <?php echo $twomiler_m; ?>
            </table>
        </td>
    </tr>
</table>
<br />
<table>
    <capttion>Ten K Result</capttion>
    <tr>
        <td>
            <table border=1>
                <caption>Women's</caption>
                    <tr>
                        <td>Place</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Bib</td>
                        <td>Time</td>
                    </tr>
                    <?php echo $tenkr_f; ?>
            </table>
        </td>
        <td>
            <table border=1>
                <caption>Men's</caption>
                    <tr>
                        <td>Place</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Bib</td>
                        <td>Time</td>
                    </tr>
                    <?php echo $tenkr_m; ?>
            </table>
        </td>
    </tr>
</table>
<?php

?>