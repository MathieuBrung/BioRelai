<?php

    if(ClientDAO::deleteClient($_SESSION['email']))
    {
        require ('controllerLogout.php');
    }
    else
    {
        throw new Exception('Erreur : La suppression de votre compte n\'a pas pu être prise en compte.');
    }
