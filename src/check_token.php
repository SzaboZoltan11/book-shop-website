<?php
session_start();
include_once 'connect.php';

class TokenAuthenticator {
    public string|null $currentToken;
    public string|null $currentUserId;
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
        $this->currentToken = null;
        $this->currentUserId = null;
    }

    public function authenticate() {
        if (!isset($_SESSION['email']) && isset($_COOKIE['token'])) {
            $this->currentToken = $_COOKIE['token'];
            
            try {
                $this->currentUserId = $this->validateToken($this->currentToken);
                if ($this->currentUserId) {
                    $this->setUserSession($this->currentUserId);
                }
            } catch (Exception $e) {
                error_log("Authentication error: " . $e->getMessage());
            }
        }
    }

    private function validateToken($token) {
        $sql = "SELECT user_id FROM user_tokens WHERE token = ? AND expires_at > NOW() LIMIT 1";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($row = $result->fetch_assoc()) {
                return $row['user_id'];
            }
            $stmt->close();
        }
        return false;
    }

    private function setUserSession($userId) {
        $sql = "SELECT email, firstname FROM users WHERE user_id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($user = $result->fetch_assoc()) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['firstname'];
            }
            $stmt->close();
        }
    }
}

$authenticator = new TokenAuthenticator($conn);
$authenticator->authenticate();
?>
