<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die ('Method not allowed');
}

include '../../src/connect.php';

$name = $_POST['name'];

$sql = "INSERT INTO category (name)
VALUES ('$name')";

if (!$conn->query($sql)) {
    echo "Nem jó: " . $sql . "<br>" . $conn->error;
    $conn->close();
    die;
}

$conn->close();
?>

<h1>
    Kategória hozzáadva
</h1>

<a href="/bookshop/web/admin/admin.php">OK</a>
