<?php

    spl_autoload_register('Autoloader::autoloadDao');
    spl_autoload_register('Autoloader::autoloadDaoDB');
    spl_autoload_register('Autoloader::autoloadDto');
    spl_autoload_register('Autoloader::autoloadTrait');
    spl_autoload_register('Autoloader::autoloadLibrary');
    spl_autoload_register('Autoloader::autoloadLibraryFormsRegistration');
    spl_autoload_register('Autoloader::autoloadLibraryFormsDeleteAccount');
    spl_autoload_register('Autoloader::autoloadLibraryFormsUpdateRegistration');
    spl_autoload_register('Autoloader::autoloadLibraryFormsLogin');
    spl_autoload_register('Autoloader::autoloadLibraryFormsMenu');
    spl_autoload_register('Autoloader::autoloadLibraryControls');

    abstract class Autoloader
    {
// DAO
        static function autoloadDao($class)
        {
            $file = 'models/dao/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
        static function autoloadDaoDB($class)
        {
            $file = 'models/dao/db/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
// DTO
        static function autoloadDto($class)
        {
            $file = 'models/dto/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
// TRAITS
        static function autoloadTrait($class)
        {
            $file = 'models/traits/' . lcfirst($class) . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
// LIBRARY
        static function autoloadLibrary($class)
        {
            $file = 'library/' . lcfirst($class) . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsRegistration($class)
        {
            $file = 'library/forms/registration/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsDeleteAccount($class)
        {
            $file = 'library/forms/deleteAccount/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }


        static function autoloadLibraryFormsUpdateRegistration($class)
        {
            $file = 'library/forms/updateRegistration/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
        

        static function autoloadLibraryFormsLogin($class)
        {
            $file = 'library/forms/login/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsMenu($class)
        {
            $file = 'library/forms/menu/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }     

        static function autoloadLibraryControls($class)
        {
            $file = 'library/controls/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
    }