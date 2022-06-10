<?php
    
    // TODO in each function check if it's an INT a STRING, ...
    class DatabaseManager 
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
            return $this->connection->query("SELECT b.*, COUNT(a.beer_id) AS nb_advices, AVG(a.rate) AS rate_average FROM beer b LEFT JOIN advice a ON b.id = a.beer_id GROUP BY b.id;");
        }

        function getBeer($name) 
        {
            if ($this->connection == NULL) return NULL;

            $sql = "SELECT b.*, COUNT(a.beer_id) AS nb_advices, AVG(a.rate) as rate_average FROM beer b LEFT JOIN advice a ON b.id = a.beer_id WHERE LOWER(b.name) = LOWER(?) GROUP BY b.id";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $name);
            $stmt->execute();
            
            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function getAdvices($beer_id)
        {
            if ($this->connection == NULL) return NULL;

            $sql = "SELECT a.*, u.name AS userName FROM advice a LEFT JOIN user u ON a.user_id = u.id WHERE beer_id = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'i', $beer_id);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function addAdvice($beer_id, $user_id, $rate, $title, $comment)
        {
            if ($this->connection == NULL) return NULL;

            $sql = "INSERT INTO advice (beer_id, user_id, rate, title, comment) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'iiiss', $beer_id, $user_id, $rate, $title, $comment);
            
            if (!$stmt->execute()) {
                return NULL;
            }
        }
    }
?>