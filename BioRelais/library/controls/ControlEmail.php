<?php

    abstract class ControlEmail
    {
        static function control($email)
        {
            $regex = '%^[a-z0-9]+([\._-][a-z0-9]+){0,5}@[a-z0-9]+([\._-][a-z0-9]+){0,3}\.[a-z]{2,4}$%';
            if(preg_match($regex, $email))
            {
                return true;
            }
            return false;
        }
    }