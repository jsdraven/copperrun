<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
if (isset($_GET['report'])) {
	# code...
	$path = 'rViews/'.$_GET['report'];
	if (is_dir($path)) {
	        require $path.'/index.php';
	    }
}