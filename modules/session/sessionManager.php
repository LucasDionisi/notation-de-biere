<?php
    class SessionManager {
        function __construct()
        {
            session_start();
        }

        public function resetTimeSessionCreated() {
            $_SESSION['SESSION_CREATED'] = time();
        }

        private function checkTimeSessionCreated() {
            if (!isset($_SESSION['SESSION_CREATED']) || !isset($_SESSION['USER'])) {
                if (isset($_SESSION['USER'])) $this->resetTimeSessionCreated();
                return false;
            } else {
                if ((time() - $_SESSION['SESSION_CREATED']) > 1200) {
                    $this->disconnectUser();
                    return false;
                }
            }

            return true;
        }

        public function connectUser($info) {
            $this->resetTimeSessionCreated();
            $_SESSION['USER'] = $info;
        }

        public function disconnectUser() {
            $_SESSION['USER'] = NULL;
            $_SESSION['SESSION_CREATED'] = NULL;
        }

        public function getUserInfo() {
            if (!$this->checkTimeSessionCreated()) return NULL;
            return $_SESSION['USER'];
        }
    }

    $sessionManager = new SessionManager();
?>