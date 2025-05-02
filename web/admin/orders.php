<?php
include '../../src/connect.php';

$stmt = $conn->prepare(
    "SELECT orders.*, 
            SUM(books.price) * (1 - orders.discount / 100) AS price 
     FROM orders
     JOIN ordered_book ON ordered_book.order_id = orders.id
     JOIN books ON books.book_id = ordered_book.book_id
     GROUP BY orders.id"
);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Rendelések</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<div class="navbar-header">
    <a class="navbar-brand" href="../index.php">
        <img src="../img/logo.png" alt="Logo" height="80px">
    </a>
    <h1 class="navbar-title">Rendelések</h1>
</div>

<?php
while ($order = $result->fetch_assoc()) {
    echo '<div class="order">';
    echo '<h3>Rendelés #' . htmlspecialchars($order['id']) . '</h3>';
    
    foreach ($order as $key => $value) {
        if ($key === 'price') {
            $value = number_format($value, 0, '', ' ') . ' Ft';
        }
        echo '<p><span class="label">' . htmlspecialchars($key) . ':</span> ' . htmlspecialchars($value) . '</p>';
    }

    echo '</div>';
}
?>

</body>
</html>
