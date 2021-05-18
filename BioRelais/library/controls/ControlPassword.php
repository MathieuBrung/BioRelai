<?php

    abstract class ControlPassword
    {
        static function control($password)
        {
            $regex = '%^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,20}$%';
            if(preg_match($regex, $password))
            {
                return true;
            }
            return false;
        }
    }