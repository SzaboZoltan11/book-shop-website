<?php

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $address = $_POST['address'];
    $accept_newsletter = isset($_POST['accept']) ? 1 : 0;

    if ($password !== $password_confirm) {
        echo "A két jelszó nem egyezik.";
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $stmt = $conn->prepare("INSERT INTO users (surname, firstname, email, password, phone_number, address, accept_newsletter) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $surname, $firstname, $email, $hashed_password, $phone_number, $address, $accept_newsletter);

        if ($stmt->execute()) {
            echo "Regisztráció sikeres!";
        } else {
            echo "Hiba történt: " . $stmt->error;
        }

        $stmt->close();
    }
}

?>
