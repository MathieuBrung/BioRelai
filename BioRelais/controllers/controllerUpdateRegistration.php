<?php

if(isset($_POST['lastName']) && isset($_POST['firstName']))
{
    extract($_POST);
    $email = $_SESSION['email'];
    
    if(FormUpdateRegistration::formController($email, $lastName, $firstName, $phoneNumber))
    {
        $user = new User([
            'UserEmail' => $email,
            'UserLastName' => $lastName,
            'UserFirstName' => $firstName,
            'UserPhoneNumber' => $phoneNumber
        ]);
        if(ClientDAO::updateClient($user))
        {
            unset($_POST);

            $user = UserDAO::getUserByEmail($email);
            $_SESSION['lastName'] = $user->getUserLastName();
            $_SESSION['firstName'] = $user->getUserFirstName();
            $_SESSION['phoneNumber'] = $user->getUserPhoneNumber();

            $_SESSION['redirection'] = 'clientDetailsView';
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Erreur : Échec de la mise à jour de vos données.');
        }
    }
    else
    {
        throw new Exception(FormUpdateRegistration::formController($emailRegistration, $lastName, $firstName, $phoneNumber));
    }
}
else
{
    throw new Exception('Erreur : Échec de la mise à jour. Aucun email, nom ou prénom envoyé.');
}
