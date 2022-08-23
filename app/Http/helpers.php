<?php

function get_result($mark)
{
    if ($mark > 30) {
        $result = 'passed';
    } else {
        $result = 'failed';
    }

    return $result;
}
