<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/iViews/publish/index.php'){
    die("Not allowed back here!");
}
require 'view.php';