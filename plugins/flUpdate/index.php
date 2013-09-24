<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
require 'view.php';