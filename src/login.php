<?php
session_start();
include 'connect.php';

class Auth {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($email, $password, $remember) {
        try {
            //Felhasználó keresése
            $user = $this->getUserByEmail($email);
            
            if ($user && password_verify($password, $user['password'])) {
                $token = $this->getOrCreateToken($user['user_id']);
                
                //sikeres belépés, session és cookie beállítások
                $this->setSession($email, $user['firstname']);
                $this->setCookies($token, $remember);

                header("Location: /bookshop/web/index.php");
                exit();
            } else {
                throw new Exception("Érvénytelen email vagy jelszó.");
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header("Location: /bookshop/web/logination.php");
            exit();
        }
    }

    public function logout() {
        if (isset($_COOKIE['token'])) {
            setcookie('token', '', time() - 3600, "*", "", false, true);
        }

        session_unset();
        session_destroy();

        header("Location: /bookshop/web/login.php");
        exit();
    }

    private function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
    }

    private function getOrCreateToken($userId) {

        $tokenData = $this->getExistingToken($userId);

        if ($tokenData) {
            return $tokenData['token'];
        }

        return $this->generateNewToken($userId);
    }

    private function getExistingToken($userId) {
        $sql = "SELECT * FROM user_tokens WHERE user_id = ? AND expires_at > NOW() LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
    }

    private function generateNewToken($userId) {
        $token = bin2hex(random_bytes(32));
        $expires_at = date('Y-m-d H:i:s', strtotime('+30 days'));

        $sql = "INSERT INTO user_tokens (user_id, token, expires_at) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $userId, $token, $expires_at);
        $stmt->execute();
        
        return $token;
    }

    private function setSession($email, $firstname) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $firstname; //firstname
    }

    private function setCookies($token, $remember) {
        setcookie('token', $token, time() + (86400 * 30), "/");
    }
}

$email = $_POST['email'];
$password = $_POST['password'];
$remember = isset($_POST['remember']);


$auth = new Auth($conn);
$auth->login($email, $password, $remember);
?>
