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



header("Location: /bookshop/web/admin/admin.php?success=2");
exit;
?>

