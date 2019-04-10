<?php
require 'Config.php';

class Manager {
    public $db;
    public function __construct() {
        $configManager = new Config;
        $host = $configManager->host();
        $db = $configManager->db();
        $dbUser = $configManager->dbUser();
        $dbPassword = $configManager->dbPassword();

        try // Connexion à la BDD
        {
            $this->db = new PDO('mysql:host='.$host.';dbname='.$db, $dbUser, $dbPassword);
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    }
}