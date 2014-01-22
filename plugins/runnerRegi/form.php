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
VALUES ('$fname', '$lname', '$fm', '$age', '$bib', '$date', '0_0:0_0:0_0')
SQL;
DbConnection($query);
$lastSubmit = "Name: $fname $lname, Gender $fm, Age: $age, and Bib: $bib";