<?php
    session_start();
    
    try
    {       
        if(isset($_SESSION['connect']) && $_SESSION['connect'] == true)
        {
            switch ($_SESSION['userType']) {
                case 'Abonné':
                    require ('indexClient.php');
                break;

                case 'Producteur':
                    require ('indexGrower.php');
                break;

                case 'Responsable':
                    require ('indexManager.php');
                break;
                
                default:
                    require ('indexVisitor.php');
                break;
            }
        }
        else
        {
            require ('indexVisitor.php');
        }
    }
    catch (Exception $e)
    {
        $errorMessage = $e->getMessage();
        require('views/errorview.php');
    }