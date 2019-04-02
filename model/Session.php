<?php

    namespace MG\P4\Model;

    class Session {
        public function __construct() {
            session_start();
        }

        public function setflash($message) {
            $_SESSION['flash'] = $message;
        }

        public function flash() {
            if(isset($_SESSION['flash'])) {
                echo $_SESSION['flash'];
                unset($_SESSION['flash']);

            }
        }
    }