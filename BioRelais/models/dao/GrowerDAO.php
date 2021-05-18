<?php

    abstract class GrowerDAO
    {
        static function getGrowers()
        {
            $growers = [];

            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT UserEmail, UserLastName, UserFirstName, UserPhoneNumber, UTName, UTCode, GrowerId, GrowerStreet, GrowerCity, GrowerPostalCode, GrowerCompanyName, GrowerCompanyPresentation FROM user NATURAL JOIN user_type NATURAL JOIN grower');
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                    $growers[] = new Grower($data);
            }
        
            return $growers;
        }

        static function printGrowers()
        {
            $growers = self::getGrowers();

            $toPrint = "<div class='growers'>";

            foreach($growers as $grower)
            {
                $toPrint .= "<div class='grower'>
                                <span><strong>" . $grower->getGrowerCompanyName() . "</strong></span><br>
                                <p>" . $grower->getGrowerCompanyPresentation() . "</p>
                                <p> 
                                    <span>---------- Adresse ----------</span><br>
                                    <span>" . $grower->getGrowerStreet() . "</span><br>
                                    <span>" . $grower->getGrowerCity() . "</span><br>
                                    <span>" . $grower->getGrowerPostalCode() . "</span><br>
                                </p>
                            </div><br>";
            }

            $toPrint .= "</div>";
            return $toPrint;
        }
    }