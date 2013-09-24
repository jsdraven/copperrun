<?php
if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF'] && $_SERVER['PHP_SELF'] != ){
    die("Not allowed back here!");
}
print_r($_SERVER);