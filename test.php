<?php

function timeToSeconds ($time){
    list($hours, $mins, $secs) = explode(':', $time);
    $seconds = ($hours * 3600)+($mins * 60)+ $secs;
    return $seconds;
}

echo timeToSeconds('2:30:42.67');