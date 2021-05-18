<?php

    abstract class OrderDAO
    {
        // fonction qui permet d'enregistrer une commande pour un client
        static function addOrder(Ordered $order)
        {
            $orderDate = $order->getOrderDate();
            $clientId = $order->getClientId();
            $OSCode = $order->getOSCode();

            // l'objet de tableau de ligne à instancier par les variables de session
            $orderLines = $order->getOrderedLine();
            
            $db = DBConnexion::getConnexion('Admin');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // ajout de la commande
            $req = $db->prepare('INSERT INTO ordered(OrderDate, ClientId, OSCode) VALUES (:orderDate, :clientId, :osCode)');

            // ajout des lignes de commandes
            $req2 = $db->prepare('INSERT INTO ordered_line(OLQuantity, OLPrice, OLDiscount, ProductsId, OrderId) VALUES (:olQuantity, :olPrice, :olDiscount, :productsId, :orderId)');

            // Troisième requête pour enlever le nombre de produits correspondant
            $req3 = $db->prepare('UPDATE sale_line SET SLQuantity = :slQuantity WHERE sale_line.SaleId = :saleId AND sale_line.ProductsId = :productsId');

            $db->beginTransaction();

            $req->bindValue(':orderDate', $orderDate);
            $req->bindValue(':clientId', $clientId);
            $req->bindValue(':osCode', $OSCode);
            $req->execute();

            
            $orderId = $db->lastInsertId();           
            // Boucle pour les lignes de commande
            foreach($orderLines as $line)
            {
                $OLQuantity = $line->getOLQuantity();
                $OLPrice = $line->getOLPrice();
                $OLDiscount = $line->getOLDiscount();
                $productsId = $line->getProductsId();

                $req2->bindParam(':orderId', $orderId);
                $req2->bindValue(':olQuantity', $OLQuantity);
                $req2->bindValue(':olPrice', $OLPrice);
                $req2->bindValue(':olDiscount', $OLDiscount);
                $req2->bindValue(':productsId', $productsId);
                $req2->execute();
                
                $saleId = $line->getSaleId();
                $slQuantity = SaleLineDAO::getSLQuantity($productsId, $saleId) - $OLQuantity;

                $req3->bindValue(':slQuantity', $slQuantity);
                $req3->bindValue(':saleId', $saleId);
                $req3->bindValue(':productsId', $productsId);
                $req3->execute();
            }

            return $db->commit();
        }

        // fonction qui permet de récupérer les commandes d'un client
        static function getOrdersByClientId($clientId)
        {
            $orders = [];

            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT * FROM ordered NATURAL JOIN ordered_status WHERE ClientId = :clientId ORDER BY OrderId DESC');
            $req->bindValue(':clientId', $clientId);
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $order = new Ordered($data);
                $order->setOrderedLine(self::getOrderLinesByOrderId($order->getOrderId()));
                $orders[] = $order;
            }
        
            return $orders;
        }

        // Fonction qui permet de récupérer les lignes d'une commande
        static function getOrderLinesByOrderId($orderId)
        {
            $orderLines = [];
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT OLQuantity, OLPrice, OLDiscount, ProductsId, OrderId FROM ordered_line WHERE OrderId = :orderId');
            $req->bindValue(':orderId', $orderId);
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                    $orderLines[] = new OrderedLine($data);
            }
        
            return $orderLines;
        }

        // Ajout de l'id du client comme une vérification, une sécurité
        static function getOrderLinesByOrderIdAndClientId($orderId, $clientId)
        {
            $orderLines = [];
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT OLQuantity, OLPrice, OLDiscount, ProductsId, OrderId FROM ordered_line NATURAL JOIN ordered WHERE OrderId = :orderId AND ClientId = :clientId');
            $req->bindValue(':orderId', $orderId);
            $req->bindValue(':clientId', $clientId);
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                    $orderLines[] = new OrderedLine($data);
            }
        
            return $orderLines;
        }

        // Fonction qui permet de récupérer le prix total d'une commande
        static function getOrderPrice(Ordered $order)
        {
            $OP = 0;
            
            foreach($order->getOrderedLine() as $line)
            {
                $OP += $line->getOLPrice();
            }
            return $OP;
        }

        static function getOrderDateById($orderId)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT OrderDate FROM ordered WHERE OrderId = :orderId');
            $req->bindValue(':orderId', $orderId);
            $req->execute();
            $data = $req->fetch();

            return Utility::getDateFormatFR($data['OrderDate']);
        }


        // fonction pour l'affichage des commandes d'un client
        static function printOrdersByClient($clientId)
        {
            // le bouton redirige vers une page qui montre le détail des lignes de la commande
            $orders = OrderDAO::getOrdersByClientId($clientId);
            $toPrint = "";
            foreach($orders as $order)
            {
                $price = self::getOrderPrice($order);
                $date = Utility::getDateFormatFR($order->getOrderDate());
                $toPrint .= "<form action='index.php' method='post'>
                                <button value='clientOrderDetailsView' name='button'>
                                    Commande du " . $date . " d'un montant de " . $price . " € TTC
                                    <input type='hidden' name='orderId' value='" . $order->getOrderId() . "'>
                                </button>
                            </form><br>";
            }

            return $toPrint;
        }

        static function printOrderDetails($orderId, $clienId)
        {
            // Affichage du détail de la commande
            $lines = self::getOrderLinesByOrderIdAndClientId($orderId, $clienId);

            $toPrint = "<div class='orderDetails'>";

            foreach($lines as $line)
            {
                $product = ProductsDAO::getProductByIdAndOrderId($line->getProductsId(), $orderId);
                $SLUnitPrice = $product->getSLUnitPrice();
                $SLProductUnit = $product->getSLProductUnit();
                $OLQuantity = $line->getOLQuantity();
                $OLPrice = $line->getOLPrice();
                $productName = ProductsDAO::getProductNameById($line->getProductsId());
                $img = ProductsDAO::getProductImg($productName, $OLQuantity);

                $toPrint .= "<table>
                                <tr>
                                    <td><img src='" . $img . "' alt='F&L' width='90' height='90'></td>
                                    <td>
                                        <div class='product'>
                                            <span><strong>" . $productName . "</strong></span><br>
                                            <p> 
                                                " . $OLQuantity . " " . $SLProductUnit . " à " . $SLUnitPrice . " € /" . $SLProductUnit . " pour un total de " . $OLPrice . " €
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>";
            }

            $toPrint .= "</div><br>";
            $toPrint .= "<form action='index.php' method='post'>
                            <button value='clientOrderView' name='button'>
                                Retour à l'historique
                            </button>
                        </form>";

            return $toPrint;
        }





        // fonction qui permet de récupérer le statut d'une commande d'un client
        // À mettre dans OrderedStatusDAO
        
        // fonction qui permet de récupérer le détail d'une commande d'un client
        // un peu semblable, à voir
        // fonction qui permet de récupérer le détail d'une ligne de commande
        // À mettre dans OrderedLineDAO

        // fonction qui permet de récupérer l'ensemble des commandes
        // fonction qui permet de récupérer les commandes pour un producteur
        // fonction qui permet de récupérer les commandes pour une vente donnée (grâce aux dates)
        // ...
    }