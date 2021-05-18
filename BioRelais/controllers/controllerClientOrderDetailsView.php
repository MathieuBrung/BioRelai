<?php

    // Penser à mettre l'id directement en varaible de session...
    $clientId = ClientDAO::getClientIdByEmail($_SESSION['email']);
    if(isset($_POST['orderId']))
    {
        $orderId = $_POST['orderId'];   
    }
    else
    {
        throw new Exception('Aucun identifiant de commande envoyé.');
    }

    $orderDate = OrderDAO::getOrderDateById($orderId);

    $title = "Détail de votre commande du " . $orderDate;

    $toPrint = OrderDAO::printOrderDetails($orderId, $clientId);

    require('views/view.php');