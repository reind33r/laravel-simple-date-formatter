<?php

namespace reind33r\SimpleDateFormatter;

use Illuminate\Support\Facades\App;

class SimpleDateFormatter
{
    public static function format($date, $date_format='long', $time_format=false) {

        $date = new \DateTime($date); // Converts date into a DateTime object

        // Date format : long, full or short (defaults to short if other value)
        if($date_format == 'long') {
            $formatterDateFormat = \IntlDateFormatter::LONG;
        } elseif($date_format == 'full') {
            $formatterDateFormat = \IntlDateFormatter::FULL;
        } else {
            $formatterDateFormat = \IntlDateFormatter::SHORT;
        }

        // Time format : boolean
        if($time_format) {
            $formatterTimeFormat = \IntlDateFormatter::SHORT;
        } else {
            $formatterTimeFormat = \IntlDateFormatter::NONE;
        }

        $formatter = new \IntlDateFormatter(App::getLocale(), $formatterDateFormat, $formatterTimeFormat);

        return $formatter->format($date);
    }
}