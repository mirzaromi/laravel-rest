<?php

namespace App\Utils;

use DateTime;
use DateTimeZone;

class DateUtils
{
    public function generateDateNow(): string
    {
        $date = new DateTime();

        // Set the timezone to UTC
        $date->setTimezone(new DateTimeZone('UTC'));

        // Get the formatted timestamp with 'Z' appended
        return $date->format('Y-m-d\TH:i:s\Z');
    }
}
