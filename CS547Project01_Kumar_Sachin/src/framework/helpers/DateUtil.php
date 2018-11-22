<?php
namespace AztecGameStudios\framework\helpers;

class DateUtil
{
    public static function stringToDate($dobString, $format)
    {
        $date = date_create($dobString);
        $dateFormated = date_format($date, $format);
        return $dateFormated;
    }
}
