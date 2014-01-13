<?php

define('dbUser', 'root');
define('dbPass', '');
define('dbHost', 'localhost');
define('dbname', 'mytesting');

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
$sample = new stdClass();
$sample->name = new stdClass();
$Stuff = new stdClass();
$Stuff->tenk = new stdClass();
$Stuff->half = new stdClass();
$Stuff->two = new stdClass();

$Stuff->tenk->oPlace = 5;
$Stuff->tenk->cPlace = 1;
$Stuff->tenk->catID = 4;

$Stuff->half->oPlace = 0;
$Stuff->half->cPlace = 0;
$Stuff->half->catID = 0;

$Stuff->two->oPlace = 0;
$Stuff->two->cPlace = 0;
$Stuff->two->catID =0;

$sample->name->first = 'justin';
$sample->name->last = 'scott';
$sample->age = 32;
$sample->raceInfo = $Stuff;
$blob = serialize($Stuff);
//var_dump($blob);

/*var_dump($blob);


$blob = base64_encode($blob);
$sql = "INSERT INTO test (name, object) VALUES('Justin', '$blob')";
$insert = DbConnection($sql);
var_dump($insert);


*/


$sql2 = "SELECT * FROM test WHERE name = 'Justin'";

$result = DbConnection($sql2);
var_dump($result);

$something = mysqli_fetch_object($result);
var_dump($something);
$returnedObject = base64_decode($something->object);
var_dump($returnedObject);
$returnedObject = unserialize($returnedObject);

var_dump($returnedObject->tenk->oPlace);