<?php
include '../../src/connect.php';

$sql = "SELECT * FROM books WHERE electronic = 1"; 
$stmt = $conn->prepare($sql);
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
    echo json_encode($books);
} else {
    echo json_encode(['error' => 'Nem található elektronikus könyv.']);
}
?>
