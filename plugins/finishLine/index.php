<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
if (isset($form)) {
	# code...
	require 'form.php';
}
require 'view.php';