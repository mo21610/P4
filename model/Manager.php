<?php

    namespace MG\P4\Model;
    use \PDO;


    class Manager {

        private $_db;


        public function __construct() {
            var_dump($_db);
            try // Connexion à la BDD
            {
                $this->_db = new PDO('mysql:host=db5000040901.hosting-data.io;dbname=dbs35913', 'dbu88387', '!Z4vpfh21000');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
        }

    
    }
