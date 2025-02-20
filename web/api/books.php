<?php

include '../connect.php';

$sql = "SELECT * FROM books";
$req = $conn->prepare($sql);
$req->execute();
$result = $req->get_result();

$books = [];

while ($book = $result->fetch_assoc()) {
    $books[] = $book;
}

header("Content-Type: application/json");
echo json_encode($books);
