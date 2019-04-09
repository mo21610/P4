<?php
class User extends HydrateManager {
    private $id;
    private $username;
    private $password;
    
    // Hydratation
    public function hydrate(Array $dataUser) {
        if (isset($dataUser['id'])) {
            $this->setId($dataUser['id']);
        }
        if (isset($dataUser['username'])) {
            $this->setUsername($dataUser['username']);
        }
        if (isset($dataUser['password'])) {
            $this->setPassword($dataUser['password']);
        }
    }

    /*getters*/
    public function id() {
        return $this->id;
    }
    public function username() {
        return $this->username;
    }
    public function password() {
        return $this->password;
    }

    // setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
}