<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Method not allowed');
}

include '../../src/connect.php';

function make_dir(string $path)
{
    return is_dir($path) || mkdir($path, 0777, true);
}

$title = $_POST['title'];
$price = $_POST['price'];
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$status = $_POST['status'];
$description = $_POST['description'];
$pages = $_POST['pages'];
$electronic = $_POST['electronic'];
$release_date = $_POST['release_date'];

$categories = explode(',', $_POST['categories'] ?? '');

$file_name = bin2hex(random_bytes(8)); //16

chdir('..');
$databaseConversDir = getcwd() . '/database/covers/';
make_dir($databaseConversDir);
move_uploaded_file($_FILES["cover"]['tmp_name'], $databaseConversDir . $file_name . ".png");

$sql = "INSERT INTO books (title, price, isbn, author, status, description, pages, electronic, release_date, cover)
VALUES ('$title', '$price', '$isbn', '$author', '$status', '$description', '$pages', '$electronic', '$release_date', '$file_name')";

if (!$conn->query($sql)) {
    echo "Nem jó a könyv feltöltés: " . $sql . "<br>" . $conn->error;
    $conn->close();
    die;
}

$bookId = $conn->insert_id;

foreach ($categories as $category) {
    $sql = "INSERT INTO book_category (book_id, category_id)
    VALUES ('$bookId', '$category')";

    if (!$conn->query($sql)) {
        echo "Nem jó hozzáadni a $category kategóriához: " . $sql . "<br>" . $conn->error;
        $conn->close();
        die;
    }
}

$conn->close();


header("Location: /bookshop/web/admin/admin.php?success=1");
exit;
?>
