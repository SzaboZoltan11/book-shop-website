<?php
session_start();
include 'connect.php';

$errors = [];

function formatPhoneNumber($phone_number) {
    $phone_number = preg_replace('/[^0-9+]/', '', $phone_number);

    if (substr($phone_number, 0, 2) === '06') {
        $phone_number = '+36' . substr($phone_number, 2);
    }
    
    if (substr($phone_number, 0, 3) === '+36') {
        $phone_number = '+36(' . substr($phone_number, 3, 2) . ')' . substr($phone_number, 5);
    } else {
        if (substr($phone_number, 0, 4) === '+363') {
            $phone_number = '+36(' . substr($phone_number, 3, 2) . ')' . substr($phone_number, 5);
        } else {
            $phone_number = '+36(' . substr($phone_number, 0, 2) . ')' . substr($phone_number, 2);
        }
    }

    return $phone_number;
}

function validatePassword($password) {
    $pattern = '/^(?=.*[0-9])(?=.*[\W_]).{8,}$/';
    if (!preg_match($pattern, $password)) {
        return false;
    }
    return true;
}

function isEmailRegistered($email, $conn) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $isRegistered = $result->num_rows > 0;
    $stmt->close();
    return $isRegistered;
}

function isPhoneNumberRegistered($phone_number, $conn) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE phone_number = ?");
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $isRegistered = $result->num_rows > 0;
    $stmt->close();
    return $isRegistered;
}

function validateName($name) {
    return preg_match('/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ]+$/u', $name);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $surname = trim($_POST['surname']);
    $firstname = trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $accept_newsletter = isset($_POST['accept']) ? 1 : 0;

    if (!validateName($surname)) {
        $errors[] = "A vezetéknév csak betűket tartalmazhat.";
    }

    if (!validateName($firstname)) {
        $errors[] = "A keresztnév csak betűket tartalmazhat.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Érvénytelen email cím.";
    } else if (isEmailRegistered($email, $conn)) {
        $errors[] = "Ez az email cím már regisztrálva van.";
    }

    if (!validatePassword($password)) {
        $errors[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie, tartalmaznia kell legalább egy számot és egy speciális karaktert.";
    }

    if ($password !== $password_confirm) {
        $errors[] = "A két jelszó nem egyezik.";
    }

    $phone_number = formatPhoneNumber($phone_number);

    if (!preg_match("/^\+36\([0-9]{2}\)[0-9]{7,8}$/", $phone_number)) {
        $errors[] = "Érvénytelen telefonszám formátum.";
    } else if (isPhoneNumberRegistered($phone_number, $conn)) {
        $errors[] = "Ez a telefonszám már regisztrálva van.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (surname, firstname, email, password, phone_number, accept_newsletter) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $surname, $firstname, $email, $hashed_password, $phone_number, $accept_newsletter);

        if ($stmt->execute()) {
            header("Location: /bookshop/web/success.php");
            exit;
        } else {
            $errors[] = "Hiba történt: " . $stmt->error;
        }

        $stmt->close();
    }

    $_SESSION['errors'] = $errors;
    header("Location: /bookshop/web/registration.php");
    exit;
}
?>
