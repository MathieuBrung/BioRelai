<?php

    $title = "Inscription";

    $scripts = array(
        '<script src="public/js/controlRegistration.js"></script>'
    );

    $menuArray = array(
        'Connexion', 'loginView'
    );

    $toPrint = FormRegistration::formCreation();
    $toPrint .= '<br><br>';
    $toPrint .= FormMenu::formCreation($menuArray);

    require('views/view.php');