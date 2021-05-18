<?php

if(isset($_POST['emailRegistration']) && isset($_POST['password']) && isset($_POST['lastName']) && isset($_POST['firstName']))
{
    extract($_POST);
    
    if(FormRegistration::formController($emailRegistration, $password, $lastName, $firstName))
    {
        $user = new User([
            'UserEmail' => $emailRegistration,
            'UserLastName' => $lastName,
            'UserFirstName' => $firstName,
            'UserPassword' => $password,
            'UserPhoneNumber' => "", // Mettre la valeur à "" au niveau de l'attribut ?
            'UTCode' => 1
        ]);
        if(ClientDAO::addClient($user))
        {
            unset($_POST);
            $_SESSION['redirection'] = 'loginView';
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Erreur : Échec de l\'ajout de l\'utilisateur.');
        }
    }
    else
    {
        throw new Exception(FormRegistration::formController($emailRegistration, $password, $lastName, $firstName));
    }
}
else
{
    throw new Exception('Erreur : Échec de l\'inscription. Aucun email, mot de passe, nom ou prénom envoyé.');
}
