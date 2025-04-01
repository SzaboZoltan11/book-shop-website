<?php
include '../../src/connect.php';


$categoryIds = $_GET['category_id'] ?? '3';

if (!is_array($categoryIds)) {
    $categoryIds = explode(',', $categoryIds);
}

$categoryIds = array_map('intval', $categoryIds); 

// Kategória nevek lekérése
$placeholders = implode(',', array_fill(0, count($categoryIds), '?'));
$sql = "SELECT name FROM category WHERE category_id IN ($placeholders)";
$stmt = $conn->prepare($sql);

// Bind paraméterek dinamikusan
$stmt->bind_param(str_repeat('i', count($categoryIds)), ...$categoryIds);
$stmt->execute();
$result = $stmt->get_result();

$categoryNames = [];
while ($row = $result->fetch_assoc()) {
    $categoryNames[] = $row['name'];
}

if (empty($categoryNames)) {
    echo json_encode(['error' => 'Nem található kategória a megadott ID-kkal.']);
    exit;
}

// Könyvek lekérése
$sql = "SELECT b.* FROM books b
        INNER JOIN book_category bc ON b.book_id = bc.book_id
        INNER JOIN category c ON bc.category_id = c.category_id
        WHERE c.category_id IN ($placeholders)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(str_repeat('i', count($categoryIds)), ...$categoryIds);
$stmt->execute();
$result = $stmt->get_result();

$books = [];

while ($book = $result->fetch_assoc()) {
    $books[] = [
        'cover' => $book['cover'],
        'title' => $book['title'],
        'price' => number_format($book['price'], 0, '', ' ') . ' Ft',
        'author' => $book['author'],
        'description' => $book['description'],
        'pages' => $book['pages'],
        'release_date' => $book['release_date'],
        'isbn' => $book['isbn']
    ];
}

echo json_encode([
    'category_names' => $categoryNames,
    'books' => $books
]);
