<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$date = date('Y');
$sql = "SELECT * FROM raceCat WHERE year=$date";
$results = DbConnection($sql);
$tenkf = "";
$halfmilef = "";
$twomilef = "";
$tenkm = "";
$halfmilem = "";
$twomilem = "";
foreach ($results as $key => $value) {
	# code...
	if (strlen($value['TwoMileF']) > 0) {
		# code...
		$type = 'TwoMileF';
		$item = $value[$type];
		$twomilef .= "<tr><td><label>$item<input type='submit' hidden='true' name='$type' value='$item'></label></td></tr>\n";
	}
	if (strlen($value['TwoMileM']) > 0) {
		# code...
		$type = 'TwoMileM';
		$item = $value[$type];
		$twomilem .= "<tr><td><label>$item<input type='submit' hidden='true' name='$type' value='$item'></label></td></tr>\n";				
	}
	if (strlen($value['HalfMileF']) > 0) {
		# code...
		$item = $value['HalfMileF'];
		$halfmilef .= "<tr><td>$item</td></tr>";
	}
	if (strlen($value['HalfMileM']) > 0) {
		# code...
		$item = $value['HalfMileM'];
		$halfmilem .= "<tr><td>$item</td></tr>";
	}
	if (strlen($value['TenKF']) > 0) {
		# code...
		$item = $value['TenKF'];
		$tenkf .= "<tr><td>$item</td></tr>";
	}
	if (strlen($value['TenKM']) > 0) {
		# code...
		$item = $value['TenKM'];
		$tenkm .= "<tr><td>$item</td></tr>";
	}
}
require 'view.php';