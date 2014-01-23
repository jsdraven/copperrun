<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$fm = $_POST['fm'];
$age = $_POST['age'];
$bib = $_POST['bib'];
$date = date("m/d/Y");
$query =<<<SQL 
INSERT INTO runners (FName, LName, Gender, Age, Bib, Date, TenTwoHalf)
VALUES ('$fname', '$lname', '$fm', '$age', '$bib', '$date', '0:0:0')
SQL;
$result = DbConnection($query);
//after insert we will need to run another fuction to come up with the runners category.
$id = $result->insert_id;
$string = setCat($id);
$sql =<<<SQL
UPDATE runners SET TenTwoHalf = '$string' WHERE ID = $id
SQL;

DbConnection($sql);

$lastSubmit = "Name: $fname $lname, Gender $fm, Age: $age, and Bib: $bib";