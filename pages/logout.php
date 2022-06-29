<?php

    require_once 'modules/session/sessionManager.php';
    $sessionManager->disconnectUser();
    
    header('Location: ../');

?>