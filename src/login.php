<?php
session_start();

include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;
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
