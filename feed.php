<?php
$lock = 'Key';
require 'protected/functions.php';
if (isset($_GET['feed'])) {
	# code...
	$path = 'plugins/'.$_GET['feed'].'/feed';
	if (is_dir($path)) {
	        require $path.'/index.php';
	    }
}
