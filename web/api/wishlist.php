<?php

include_once '../../src/connect.php';
include_once '../../src/check_token.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT book_id FROM wishlist WHERE user_id = ?";
    $req = $conn->prepare($sql);
    $req->bind_param("i", $authenticator->currentUserId);
    $req->execute();
    $result = $req->get_result();
    
    $wishlist = [];
    
    while ($v = $result->fetch_assoc()) {
        $wishlist[] = $v;
    }
    
    header("Content-Type: application/json");
    echo json_encode($wishlist);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST["book_id"])) {
        die ('Argument "book_id" is required');
    }
    $sql = "INSERT INTO book_id (`user_id`, `book_id`) VALUES (?, ?)";
    $req = $conn->prepare($sql);
    $req->bind_param("ii", $authenticator->currentUserId, $_POST["book_id"]);
    $req->execute();

    echo 'OK';
} else {
    die ('Method ' . $_SERVER['REQUEST_METHOD'] . ' not allowed');
}
