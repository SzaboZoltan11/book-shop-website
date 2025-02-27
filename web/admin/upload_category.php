<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die ('Method not allowed');
}

include '../connect.php';

$name = $_POST['name'];

$sql = "INSERT INTO category (name)
VALUES ('$name')";

if (!$conn->query($sql)) {
    echo "Nem jó: " . $sql . "<br>" . $conn->error;
    $conn->close();
    die;
}

echo "Kategória hozzáadva";

$conn->close();
?>
