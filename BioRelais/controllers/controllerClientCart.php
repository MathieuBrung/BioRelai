<?php

    if(isset($_POST['buttonLess']))
    {
        if($_SESSION['cart'][$_POST['buttonLess']]['OLQuantity'] > 0)
        {
            $_SESSION['cart'][$_POST['buttonLess']]['OLQuantity']--;
            $_SESSION['cart'][$_POST['buttonLess']]['OLPrice'] = $_SESSION['cart'][$_POST['buttonLess']]['OLQuantity'] * $_SESSION['cart'][$_POST['buttonLess']]['SLUnitPrice'];
            $_SESSION['cart']['cartPrice'] -= $_SESSION['cart'][$_POST['buttonLess']]['SLUnitPrice'];
        }
    }
    elseif(isset($_POST['buttonPlus']))
    {
        $_SESSION['cart'][$_POST['buttonPlus']]['OLQuantity']++;
        $_SESSION['cart'][$_POST['buttonPlus']]['OLPrice'] = $_SESSION['cart'][$_POST['buttonPlus']]['OLQuantity'] * $_SESSION['cart'][$_POST['buttonPlus']]['SLUnitPrice'];
        $_SESSION['cart']['cartPrice'] += $_SESSION['cart'][$_POST['buttonPlus']]['SLUnitPrice'];
    }

    $_SESSION['redirection'] = 'clientShopView';
    header('Location: index.php');