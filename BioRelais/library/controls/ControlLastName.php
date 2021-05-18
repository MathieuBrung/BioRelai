<?php

    abstract class ControlLastName
    {
        static function control($lastName)
        {
            $regex = '%^[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+(([-]{1,2}[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+)?|([ ][A-Z]?[a-zâêîôûàèìòùáéíóúäëïöüãõñç]+){1,2})$%';
            if(preg_match($regex, $lastName))
            {
                return true;
            }
            return false;
        }
    }