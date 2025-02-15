<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'konyvwebaruhaz';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Hiba az adatbázishoz való csatlakozás közben: " . $conn->connect_error);
}

?>
