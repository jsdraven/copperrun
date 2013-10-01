<?php
$path = 'plugins/'.$_POST['form'];
if (is_dir($path)) {
        require $path.'/form.php';
    }