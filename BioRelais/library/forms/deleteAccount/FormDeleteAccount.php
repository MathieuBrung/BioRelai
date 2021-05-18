<?php

    abstract class FormDeleteAccount
    {
        static function formCreation()
        {
            $form = "<form action='index.php' method='post' onsubmit='return warningDeleteUser()'>
                        <button type='submit' name='formName' value='deleteAccount'>Supprimer mon compte</button>
                    </form>";

            return $form;
        }
    }