<?php

    abstract class ControlFirstName
    {
        static function control($firstName)
        {
            $regex = '%^[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+([-][A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+)?$%';
            if(preg_match($regex, $firstName))
            {
                return true;
            }
            return false;
        }
    }