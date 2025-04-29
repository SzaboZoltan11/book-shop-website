<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Method not allowed');
}

include '../../src/connect.php';
include '../../src/check_token.php';


$isbn = $_POST['isbn'] ?? '';

if (empty($isbn)) {
    die('ISBN megadása kötelező');
}

$sql = "SELECT book_id, cover FROM books WHERE isbn = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('SQL hiba: ' . $conn->error); 
}

$stmt->bind_param("s", $isbn);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die('Nem található könyv ezzel az ISBN-nel');
}

$book = $result->fetch_assoc();
$bookId = $book['book_id'];
$coverFile = $book['cover'];

$sql = "DELETE FROM book_category WHERE book_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('SQL hiba: ' . $conn->error); 
}

$stmt->bind_param("i", $bookId);
if (!$stmt->execute()) {
    echo "Hiba a kategóriák törlésénél: " . $stmt->error;
    $conn->close();
    die;
}

$sql = "DELETE FROM books WHERE book_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('SQL hiba: ' . $conn->error); 
}

$stmt->bind_param("i", $bookId);
if (!$stmt->execute()) {
    echo "Hiba a könyv törlésénél: " . $stmt->error;
    $conn->close();
    die;
}

$coverPath = realpath(__DIR__ . '/../../database/covers/' . $coverFile . '.png');
if ($coverPath && file_exists($coverPath)) {
    unlink($coverPath);
}

$conn->close();

header("Location: /bookshop/web/admin/admin.php?success=3");
exit;
?>
