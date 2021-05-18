<?php

    $title = 'Je commande';

    $toPrint = SaleLineDAO::printSLClient();

    require('views/view.php');