<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/tvFeed.php'){
    die("Not allowed back here!");
}
require 'functions.php';
echo "<h1>HDTV Support brought to you by ....</h1>";
echo $programingCredit;