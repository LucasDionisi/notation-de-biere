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

            $sql = "SELECT b.*, COUNT(a.biereID) AS nbAvis, AVG(a.note) as noteMoyenne FROM biere b LEFT JOIN avis a ON b.id = a.biereID WHERE LOWER(b.nom) = LOWER(?) GROUP BY b.id";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $name);
            $stmt->execute();
            
            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function getAdvices($beerID)
        {
            if ($this->connection == NULL) return NULL;

            $sql = "SELECT a.*, u.nom AS userName FROM avis a LEFT JOIN user u ON a.userID = u.id WHERE biereID = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'i', $beerID);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }
    }
?>