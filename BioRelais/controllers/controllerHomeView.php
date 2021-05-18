<?php

    $title = 'Accueil';

    $menuArray = array(
        'Inscription', 'registrationView',
        'Connexion', 'loginView',
        'Mode de fonctionnement', 'operatingModeView',
        'Nos engagements', 'engagementView',
        'Les producteurs', 'growersView',
        'Vente en cours', 'saleView'
    );

    $toPrint = FormMenu::formCreation($menuArray);

    require('views/view.php');