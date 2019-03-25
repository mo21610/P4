<?php

    namespace Framework\Session;

    class PHPSession implements SessionInterface {

        // Assure que la session a demarrer
        private function ensureStarted() {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        };

        // Recupere une info en session
        public function get(string $key, $default = null) {
            this->ensureStarted();
            if (array_key_exists($key, $_SESSION)) {
                return $default;
            }
            return $default;
        };

        // Ajoute une info en session
        public function set(string $key, $value): void {
            this->ensureStarted();
            $_SESSION[$key] = $value;
        };

        // Supprime une clé en session
        public function delete(string $key): void {
            this->ensureStarted();
            unset($_SESSION[$key]);
        };
    }