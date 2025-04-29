<?php

include_once '../../src/connect.php';
include_once '../../src/check_token.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT discount, id FROM game WHERE user_id = ?";
    $req = $conn->prepare($sql);
    $req->bind_param("i", $authenticator->currentUserId);
    $req->execute();
    $result = $req->get_result();
    
    $discounts = [];
    
    while ($v = $result->fetch_assoc()) {
        $discounts[] = $v;
    }
    
    header("Content-Type: application/json");
    echo json_encode($discounts);
} else {
    die ('Method ' . $_SERVER['REQUEST_METHOD'] . ' not allowed');
}
