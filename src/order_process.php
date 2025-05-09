<?php
include_once './connect.php';
include_once './check_token.php';
require_once './order_validator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['cart'])) {
        print('Parameter "cart" is required');
        die;
    }

    $validator = new Validator($_POST);

    if (!$validator->validate()) {
        $_SESSION['error'] = implode("<br>", $validator->getErrors());
        header('Location: ../web/checkout.php'); // 
        exit;
    }
    
    $name = $_POST['name'];
    $user_id = $authenticator->currentUserId;
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $payment = $_POST['payment'];
    $discountId = $_POST['discount'];
    $discount = 0;

    if (strlen($discountId)) {
        $discountQueryStatement = $conn->prepare("SELECT discount FROM game WHERE id = ?");
        $discountQueryStatement->bind_param("i", $discountId);

        if (!$discountQueryStatement->execute()) {
            throw new Exception("Hiba történt: " . $discountQueryStatement->error);
        }

        $result = $discountQueryStatement->get_result();
        while ($v = $result->fetch_assoc()) {
            $discount = $v['discount'];
        }

        if (!$discount) {
            throw new Exception("Hiba történt: A kupon értéke 0%");
        }
    }
    
    $insertStatement = $conn->prepare("INSERT INTO orders (user_id, name, address, postal_code, city, payment, discount) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insertStatement->bind_param("isssssi", $user_id, $name, $address, $postal_code, $city, $payment, $discount);

    if (!$insertStatement->execute()) {
        throw new Exception("Hiba történt: " . $insertStatement->error);
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

    
    if (strlen($discountId)) {
        $deleteStatement = $conn->prepare("DELETE FROM game WHERE id = ?");
        $deleteStatement->bind_param("i", $discountId);

        if (!$deleteStatement->execute()) {
            throw new Exception("Hiba történt: " . $deleteStatement->error);
        }
    }

    $_SESSION['success'] = "A megrendelés sikeresen leadva!";
    header("Location: /bookshop/web");
} else {
    print('Method not allowed');
}
?>
