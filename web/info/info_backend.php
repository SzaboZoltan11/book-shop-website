<?php
include '../../src/connect.php';

if (isset($_GET['bookId'])) {
    $bookId = $_GET['bookId'];

    $sql = "SELECT * FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        
        echo json_encode([
            'cover' => $book['cover'],
            'title' => $book['title'],
            'price' => number_format($book['price'], 0, '', ' ') . ' Ft',
            'author' => $book['author'],
            'description' => $book['description'],
            'pages' => $book['pages'],
            'release_date' => $book['release_date'],
            'isbn' => $book['isbn']
        ]);
        
    } else {
        echo json_encode(['error' => 'A könyv nem található.']);
    }
} else {
    echo json_encode(['error' => 'Nincs könyv megadva.']);
}
?>
