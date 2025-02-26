<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die ('Method not allowed');
}

include '../connect.php';


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
$category = $_POST['category'];

$file_name = bin2hex(random_bytes(8)); //16

chdir('..');
$databaseConversDir = getcwd() . '\\database\\covers\\';
make_dir($databaseConversDir);
move_uploaded_file($_FILES["cover"]['tmp_name'], $databaseConversDir . $file_name . ".png");

$sql = "INSERT INTO books (title, price, isbn, author, status, description, pages, electronic, release_date, category, cover)
VALUES ('$title', '$price', '$isbn', '$author', '$status', '$description', '$pages', '$electronic', '$release_date', '$category', '$file_name')";

if ($conn->query($sql) === TRUE) {
    echo "Feltöltöttél egy könyvet";
} else {
    echo "Hiba: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
