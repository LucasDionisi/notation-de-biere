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
            try {
                $salt = $this->databaseManager->getSalt()->fetch_assoc()['data'];

                $passwordCrypted = crypt($password, $salt);
                $res = $this->databaseManager->getUserByCredentials($email, $passwordCrypted);
                if ($res->num_rows === 1) return true;
                else return false;
            } catch (Exception $e) {
                return false;
            }
        }
    }

?>