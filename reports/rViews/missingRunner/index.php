<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$body .="
Hello there!
";