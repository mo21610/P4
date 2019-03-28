<?php

    namespace MG\P4\Model;

    class Manager {

        private $_db;

        public function __construct() {
            try // Connexion à la BDD
            {
               
                $this->_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
        }
    
    }
