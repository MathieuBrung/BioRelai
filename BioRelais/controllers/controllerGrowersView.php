<?php

    $title = 'Les producteurs';

    $toPrint = GrowerDAO::printGrowers();

    require('views/view.php');