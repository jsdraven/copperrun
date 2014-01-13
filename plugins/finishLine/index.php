<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}







$half = '';
$tenk = '';
$two = '';
$lastSubmit = '';
$error = '';
if (isset($form)) {
	# code...
	require 'form.php';
}





require 'view.php';