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

        if ($remember) {
            setcookie('email', $email, time() + (86400 * 30), "/"); 
            setcookie('password', $password, time() + (86400 * 30), "/"); 
        } else {
            if (isset($_COOKIE['email'])) {
                setcookie('email', '', time() - 3600, "/");
            }
            if (isset($_COOKIE['password'])) {
                setcookie('password', '', time() - 3600, "/");
            }
        }

        header("Location: /bookshop/web/success.php");
    } else {
        $_SESSION['error'] = "Érvénytelen email vagy jelszó.";
        header("Location: /bookshop/web/logination.php");
    }
} else {
    $_SESSION['error'] = "Érvénytelen email vagy jelszó.";
    header("Location: /bookshop/web/logination.php");
}

$stmt->close();
?>
