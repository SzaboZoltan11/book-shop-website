<?php
include '../../src/connect.php';

$result = [];

// Könyvek lekérése
$sql = "SELECT b.* FROM books b
        INNER JOIN book_category bc ON b.book_id = bc.book_id
        INNER JOIN category c ON bc.category_id = c.category_id"; 

$filterSql = "";
$filterTypes = "";
$filterValues = [];

if (isset($_GET['category_id'])) {
    $categoryIds = $_GET['category_id'];
    
    if (!is_array($categoryIds)) {
        $categoryIds = explode(',', $categoryIds);
    }
    
    if (count($categoryIds) == 0) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'A kategoriák megadása kőtelező.']);
        exit;
    }
    
    $categoryIds = array_map('intval', $categoryIds); 
    
    // Kategória nevek lekérése
    $placeholders = implode(',', array_fill(0, count($categoryIds), '?'));
    $categoriesStatement = $conn->prepare("SELECT name FROM category WHERE category_id IN ($placeholders)");
    
    // Bind paraméterek dinamikusan
    $categoriesStatement->bind_param(str_repeat('i', count($categoryIds)), ...$categoryIds);
    $categoriesStatement->execute();
    $categoriesResult = $categoriesStatement->get_result();
    
    $categoryNames = [];
    while ($categoriesRow = $categoriesResult->fetch_assoc()) {
        $categoryNames[] = $categoriesRow['name'];
    }

    if (empty($categoryNames)) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'Nem található kategória a megadott ID-kkal.']);
        exit;
    }

    $result['category_names'] = $categoryNames;

    if (strlen($filterSql) == 0) $filterSql .= " WHERE ";
    else $filterSql .= " AND ";

    $filterSql .= "c.category_id IN ($placeholders)";
    $filterTypes .= str_repeat('i', count($categoryIds));
    $filterValues += $categoryIds;
}

if (isset($_GET["electronic"])) {
    if (strlen($filterSql) == 0) $filterSql .= " WHERE ";
    else $filterSql .= " AND ";

    $filterSql .= "b.electronic = 1";
}

if (isset($_GET['startYear']) && isset($_GET['endYear'])) {
    $startYear = (int)$_GET['startYear'];
    $endYear = (int)$_GET['endYear'];

    if (strlen($filterSql) == 0) $filterSql .= " WHERE ";
    else $filterSql .= " AND ";

    $filterSql .= "b.release_date BETWEEN $startYear AND $endYear";
}

if (count($filterValues) != strlen($filterTypes)) {
    die("Something went wrong very badly");
}

$sql .= $filterSql;

$statement = $conn->prepare($sql);
if (count($filterValues) != 0) { $statement->bind_param($filterTypes, ...$filterValues); }
$statement->execute();
$booksResult = $statement->get_result();

$books = [];

while ($book = $booksResult->fetch_assoc()) {
    $books[] = [
        'id' => $book['book_id'],
        'cover' => $book['cover'],
        'title' => $book['title'],
        'price' => number_format($book['price'], 0, '', ' ') . ' Ft',
        'author' => $book['author'],
        'description' => $book['description'],
        'pages' => $book['pages'],
        'release_date' => $book['release_date'],
        'isbn' => $book['isbn']
    ];
}

$result['books'] = $books;

header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
