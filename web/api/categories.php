<?php

include '../connect.php';

$sql = "SELECT * FROM category";
$req = $conn->prepare($sql);
$req->execute();
$result = $req->get_result();

$categories = [];

while ($category = $result->fetch_assoc()) {
    $categories[] = $category;
}

header("Content-Type: application/json");
echo json_encode($categories);
