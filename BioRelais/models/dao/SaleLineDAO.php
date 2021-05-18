<?php

    abstract class SaleLineDAO
    {
        static function getSLQuantity($productId, $SLId)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT SLQuantity FROM sale_line WHERE ProductsId = :productsId AND SaleId = :slId');
            $req->bindValue(':productsId', $productId);
            $req->bindValue(':slId', $SLId);
            $req->execute();
            $data = $req->fetch();
            return $data['SLQuantity'];
        }

        static function printSLClient()
        {
            $products = ProductsDAO::getProducts();

            $toPrint = "<div class='products'>";

            foreach($products as $product)
            {
                $quantity = ProductsDAO::getProductQuantity($product);
                $price = ProductsDAO::getProductPrice($product);
                $remainQuantity = $product->getSLQuantity() - $quantity;
                $img = ProductsDAO::getProductImg($product->getProductsName(), $remainQuantity);

                $_SESSION['cart'][$product->getProductsId()] = array(   'productsId' => $product->getProductsId(),
                                                                        'saleId' => $product->getSaleId(),
                                                                        'OLQuantity' => $quantity,
                                                                        'OLPrice' => $price,
                                                                        'SLUnitPrice' => $product->getSLUnitPrice());

                $toPrint .= "<table>
                                <tr>
                                    <td><img src='" . $img . "' alt='F&L' width='120' height='120'></td>
                                    <td>
                                        <div class='product'>
                                            <span><strong>" . $product->getProductsName() . "</strong></span><br>
                                            <p> 
                                                <span>Quantité restante : " . $remainQuantity . "<br>
                                                <span>" . $product->getSLUnitPrice() . " €/" . $product->getSLProductUnit() . "</span>

                                                <form action='index.php' method='post'>
                                                    <button name='buttonLess' value='" . $product->getProductsId() . "'>-</button>
                                                        <span> " . $_SESSION['cart'][$product->getProductsId()]['OLQuantity'] . " </span>";
                                                    
                                        $toPrint .= "<button name='buttonPlus' value='" . $product->getProductsId() . "'>+</button><br>
                                                </form>
                                                <span> " . $_SESSION['cart'][$product->getProductsId()]['OLPrice'] . " €</span>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>";
            }

            $toPrint .= "</div><br>";
            $toPrint .= "<span>Prix total : " . ProductsDAO::getCartPrice() . " €</span>";
            $toPrint .= "<br><br>";
            $toPrint .= "<form action='index.php' method='post'>
                            <button name='button' value='clientAddOrder'>Commander</button>
                        </form>";
            return $toPrint;
        }

        static function printSLVisitor()
        {
            $products = ProductsDAO::getProducts();

            $toPrint = "<div class='products'>";

            foreach($products as $product)
            {
                $quantity = ProductsDAO::getProductQuantity($product);
                $remainQuantity = $product->getSLQuantity() - $quantity;
                $img = ProductsDAO::getProductImg($product->getProductsName(), $remainQuantity);

                $toPrint .= "<table>
                                <tr>
                                    <td><img src='" . $img . "' alt='F&L' width='120' height='120'></td>
                                    <td>
                                        <div class='product'>
                                            <span><strong>" . $product->getProductsName() . "</strong></span><br>
                                            <p> 
                                                <span>Quantité restante : " . $remainQuantity . "<br>
                                                <span>" . $product->getSLUnitPrice() . " €/" . $product->getSLProductUnit() . "</span><br>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>";
            }

            $toPrint .= "</div>";
            
            return $toPrint;
        }
    }