<?php
include_once './connect.php';
include_once './check_token.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['cart'])) {
        print('Parameter "cart" is required');
        die;
    }

    $user_id = $authenticator->currentUserId;
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $payment = $_POST['payment'];

    $stmt1 = $conn->prepare("INSERT INTO orders (user_id, address, postal_code, city, payment) VALUES (?, ?, ?, ?, ?)");
    $stmt1->bind_param("isiss", $user_id, $address, $postal_code, $city, $payment);

    if (!$stmt1->execute()) {
        throw new Exception("Hiba történt: " . $stmt1->error);
    }

    $cart = json_decode($_POST['cart']);
    $orderId = $conn->insert_id;
    foreach ($cart as $item) {
        $stmt2 = $conn->prepare("INSERT INTO ordered_book (order_id, book_id) VALUES (?, ?)");
        $stmt2->bind_param("ii", $orderId, $item->book_id);
        if (!$stmt2->execute()) {
            throw new Exception("Hiba történt: " . $stmt2->error);
        }
    }

    header("Location: /bookshop/web");
} else {
    print('Method not alloved');
}
