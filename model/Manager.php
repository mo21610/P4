<?php

class Manager
{
    public $db;
    public function __construct() {
        try // Connexion à la BDD
        {
            $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    }
}