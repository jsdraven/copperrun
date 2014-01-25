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
$query =<<<EOT
INSERT INTO runners (FName, LName, Gender, Age, Bib, Date, TenTwoHalf)
VALUES ('$fname', '$lname', '$fm', '$age', '$bib', '$date', '0:0:0')
EOT;
$result = DbConnection($query);
//after insert we will need to run another fuction to come up with the runners category.
$getRunner =<<<EOT
SELECT * FROM runners WHERE FName = '$fname' AND LName = '$lname' AND Bib = '$bib' AND Date = '$date'
EOT;
$gotRunner = DbConnection($getRunner);

$runner = mysqli_fetch_object($gotRunner);
$string = setCat($runner);
$sql =<<<EOT
UPDATE runners SET TenTwoHalf = '$string' WHERE ID = $runner->id
EOT;

DbConnection($sql);

$lastSubmit = "Name: $fname $lname, Gender $fm, Age: $age, and Bib: $bib";