<?php

require 'functions.php';
/*$year = date('Y');
$query1 = 'SELECT * FROM runners';
$query2 = 'SELECT * FROM raceCat WHERE year == '.$year;
$result1 = DbConnection($query1);
$result2 = DbConnection($query2);
print_r($result2);*/

function myInsert($stuff){

    
    $type = array_keys($stuff);
    //$fType = $type['0'].'F';
    //$mType = $type['0'].'M';
    foreach ($stuff as $key => $value) {
        # code...
        $Type['0'] = $key.'F';
        $Type['1'] = $key.'M';
        for ($i=0; $i < 2; $i++) { 
            # code...
            $sql = "INSERT INTO raceCat ($Type[$i]) VALUES($value)";
            echo "$sql<br />";
        }
        
    }
    echo "<br />";
    //$sql = "INSERT INTO raceCat ($type)";
}

$raceCats = array(
    "first"=>array(
        "TenK"=>array(
            "5-12",
            "13-19",
            "20-29",
            "30-39",
            "40-49",
            "50-59",
            "60-69",
            "70-79",
            "80-89",
        )

    ),
    "second"=>array(
        "HalfMile"=>array(
            "0-5",
            "6-7",
            "8-9",
            "10-12"
        )
    ),
    "third"=>array(
        "TwoMile"=>array(
            "6-13",
            "14-19",
            "20-29",
            "30-39",
            "40-49",
            "50-59",
            "60-69",
            "70-79",
            "80-89"
        )
    ),
);
array_walk($raceCats, "myInsert");


