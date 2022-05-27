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
            $this->userName = $databaseCredentials->$userNameKey;
            $this->password = $databaseCredentials->$passwordKey;
            $this->dbName = $databaseCredentials->$dbNameKey;
        }

        function connect() {
            $this->connection = new mysqli(
                $this->serverName, 
                $this->userName, 
                $this->password, 
                $this->dbName
            );

            if ($this->connection->connect_error) throw new Exception("Error during the connection to the database.");
        }
    }
?>