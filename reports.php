<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/reports.php'){
    die("Not allowed back here!");
}
require 'functions.php';
switch($report){
	case 'missingRunners':
	break;
	case 'twoMileResults':
	break;
	case 'halfMileResults':
	break;
	case 'tenKResults':
	break;
}