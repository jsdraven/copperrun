<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$error = '';
$twoMile = '';
$halfMile = '';
$tenK = '';
$male = '';
$female = '';
if (isset($form)) {
	# code...
	require 'form.php';
}
require 'view.php';
