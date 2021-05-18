<?php

    $title = 'Mes commandes';

    $toPrint = OrderDAO::printOrdersByClient(ClientDAO::getClientIdByEmail($_SESSION['email']));

    require('views/view.php');