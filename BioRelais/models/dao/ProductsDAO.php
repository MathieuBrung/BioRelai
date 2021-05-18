<?php

    abstract class ProductsDAO
    {
        static function getProducts()
        {
            $products = [];

            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT ProductsId, ProductsName, ProductsPresentation, ProductsTVA, GrowerId, PCCode, PCName, SLQuantity, SLUnitPrice, SLProductUnit, SaleId 
                                    FROM products NATURAL JOIN products_category NATURAL JOIN sale_line');
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                    $products[] = new Product($data);
            }
        
            return $products;
        }

        static function getProductByIdAndOrderId($productId, $orderId)
        {
            $products = [];

            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT ProductsId, ProductsName, ProductsPresentation, ProductsTVA, GrowerId, PCCode, PCName, SLQuantity, SLUnitPrice, SLProductUnit, SaleId 
                                    FROM products NATURAL JOIN products_category NATURAL JOIN sale_line NATURAL JOIN ordered_line WHERE ProductsId = :productsId AND OrderId = :orderId');
            $req->bindValue(':productsId', $productId);
            $req->bindValue(':orderId', $orderId);
            $req->execute();

            $data = $req->fetch(PDO::FETCH_ASSOC);
            
            $product = new Product($data);
            
            return $product;
        }

        static function getProductNameById($productId)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT ProductsName FROM products WHERE ProductsId = :productsId');
            $req->bindValue(':productsId', $productId);
            $req->execute();
            $data = $req->fetch();
            return $data['ProductsName'];
        }

        static function getCartPrice()
        {
            $cartPrice = 0;
            for($i = 1; $i <= sizeof($_SESSION['cart']); $i++)
            {
                if(isset($_SESSION['cart'][$i]))
                {
                    $cartPrice += $_SESSION['cart'][$i]['OLPrice'];
                }
            }
            return $cartPrice;
        }

        static function getProductQuantity(Product $product)
        {
            if(isset($_SESSION['cart'][$product->getProductsId()]['OLQuantity']))
            {
                return $_SESSION['cart'][$product->getProductsId()]['OLQuantity'];
            }
            else
            {
                return 0;
            }
        }

        static function getProductPrice(Product $product)
        {
            if(isset($_SESSION['cart'][$product->getProductsId()]['OLPrice']))
            {
                return $_SESSION['cart'][$product->getProductsId()]['OLPrice'];
            }
            else
            {
                return 0;
            }
        }

        static function getProductImg($productName, $quantity)
        {
            $img = "public/img/" . $productName . ".png";
            if(!file_exists($img))
            {
                $img = 'public\img\default.png';
            }
            
            if($quantity < 1)
            {
                $img = 'public\img\soldout.png';
            }

            return $img;
        }


    }