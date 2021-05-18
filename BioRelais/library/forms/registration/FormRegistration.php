<?php
// Le formulaire est prêt pour les contrôles de saisie mais pas pour le style
// Des éventuelles classes et div sont à rajoutées
// Ce formulaire permet de s'inscrire avec une adresse mail, son nom, prénom et un mot de passe qui sera traité en mdp5

    abstract class FormRegistration
    {
    // Création du formulaire
        static function formCreation()
        {
            $form = "<form action='index.php' method='post' class=''>
                        <label for='emailRegistration' class='' id='labelEmail'>Mail :</label><br>
                        <input type='email' name='emailRegistration' class='' id='emailRegistration' pattern='^[a-z0-9]+([\._-][a-z0-9]+){0,5}@[a-z0-9]+([\._-][a-z0-9]+){0,3}\.[a-z]{2,4}$' required onkeyup='controlRegistrationForm()'><br><br>
                
                        <label for='lastName' class='' id='labelLastName'>Nom :</label><br>
                        <input type='text' name='lastName' class='' id='lastName' required onkeyup='controlRegistrationForm()'><br><br>
                
                        <label for='firstName' class='' id='labelFirstName'>Prénom :</label><br>
                        <input type='text' name='firstName' class='' id='firstName' required onkeyup='controlRegistrationForm()'><br><br>
                
                        <label for='password' class='' id='labelPassword'>Mot de passe :</label><br> 
                        <input type='password' name='password' class='' id='password' pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,20}$' required onkeyup='controlRegistrationForm()'>
                        <span class='' id='regex'></span><br><br>

                        <input type='hidden' name='formName' value='registration'>
                        <span class='' id='errorMessageRegistration'></span><br>
                        <input type='submit' value='Inscription' class='' id='submitRegistration' disabled='true' onsubmit='controlRegistrationForm()'>
                    </form>";
            return $form;
        }

    // Contrôles du formulaire
        static function formController($email, $password, $lastName, $firstName)
        {
            if(ControlEmail::control($email))
            {
                if(ControlPassword::control($password))
                {
                    if(ControlLastName::control($lastName))
                    {
                        if(ControlFirstName::control($firstName))
                        {
                            return true;
                        }
                        else
                        {
                            $error = 'Erreur : Une erreur est survenue sur votre prénom.';
                        }
                    }
                    else
                    {
                        $error = 'Erreur : Une erreur est survenue sur votre nom.';
                    }
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