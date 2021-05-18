<?php
// Attention, le type de connexion à la base de données n'est pas encore géré
// Par défaut on se connecte en admin

    abstract class UserDAO
    {
        static function getUserByEmail($userEmail)
        {
            // Paramètre 'Admin' provisoire, il faudra le passer à 'Visitor' lorsque les comptes de la bdd seront créés
            $req = DBConnexion::getConnexion('Admin')->prepare('SELECT UserLastName, UserFirstName, UserPhoneNumber, UTName FROM user NATURAL JOIN user_type WHERE UserEmail = :email');
            $req->bindValue(':email', $userEmail);
            $req->execute();
            
            $data = $req->fetch();
            
            return new User($data);
        }
        
        static function userExist($email, $password)
        {
            // Paramètre 'Admin' provisoire, il faudra le passer à 'Visitor' lorsque les comptes de la bdd seront créés
            $req = DBConnexion::getConnexion('Admin')->prepare('SELECT UserEmail FROM user WHERE UserEmail = :email AND UserPassword = md5(:password)');
            
            $req->bindValue(":email", $email);
            $req->bindValue(":password" , $password);
            $req->execute();
            
            if($req->fetch() != "")
            {
                return true;
            }
            return false;
        }
    }
