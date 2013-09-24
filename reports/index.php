<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
switch($report){
	
	case 'missingRunners':
	break;
	
	case 'twoMileResults':
	break;
	
	case 'halfMileResults':
	break;
	
	case 'tenKResults':
	break;
	
	case 'editCatigories':
		require 'raceCat.php';
	break;
}