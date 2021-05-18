<?php

    $title = "Connexion";

    $scripts = array(
        '<script src="public/js/controlLogin.js"></script>'
    );

    $menuArray = array(
        'Inscription', 'registrationView'
    );

    $toPrint = FormLogin::formCreation();
    $toPrint .= '<br><br>';
    $toPrint .= FormMenu::formCreation($menuArray);

    require('views/view.php');