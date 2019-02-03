<?php

use reind33r\SimpleDateFormatter\SimpleDateFormatter;

function localized_date($date, $date_format=null, $time_format=null) {
    return SimpleDateFormatter::format($date, $date_format, $time_format);
}