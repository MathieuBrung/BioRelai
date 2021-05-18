<?php

    abstract class ControlMenu
    {
        // Fonction qui fonctionne avec le nom des controller
        // Elle recherche le term "View" et fait des remplacements pour faciliter la valeur à mettre dans les boutons
        static function control()
        {
            $allowedMenuElement = [];
            $files = scandir('controllers/', 1);
            foreach($files as $file)
            {
                if(preg_match("/View/", $file))
                {
                    $element = preg_replace("/.php/", "", $file);
                    $element = preg_replace("/controller/", "", $element);
                    $element = lcfirst($element);

                    $allowedMenuElement[] = $element;
                }
            }
            
            $allowedMenuElement[] = "logout";
            $allowedMenuElement[] = "clientAddOrder";

            return $allowedMenuElement;
        }
        
        
        // Fonction qui fonctionne pour une arborescence de vues où chaque page à son nom de vue
        // static function control()
        // {
        //     $allowedMenuElement = [];
        //     $dirs = glob("views/*/");

        //     foreach($dirs as $dir)
        //     {
        //         $files = scandir($dir, 1);
        //         foreach($files as $file)
        //         {
        //             if(preg_match("/View/", $file))
        //             {
        //                 $element = preg_replace("/.php/", "",$file);
        //                 $allowedMenuElement[] = $element;
        //             }
        //         }
        //     }
            
        //     $allowedMenuElement[] = "logout";
        //     $allowedMenuElement[] = "clientAddOrder";
        //     $allowedMenuElement[] = "clientOrderDetailsView";

        //     return $allowedMenuElement;
        // }
    }