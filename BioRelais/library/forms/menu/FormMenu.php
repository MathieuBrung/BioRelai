<?php

    abstract class FormMenu
    {
        static function formCreation(array $menuArray)
        {
            // Le tableau doit contenir le nom des boutons puis le nom du controlleur de la vue
            // Exemple : Inscription, registrationView
            $form = "<form class='' action='index.php' method='post'>";

            for($i = 0; $i <= (count($menuArray) - 2); $i += 2)
            {
                $form .= "<button value=" . lcfirst($menuArray[$i + 1]) . " name='button'>" . ucfirst($menuArray[$i]) . "</button>";
            }

            $form .= "</form>";

            return $form;
        }
    }