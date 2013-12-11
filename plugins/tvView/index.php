<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$body .= "
<div id='myDiv'><h2>Loading the race data...</h2></div>
";
