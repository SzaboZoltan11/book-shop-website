
<?php
session_start();
include '../../src/connect.php';

$token = $_POST['token'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "SELECT email FROM password_reset WHERE token = ? AND expires > ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $token, date("U"));
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];

    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $password, $email);
    $stmt->execute();

    $sql = "DELETE FROM password_reset WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $_SESSION['success'] = "Jelszó sikeresen frissítve.";
    header("Location: /bookshop/web/logination.php");
} else {
    $_SESSION['error'] = "Érvénytelen vagy lejárt token.";
    header("Location: /bookshop/web/php_password_reset/forgot_password.php");
}

$stmt->close();
?>
