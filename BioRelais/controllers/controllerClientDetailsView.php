<?php

    $title = 'Informations personnelles';

    $scripts = array(
        '<script src="public/js/controlUpdateRegistration.js"></script>',
        '<script src="public/js/deleteUser.js"></script>'
    );

    $form = FormUpdateRegistration::formCreation($_SESSION['email'], $_SESSION['lastName'], $_SESSION['firstName'], $_SESSION['phoneNumber']);
    $buttonDeleteUser = FormDeleteAccount::formCreation();

    $toPrint = $form;
    $toPrint .= '<br><br>';
    $toPrint .= $buttonDeleteUser;

    require('views/view.php');