<?php
session_start();
include '../../src/connect.php';

require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $token = bin2hex(random_bytes(50));
    $created_at = date("Y-m-d H:i:s");
    $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));
    
    $sql = "INSERT INTO password_reset (email, token, created_at, expires) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $token, $created_at, $created_at);
    $stmt->execute();
    
    $sql = "UPDATE password_reset SET expires = ? WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $expires, $token);
    $stmt->execute();
    
    $stmt->close();

    $reset_link = "http://localhost/bookshop/web/php_password_reset/reset_password.php?token=" . $token;
    $subject = "Jelszó visszaállítása";
    $message = "Klikkeljen ide a jelszó visszaállításához: " . $reset_link;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Username = 'szabozola91@gmail.com';
        $mail->Password = 'ainv ylik pteo ymle';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('no-reply@yourwebsite.com', 'Bookshop');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
        $mail->Body = $message;

        $mail->send();
        $_SESSION['success'] = "Email elküldve a jelszó visszaállításához.";
    } catch (Exception $e) {
        $_SESSION['error'] = "Email küldés sikertelen: {$mail->ErrorInfo}";
    }

    header("Location: /bookshop/web/logination.php");
} else {
    $_SESSION['error'] = "Ez az email cím nem található.";
    header("Location: /bookshop/web/forgot_password.php");
}

$stmt->close();
?>
