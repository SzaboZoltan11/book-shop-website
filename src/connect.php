<?php
class DatabaseConnection {
    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = '';
    private $database = 'konyvwebaruhaz';
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if ($this->conn->connect_error) {
                throw new Exception("Hiba az adatbázishoz való csatlakozás közben: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

$db = new DatabaseConnection();
$conn = $db->getConnection();

?>
