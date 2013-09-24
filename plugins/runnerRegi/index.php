<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}

//Start testing zone
$totalcount = '120';
$TwoMile_count = 120;
$TenK_count = 120;
$HalfMile_count = 120;
$halfmiler_f = '';
$twomiler_f = '';
$tenkr_f = '';
$halfmiler_m = '';
$twomiler_m = '';
$tenkr_m = '';
//end testing zone



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
            DbConnection($query, 'runners');
            break;
        case 2:
            $bib = $_POST['bib'];
            $time = $_POST['time'];
            $query = "UPDATE runners SET HalfMile = '$time' WHERE Bib = '$bib'";
            DbConnection($query, 'runners');
            break;
        case 3:
            $bib = $_POST['bib'];
            $time = $_POST['time'];
            $query = "UPDATE runners SET TwoMile = '$time' WHERE Bib = '$bib'";
            DbConnection($query, 'runners');
            break;
        case 4:
            $bib = $_POST['bib'];
            $time = $_POST['time'];
            $query = "UPDATE runners SET TenK = '$time' WHERE Bib = '$bib'";
            DbConnection($query, 'runners');
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
$result = DbConnection($query, 'runners');



/*$totalcount = '';
$TenK_count = '';
$TwoMile_count = '';
$HalfMile_count = '';
$halfmile_f = array();
$halfmile_m = array();
$twomile_f = array();
$twomile_m = array();
$tenk_f = array();
$tenk_m = array();
*/
require 'view.php';
