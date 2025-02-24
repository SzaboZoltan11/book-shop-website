<?php
session_start();
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$remember = isset($_POST['remember']);

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;

        // Ellenőrizd, van-e már érvényes token
        $checkTokenSql = "SELECT * FROM user_tokens WHERE user_id = ? AND expires_at > NOW() LIMIT 1";
        $checkTokenStmt = $conn->prepare($checkTokenSql);
        $checkTokenStmt->bind_param("i", $user['user_id']);
        $checkTokenStmt->execute();
        $tokenResult = $checkTokenStmt->get_result();

        if ($tokenResult->num_rows > 0) {
            $tokenData = $tokenResult->fetch_assoc();
            $token = $tokenData['token'];
        } else {
            // Token generálása
            $token = bin2hex(random_bytes(32));
            $expires_at = date('Y-m-d H:i:s', strtotime('+30 days'));

            // Token mentése a user_tokens táblába
            $insertSql = "INSERT INTO user_tokens (user_id, token, expires_at) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("iss", $user['user_id'], $token, $expires_at);
            $insertStmt->execute();
            $insertStmt->close();
        }

        $checkTokenStmt->close();

        // Cookie-k beállítása
        if ($remember) {
            if (!isset($_COOKIE['email'])) {
                setcookie('email', $email, time() + (86400 * 30), "/", "", false, true);
            }
            if (!isset($_COOKIE['token'])) {
                setcookie('token', $token, time() + (86400 * 30), "/", "", false, true);
            }
        } else {
            if (isset($_COOKIE['email'])) {
                setcookie('email', '', time() - 3600, "/");
            }
            if (isset($_COOKIE['token'])) {
                setcookie('token', '', time() - 3600, "/");
            }
        }

        header("Location: /bookshop/web/success.php");
        exit();
    } else {
        $_SESSION['error'] = "Érvénytelen email vagy jelszó.";
        header("Location: /bookshop/web/logination.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Érvénytelen email vagy jelszó.";
    header("Location: /bookshop/web/logination.php");
    exit();
}

$stmt->close();
?>
