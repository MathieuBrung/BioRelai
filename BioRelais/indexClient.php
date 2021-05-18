<?php
    require ('library/autoLoader.php');
    
    try
    {       
        if(isset($_SESSION['connect']) && $_SESSION['connect'] == true)
        {
            if(!empty($_POST))
            {
                if(isset($_POST['formName']))
                {
                    $allowedFormName = ControlFormsName::control();
                    if(in_array($_POST['formName'], $allowedFormName))
                    {
                        require (Dispatcher::dispatch($_POST['formName']));
                    }
                    else
                    {
                        unset($_POST);
                        throw new Exception("Erreur : Mauvais nom de formulaire.");
                    }
                }
                elseif(isset($_POST['button']))
                {
                    $allowedMenuElement = ControlMenu::control();
                    if(in_array($_POST['button'], $allowedMenuElement))
                    {
                        require (Dispatcher::dispatch($_POST['button']));
                    }
                    else
                    {
                        unset($_POST);
                        throw new Exception("Erreur : Mauvaise valeur dans le bouton.");
                    }
                }
                elseif(isset($_POST['buttonLess']) || isset($_POST['buttonPlus']))
                {
                    require('controllers/controllerClientCart.php');
                }
                else
                {
                    unset($_POST);
                    require('controllers/controllerHomeClientView.php');
                }
            }
            elseif(isset($_SESSION['redirection']))
            {
                require (Dispatcher::dispatch($_SESSION['redirection']));
            }
            else
            {
                require('controllers/controllerHomeClientView.php');
            }
        }
    }
    catch (Exception $e)
    {
        $errorMessage = $e->getMessage();
        require('views/errorview.php');
    }
