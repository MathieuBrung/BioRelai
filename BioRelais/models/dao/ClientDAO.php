<?php

    abstract class ClientDAO
    {
        static function addClient(User $user)
        {
            $email = $user->getUserEmail();
            $lastName = $user->getUserLastName();
            $firstName = $user->getUserFirstName();
            $password = $user->getUserPassword();
            $phoneNumber = $user->getUserPhoneNumber();
            $userType = $user->getUTCode();

            $db = DBConnexion::getConnexion('Admin');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $db->prepare('INSERT INTO user(UserEmail, UserLastName, UserFirstName, UserPhoneNumber, UserPassword, UTCode) 
                                                                VALUES (:email, :lastName, :firstName, :phoneNumber, :password, :userType)');
            
            $req2 = $db->prepare('INSERT INTO client(UserEmail) VALUES (:email)');

            $db->beginTransaction();

            $req->bindValue(':email', $email);
            $req->bindValue(':lastName', $lastName);
            $req->bindValue(':firstName', $firstName);
            $req->bindValue(':password', md5($password));
            $req->bindParam(':phoneNumber', $phoneNumber);
            $req->bindParam(':userType', $userType);
            $req->execute();

            $req2->bindValue(':email', $email);
            $req2->execute();

            return $db->commit();
        }

        static function updateClient(User $user)
        {
            $email = $user->getUserEmail();
            $lastName = $user->getUserLastName();
            $firstName = $user->getUserFirstName();
            $phoneNumber = $user->getUserPhoneNumber();

            $req = DBConnexion::getConnexion('Admin')->prepare('UPDATE user SET UserLastName = :lastName, UserFirstName = :firstName, UserPhoneNumber = :phoneNumber 
                                                                WHERE user.UserEmail = :email');
            
            $req->bindValue(':email', $email);
            $req->bindValue(':lastName', $lastName);
            $req->bindValue(':firstName', $firstName);
            $req->bindParam(':phoneNumber', $phoneNumber);

            return $req->execute();
        }

        static function deleteClient($email)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SET FOREIGN_KEY_CHECKS = 0;
                                    DELETE FROM user WHERE user.UserEmail = :email;
                                    SET FOREIGN_KEY_CHECKS = 1');
            $req->bindValue(':email', $email);

            return $req->execute();
        }

        static function getClientIdByEmail($email)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT ClientId FROM client WHERE UserEmail = :email');
            $req->bindValue(':email', $email);
            $req->execute();
            $data = $req->fetch();
            return $data['ClientId'];
        }
    }