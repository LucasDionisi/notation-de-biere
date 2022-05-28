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

        function connect() 
        {
            $this->connection = new mysqli(
                $this->serverName, 
                $this->userName, 
                $this->password, 
                $this->dbName
            );

            if ($this->connection->connect_error) throw new Exception("Error during the connection to the database.");
        }

        function disconnect()
        {
            $this->connection->close();
        }

        function getBeers()
        {
            return $this->connection->query("SELECT b.*, COUNT(a.biereID) AS nbAvis, AVG(a.note) AS noteMoyenne FROM biere b LEFT JOIN avis a ON b.id = a.biereID GROUP BY b.id;");
        }

        function getBeer($name) 
        {
            if ($this->connection == NULL) return NULL;

            $sql = "SELECT * FROM biere WHERE LOWER(nom) = LOWER(?)";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $name);
            $stmt->execute();
            
            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }
    }
?>