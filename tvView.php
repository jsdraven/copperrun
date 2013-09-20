<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/tvView.php'){
    die("Not allowed back here!");
}
$body .= "
<div id='myDiv'><h2>Loading the race data...</h2></div>
";
