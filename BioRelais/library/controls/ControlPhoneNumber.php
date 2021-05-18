<?php

    abstract class ControlPhoneNumber
    {
        static function control($phoneNumber)
        {
            $regex = '%^(0|(\+[0-9]{2}))[1-9]([0-9][0-9]){4}$%';

            if (preg_match($regex, $phoneNumber))
            {
                return true;
            }
            return false;
        }
    }