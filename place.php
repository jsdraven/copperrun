<?php
$lock = 'Key';
require "protected/functions.php";

$id = 2;
$place = 1;
while ($id < 75) {
	# code...
	$Stuff =<<<HTML
We are working on ID $id with a place of $place <br />
HTML;

	$sql = "UPDATE runners SET TenKPlace = $place WHERE id = $id";
	DbConnection($sql);
	echo $Stuff;
	$id++;
	$place++;
 
}
