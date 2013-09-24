<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
if (isset($_GET['report'])) {
	# code...
	echo $_GET['report'];
	$path = 'rViews/'.$_GET['report'];

	if (is_dir($path)) {
	        require $path.'/index.php';
	    }
}