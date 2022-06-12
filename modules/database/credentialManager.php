<?php

    require_once 'modules/database/databaseManager.php';

    class CredentialManager {
        private $databaseManager;

        function __construct() {
            if (!isset($this->databaseManager)) {
                $this->databaseManager = new DatabaseManager();
                $this->databaseManager->connect();
            }
        }

        function __destruct() {
            $this->databaseManager->disconnect();
        }

        function disconnectDababase() {
            $this->databaseManager->disconnect();
        }

        function connectUser($email, $password) {
            if ($email === 'lucas.dionisi@gmail.com' && $password === 'password') {
                return true;
            } else {
                return false;
            }
        }
    }

?>