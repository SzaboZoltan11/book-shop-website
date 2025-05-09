<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Method not allowed');
}

include '../../src/connect.php';
include '../../src/check_token.php';

$categoryId = $_POST['category_id'] ?? '';

if (empty($categoryId)) {
    die('Kategória azonosító megadása kötelező');
}

$sql = "SELECT COUNT(*) AS book_count FROM book_category WHERE category_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('SQL hiba: ' . $conn->error);
}

$stmt->bind_param("i", $categoryId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['book_count'] > 0) {
    $sql = "DELETE FROM book_category WHERE category_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('SQL hiba a könyvek törlésénél: ' . $conn->error);
    }

    $stmt->bind_param("i", $categoryId);
    if (!$stmt->execute()) {
        echo "Hiba a könyvek törlésénél: " . $stmt->error;
        $conn->close();
        die;
    }

    $sql = "DELETE FROM books WHERE book_id NOT IN (SELECT book_id FROM book_category)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('SQL hiba a könyvek törlésénél: ' . $conn->error);
    }

    if (!$stmt->execute()) {
        echo "Hiba a könyvek törlésénél: " . $stmt->error;
        $conn->close();
        die;
    }
}


$sql = "DELETE FROM category WHERE category_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('SQL hiba a kategória törlésénél: ' . $conn->error);
}

$stmt->bind_param("i", $categoryId);
if (!$stmt->execute()) {
    echo "Hiba a kategória törlésénél: " . $stmt->error;
    $conn->close();
    die;
}

$conn->close();

header("Location: /bookshop/web/admin/admin.php?success=4");
exit;
