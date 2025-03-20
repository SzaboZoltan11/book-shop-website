<?php
include '../../src/connect.php';

if (isset($_GET['startYear']) && isset($_GET['endYear'])) {
    $startYear = $_GET['startYear'];
    $endYear = $_GET['endYear'];

    $sql = "SELECT * FROM books WHERE release_date BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $startYear, $endYear); 
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
        echo json_encode(['error' => 'Nem találhatóak könyvek ebben az időszakban.']);
    }
} else {
    echo json_encode(['error' => 'Hiányzó paraméterek.']);
}
?>
