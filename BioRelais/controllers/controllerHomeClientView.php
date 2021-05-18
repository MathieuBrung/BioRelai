<?php

    $title = "Bonjour " . $_SESSION['firstName'] . " " .$_SESSION['lastName'];

    $menuArray = array(
        'Commander', 'clientShopView',
        'Historique', 'clientOrderView',
        'Mon compte', 'clientDetailsView',
        'Déconnexion', 'logout'
    );

    $toPrint = FormMenu::formCreation($menuArray);

    require('views/view.php');