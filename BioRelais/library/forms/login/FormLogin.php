<?php

    abstract class FormLogin
    {
    // Création du formulaire
        static function formCreation()
        {
            $form = "<form action='index.php' method='post' class=''>
                                <label for='emailLogin' class='' id='labelEmail'>Mail :</label><br>
                                <input type='email' name='emailLogin' class='' id='emailLogin' pattern='^[a-z0-9]+([\._-][a-z0-9]+){0,5}@[a-z0-9]+([\._-][a-z0-9]+){0,3}\.[a-z]{2,4}$' required onkeyup='controlLoginForm()'><br><br>
                        
                                <label for='password' class='' id='labelPassword'>Mot de passe :</label><br> 
                                <input type='password' name='password' class='' id='password' pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,20}$' required onkeyup='controlLoginForm()'>
                                <span class='' id='regex'></span><br><br>

                                <input type='hidden' name='formName' value='login'>
                                <span class='' id='errorMessageLogin'></span><br>
                                <input type='submit' value='Connexion' class='' id='submitLogin' disabled='true' onsubmit='controlLoginForm()'>
                            </form>";
            return $form;
        }

    // Contrôles du formulaire
        static function formController($email, $password)
        {
            if(ControlEmail::control($email))
            {
                if(ControlPassword::control($password))
                {
                    return true;
                }
                else
                {
                    $error = 'Erreur : Votre mot de passe ne respecte pas nos conditions de sécurité.';
                }
            }
            else
            {
                $error = 'Erreur : Votre adresse email ne respecte pas nos conditions de sécurité.';
            }
            return $error;
        }
        
    }