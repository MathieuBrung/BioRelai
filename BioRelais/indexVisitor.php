<?php
    require ('library/autoLoader.php');
    
    try
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
                    throw new Exception("Mauvais nom de formulaire.");
                }
            }
            elseif(isset($_POST['button']))
            {
                $allowedMenuElement = ControlMenu::control();
                if(in_array($_POST['button'], $allowedMenuElement))
                {
                    require (Dispatcher::dispatch(($_POST['button'])));
                }
                else
                {
                    unset($_POST);
                    throw new Exception("Mauvaise valeur dans le bouton.");
                }
            }
            else
            {
                unset($_POST);
                require('controllers/controllerHomeView.php');
            }
        }
        elseif(isset($_SESSION['redirection']))
        {
            require (Dispatcher::dispatch($_SESSION['redirection']));
        }
        else
        {
            require('controllers/controllerHomeView.php');
        }
        
    }
    catch (Exception $e)
    {
        $errorMessage = $e->getMessage();
        require('views/errorview.php');
    }
