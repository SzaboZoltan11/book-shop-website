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
    $expires = date("U") + 1800;

    $sql = "INSERT INTO password_reset (email, token, expires) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $email, $token, $expires);
    $stmt->execute();

    $reset_link = "http://localhost/bookshop/web/php_password_reset/reset_password.php?token=" . $token;
    $subject = "Jelszó visszaállítása";
    $message = "Klikkeljen ide a jelszó visszaállításához: " . $reset_link;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Username = 'botmester420@gmail.com';
        $mail->Password = 'asd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('no-reply@yourwebsite.com', 'Bookshop');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
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
