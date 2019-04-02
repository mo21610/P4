<?php

    namespace MG\P4\Model;
    use \PDO;
    use \MG\P4\Model\Manager;

    class UserManager {
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


        public function getUser($username) {
            $req = $this->_db->prepare("SELECT * FROM users WHERE username = :username");
            $req->execute(array(
                'username' => $username,
            ));
            $dataUser = $req->fetch(PDO::FETCH_ASSOC);
            if ($dataUser) {
                $user = new User($dataUser);
                return $user;
            }
            else {
                false;
            }
            
        }


        public function registration(User $user){
            $req = $this->_db->prepare('INSERT INTO users(username, password) VALUES(:username, :password)');
            $req->execute(array(
                'username' => $user->username(),
                'password' => $user->password(),
            ));
        }
    }