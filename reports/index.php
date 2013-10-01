<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
if (isset($report)) {
	# code...
	$viewReport = 'reports/rViews/'.$report;
	if (is_dir($viewReport)) {
	        require $viewReport.'/index.php';
	    }
}