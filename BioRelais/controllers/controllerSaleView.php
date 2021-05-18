<?php

    $title = "Vente en cours";

    $menuArray = array(
        'Inscription', 'registrationView',
        'Connexion', 'loginView'
    );

    $toPrint = SaleLineDAO::printSLVisitor();
    $toPrint .= '<br><br>';
    $toPrint .= FormMenu::formCreation($menuArray);

    require('views/view.php');