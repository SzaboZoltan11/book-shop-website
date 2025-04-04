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
    $entityBody = json_decode(file_get_contents('php://input'), true);
    if (!isset($entityBody["book_id"])) {
        die ('Argument "book_id" is required');
    }
    $sql = "INSERT INTO wishlist (user_id, book_id) VALUES (?, ?)";
    $req = $conn->prepare($sql);
    $req->bind_param("ii", $authenticator->currentUserId, $entityBody["book_id"]);
    $req->execute();
    
    echo json_encode([
        'a' => $authenticator->currentUserId,
        'b' =>  $entityBody["book_id"],
    ]);
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $entityBody = json_decode(file_get_contents('php://input'), true);
    if (!isset($entityBody["book_id"])) {
        die ('Argument "book_id" is required');
    }
    $sql = "DELETE FROM wishlist WHERE user_id = ? AND book_id = ? LIMIT 1";
    $req = $conn->prepare($sql);
    $req->bind_param("ii", $authenticator->currentUserId, $entityBody["book_id"]);
    $req->execute();

    echo 'OK';
} else {
    die ('Method ' . $_SERVER['REQUEST_METHOD'] . ' not allowed');
}
