<?php

    abstract class Utility
    {
        static function getDateFormatFR($date)
        {
            $date = new DateTime($date);
            return $date->format('d/m/Y');
        }

        static function replaceDotByComma($string)
        {
            return preg_replace('/\./', ',', $string);
        }
    }