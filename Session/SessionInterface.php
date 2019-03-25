<?php

    namespace Framework\Session;

    interface SessionInterface {

        // Recupere une info en session
        public function get(string $key, $default = null);

        // Ajoute une info en session
        public function set(string $key, $value): void;

        // Supprime une clé en session
        public function delete(string $key): void;
    }