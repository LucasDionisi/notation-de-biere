<?php
    
    // TODO in each function check if it's an INT a STRING, ...
    class DatabaseManager {
        private $serverName;
        private $userName;
        private $password;
        private $dbName;

        private $connected;

        private $connection = NULL;

        function __construct() {
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

        function __destruct() {
            if ($this->connected == true) {
                $this->connection->close();
            }
        }

        function connect() {
            if ($this->connected) {
                return;
            }

            $this->connection = new mysqli(
                $this->serverName, 
                $this->userName, 
                $this->password, 
                $this->dbName
            );

            $this->connected = true;
            $this->connection->set_charset("utf8mb4");

            if ($this->connection->connect_error) throw new Exception("Error during the connection to the database.");
        }

        function disconnect() {
            $this->connection->close();
            $this->connected = false;
        }

        function getBeers($name, $first, $last) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT b.*, COUNT(a.beer_id) AS nb_advices, AVG(a.rate) AS rate_average, bs.name AS beerStyle FROM beer b LEFT JOIN advice a ON b.id = a.beer_id LEFT JOIN beer_style bs ON b.style_id = bs.id WHERE LOWER(b.name) LIKE LOWER(CONCAT('%', ?, '%')) GROUP BY b.id ORDER BY b.id ASC LIMIT ?, ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'sii', $name, $first, $last);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function getBeer($name) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT b.*, COUNT(a.beer_id) AS nb_advices, AVG(a.rate) AS rate_average, bs.name AS beerStyle FROM beer b LEFT JOIN advice a ON b.id = a.beer_id LEFT JOIN beer_style bs ON b.style_id = bs.id WHERE LOWER(b.name) = LOWER(?) GROUP BY b.id";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $name);
            $stmt->execute();
            
            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function addBeer($name, $style, $infomration, $alcohol, $imageName, $userId) {
            if (! isset($this->connection)) return NULL;

            $sql = "INSERT INTO beer (name, style_id, information, alcohol_level, image_name, created_by) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'sisdsi', $name, $style, $infomration, $alcohol, $imageName, $userId);

            return $stmt->execute();
        }

        function getUserByCredentials($email, $password) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT u.*, c.password FROM user u LEFT JOIN user_credential c ON u.id = c.user_id WHERE u.email = ? AND c.password = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function createUser($email, $pseudo, $passwordCrypted, $validationToken) {
            if (! isset($this->connection)) return NULL;

            $sql = "INSERT INTO user (email, pseudo, validation_token) VALUES (?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'sss', $email, $pseudo, $validationToken);
            $stmt->execute();

            $sql = "SELECT id FROM user WHERE email = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $email);
            $stmt->execute();
            $res = $stmt->get_result();

            $sql = "INSERT INTO user_credential (user_id, password) VALUES (?, ?)";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'is', $res->fetch_assoc()['id'], $passwordCrypted);
            $stmt->execute();
        }

        function getUserByEmail($email) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT id, pseudo, is_validated FROM user WHERE email = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $email);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function getUserByPseudo($pseudo) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT id, email, pseudo FROM user WHERE pseudo = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $pseudo);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function getUserByValidationToken($validationToken) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT is_validated FROM user WHERE validation_token = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $validationToken);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function validateUser($validationToken) {
            if (! isset($this->connection)) return NULL;

            $sql = "UPDATE user SET is_validated = 1, validation_token = NULL where validation_token = ?";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 's', $validationToken);
            $stmt->execute();
            $stmt->close();
        }

        function getSalt() {
            if (! isset($this->connection)) return NULL;
            return $this->connection->query('SELECT * FROM configuration WHERE param = "salt"');
        }

        function getAdvices($beer_id) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT a.*, u.pseudo AS pseudo FROM advice a LEFT JOIN user u ON a.user_id = u.id WHERE beer_id = ? ORDER BY a.created_at DESC";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'i', $beer_id);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function getAdvicesByUserId($userId) {
            if (! isset($this->connection)) return NULL;

            $sql = "SELECT a.*, b.image_name, b.name AS beer_name FROM advice a LEFT JOIN beer b ON a.beer_id = b.id WHERE a.user_id = ? ORDER BY a.created_at DESC";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'i', $userId);
            $stmt->execute();

            $res = $stmt->get_result();
            $stmt->close();

            return $res;
        }

        function addAdvice($beer_id, $user_id, $rate, $title, $comment) {
            if (! isset($this->connection)) return NULL;

            $sql = "INSERT INTO advice (beer_id, user_id, rate, title, comment) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, 'iiiss', $beer_id, $user_id, $rate, $title, $comment);
            
            if (!$stmt->execute()) {
                return NULL;
            }
        }

        function getBeerStyle() {
            if (! isset($this->connection)) return NULL;
            return $this->connection->query('SELECT * FROM beer_style');
        }
    }
?>