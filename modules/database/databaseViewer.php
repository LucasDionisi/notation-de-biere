<?php
    class DatabaseViewer 
    {
        private $serverName;
        private $userName;
        private $password;
        private $dbName;

        private $connection = NULL;

        function __construct()
        {
            $fileContent = file_get_contents(__DIR__ . '/../../configurations/databaseCredentials.json');
            if ($fileContent == NULL) throw new Exception("Error during the collection of data from the file.");

            $databaseCredentials = json_decode($fileContent);
            if ($databaseCredentials == NULL) throw new Exception("Error during the decoding of the json file.");
            
            $serverNameKey = "serverName";
            $userNameKey = "userName";
            $passwordKey = "password";
            $dbNameKey = "dbName";

            $this->serverName = $databaseCredentials->$serverNameKey;
            $this->serverName = $databaseCredentials->$userNameKey;
            $this->serverName = $databaseCredentials->$passwordKey;
            $this->serverName = $databaseCredentials->$dbNameKey;
        }

        function connect() {
            $this->connection = new mysqli(
                $this->serverNameKey, 
                $this->userNameKey, 
                $this->passwordKey, 
                $this->dbNameKey
            );

            if ($this->connection->connect_error) throw new Exception("Error during the connection to the database.");
        }
    }
?>