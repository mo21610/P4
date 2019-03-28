<?php

namespace MG\P4\Model;
use \MG\P4\Model\Manager;

class User {
    private $_id;
    private $_username;
    private $_password;

    public function __construct(Array $dataUser) {
        $this->hydrate($dataUser);
    }
    
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
        return $this->_id;
    }
    public function username() {
        return $this->_username;
    }
    public function password() {
        return $this->_password;
    }

    // setters
    public function setId($id) {
        $this->_id = $id;
    }
    public function setUsername($username) {
        $this->_username = $username;
    }
    public function setPassword($password) {
        $this->_password = $password;
    }
}