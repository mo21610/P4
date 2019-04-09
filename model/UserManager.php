<?php
class UserManager extends Manager {
    public function getUser($username) {
        $req = $this->db->prepare("SELECT * FROM users WHERE username = :username");
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
        $req = $this->db->prepare('INSERT INTO users(username, password) VALUES(:username, :password)');
        $req->execute(array(
            'username' => $user->username(),
            'password' => $user->password(),
        ));
    }
}