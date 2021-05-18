<?php
// Le formulaire est prêt pour les contrôles de saisie mais pas pour le style
// Des éventuelles classes et div sont à rajoutées

    abstract class FormUpdateRegistration
    {
    // Création du formulaire
        static function formCreation($email, $lastName, $firstName, $phoneNumber)
        {
            $form = "<form action='index.php' method='post' class=''>
                        <label for='emailUpdateRegistration' class='' id='labelEmail'>Mail :</label><br>
                        <input type='email' name='emailUpdateRegistration' class='' id='emailUpdateRegistration' required value='" . $email . "' disabled><br><br>
                
                        <label for='lastName' class='' id='labelLastName'>Nom :</label><br>
                        <input type='text' name='lastName' class='' id='lastName' required value='" . $lastName . "' onkeyup='controlUpdateRegistrationForm()'><br><br>
                
                        <label for='firstName' class='' id='labelFirstName'>Prénom :</label><br>
                        <input type='text' name='firstName' class='' id='firstName' required value='" . $firstName . "' onkeyup='controlUpdateRegistrationForm()'><br><br>
                
                        <label for='phoneNumber' class='' id='labelPhoneNumber'>Numéro de téléphone :</label><br>
                        <input type='tel' name='phoneNumber' class='' id='phoneNumber' pattern='^(0|(\+[0-9]{2}))[1-9]([0-9][0-9]){4}$' value='" . $phoneNumber . "' onkeyup='controlUpdateRegistrationForm()'><br><br>
                
                        <input type='hidden' name='formName' value='updateRegistration'>
                        <span class='' id='errorMessageUpdateRegistration'></span><br>
                        <input type='submit' value='Enregistrer' class='' id='submitUpdateRegistration' onsubmit='controlUpdateRegistrationForm()'>
                    </form>";
            return $form;
        }

    // Contrôles du formulaire
        static function formController($email, $lastName, $firstName, $phoneNumber)
        {
            if(ControlEmail::control($email))
            {
                if(ControlLastName::control($lastName))
                {
                    if(ControlFirstName::control($firstName))
                    {
                        if(ControlPhoneNumber::control($phoneNumber))
                        {
                            return true;
                        }
                        else
                        {
                            $error = 'Erreur : Une erreur est survenue sur votre numéro de téléphone.';
                        }
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
                $error = 'Erreur : Votre adresse email ne respecte pas nos conditions de sécurité.';
            }
            return $error;
        }

    }