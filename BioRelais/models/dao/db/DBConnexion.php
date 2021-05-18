<?php

    class DBConnexion extends PDO
    {
        // Attributs pour chaque type d'utilisateur
        private static $connexionAdmin;
        private static $connexionUser;
        private static $connexionVisitor;
        private static $userTypeAllowed = array('Admin', 'User', 'Visitor');
        
        public static function getConnexion($userType) // Ajout du type d'utilisateur en paramètre
        {
            if(in_array($userType, self::$userTypeAllowed))
            {
                // Rajout d'une condition qui regarde le type d'utilisateur donné en paramètre pour instancier la bonen variable
                if ($userType == 'Admin')
                {
                    if (!self::$connexionAdmin )
                    {
                        self::$connexionAdmin = new DBConnexion($userType);
                        self::$connexionAdmin->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    return self::$connexionAdmin;
                }
                elseif ($userType == 'User')
                {
                    if (!self::$connexionUser )
                    {
                        self::$connexionUser = new DBConnexion($userType);
                        self::$connexionUser->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    return self::$connexionUser;
                }
                else //if ($userType == 'Visitor')
                {
                    if (!self::$connexionVisitor )
                    {
                        self::$connexionVisitor = new DBConnexion($userType);
                        self::$connexionVisitor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    return self::$connexionVisitor;
                }
            }
        }
        
        function __construct($userType) // Ajout du type d'utilisateur en paramètre
        {
            try {
                // Ajouter une condition sur le type d'utilisateur pour récupérer les paramètres correspondant pour la connexion à la BDD
                switch ($userType)
                {
                    case 'Admin':
                            parent::__construct(ParamAdmin::$dsn ,ParamAdmin::$user, ParamAdmin::$pass);
                        break;

                    case 'User':
                            parent::__construct(ParamUser::$dsn ,ParamUser::$user, ParamUser::$pass);
                        break;
                    
                    default: // Visitor
                            parent::__construct(ParamVisitor::$dsn ,ParamVisitor::$user, ParamVisitor::$pass);
                        break;
                }

            } catch (Exception $e) {

                echo $e->getMessage();
                require('views/errorView.php');
            }
        }
    }