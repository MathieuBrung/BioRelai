<?php

    // initialisation du tableau de lignes de commande par les variables de session
    foreach($_SESSION['cart'] as $orderedLine)
    {
        if(is_array($orderedLine))
        {
            if($orderedLine['OLQuantity'] > 0)
            {
                $orderedLines[] = new OrderedLine($orderedLine);
            }
        }
    }
    // initialisation de l'objet Ordered
    $order = array( 'orderDate' => date('Y-m-d'),
                    'clientId' => ClientDAO::getClientIdByEmail($_SESSION['email']),
                    'OSCode' => 'V');
    $ordered = new Ordered($order);
    $ordered->setOrderedLine($orderedLines);

    // appel de la fonction OrderDAO::addOrder
// ajout d'un control sur si l'ajout est bien éffectué
    OrderDAO::addOrder($ordered);

    unset($_SESSION['cart']);

    // redirection vers "mes commandes"
    $_SESSION['redirection'] = 'clientOrderView';
    header('Location: index.php');