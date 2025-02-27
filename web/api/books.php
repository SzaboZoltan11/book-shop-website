<?php

include '../connect.php';

$req = null;
if (isset($_GET['category']))
{
    $sql = "SELECT * FROM books JOIN book_category ON book_category.book_id = books.book_id AND book_category.category_id = ?";
    $req = $conn->prepare($sql);
    $req->bind_param("s", $_GET['category']);
}
else
{
    $sql = "SELECT * FROM books";
    $req = $conn->prepare($sql);
}
$req->execute();
$result = $req->get_result();

$books = [];

while ($book = $result->fetch_assoc()) {
    $books[] = $book;
}

header("Content-Type: application/json");
echo json_encode($books);
