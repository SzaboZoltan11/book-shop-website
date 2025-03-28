<?php
include '../../src/connect.php';

$categoryId = $_GET['category_id'] ?? 2;  

$sql = "SELECT c.name FROM category c WHERE c.category_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $categoryId);
$stmt->execute();
$result = $stmt->get_result();

$categoryName = null;

if ($result->num_rows > 0) {
    $category = $result->fetch_assoc();
    $categoryName = $category['name'];
}

if (!$categoryName) {
    echo json_encode(['error' => 'Nem található kategória a megadott ID-val.']);
    exit;
}

$sql = "SELECT b.* FROM books b
        INNER JOIN book_category bc ON b.book_id = bc.book_id
        INNER JOIN category c ON bc.category_id = c.category_id
        WHERE c.category_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $categoryId);
$stmt->execute();
$result = $stmt->get_result();

$books = [];

if ($result->num_rows > 0) {
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
    echo json_encode(['category_name' => $categoryName, 'books' => $books]);
} else {
    echo json_encode(['error' => 'Nem találhatóak könyvek ezen kategóriában.']);
}
?>
