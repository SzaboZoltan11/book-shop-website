<?php
include '../../src/check_token.php';

if (!isset($_SESSION['isadmin']) || $_SESSION['isadmin'] != 1) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin</title>
</head>

<body>
<div class="navbar-header">
    <a class="navbar-brand" href="../index.php">
        <img src="../img/logo.png" alt="Logo" height="80px">
    </a>
    <h1 class="navbar-title">Admin</h1>
</div>
    <?php
        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) echo "<p class='success-message'>Sikeres könyv feltöltés!</p>";
            if ($_GET['success'] == 2) echo "<p class='success-message'>Sikeres kategória feltöltés!</p>";
            if ($_GET['success'] == 3) echo "<p class='success-message'>Sikeres könyvtörlés!</p>";
            if ($_GET['success'] == 4) echo "<p class='success-message'>Sikeres kategóriatörlés! Az összes hozzá tartozó könyv törölve lett.</p>";
        }
    ?>

    <div class="container">

        <!-- Könyv feltöltés -->
        <div class="form-box">
            <h2>Könyv felvétele</h2>
            <form action="upload_books.php" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="title">Cím</label>
                    <input type="text" name="title" id="title" class="input-field" required>
                </div>
                <div class="input-group">
                    <label for="price">Ár</label>
                    <input type="number" name="price" id="price" class="input-field" required>
                </div>
                <div class="input-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="input-field" required>
                </div>
                <div class="input-group">
                    <label for="author">Szerző</label>
                    <input type="text" name="author" id="author" class="input-field" required>
                </div>
                <div class="input-group">
                    <label for="status">Státusz</label>
                    <select name="status" id="status" class="input-field" required>
                        <option value="1">Elérhető</option>
                        <option value="0">Nem elérhető</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="description">Leírás</label>
                    <textarea name="description" id="description" class="input-field" required></textarea>
                </div>
                <div class="input-group">
                    <label for="pages">Oldalak száma</label>
                    <input type="text" name="pages" id="pages" class="input-field" required>
                </div>
                <div class="input-group">
                    <label for="electronic">Elektronikus-e</label>
                    <select name="electronic" id="electronic" class="input-field" required>
                        <option value="0">Nem</option>
                        <option value="1">Igen</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="release_date">Kiadásának éve</label>
                    <input type="text" name="release_date" id="release_date" class="input-field" required>
                </div>
                <div class="input-group">
                    <label for="category">Kategória</label>
                    <div id="category-container"></div>
                    <select id="category" class="input-field">
                        <option value="">Válassz kategóriát</option>
                    </select>
                    <input type=hidden name="categories" value="" id="categories_input_hidden">
                
                </div>
                <div class="input-group">
                    <label for="cover">Kép feltöltése</label>
                    <input type="file" name="cover" id="cover" class="input-field" required>
                </div>
                <button type="submit" class="btn">Feltöltés</button>
            </form>
        </div>

        <!-- Kategória feltöltés -->
        <div class="form-box">
            <h2>Kategória felvétele</h2>
            <form action="upload_category.php" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="category_name">Név</label>
                    <input type="text" name="name" id="category_name" class="input-field" required>
                </div>
                <button type="submit" class="btn">Feltöltés</button>
            </form>
        </div>

        <!-- Könyv törlés -->
        <div class="form-box">
            <h2>Könyv törlése ISBN alapján</h2>
            <form action="delete_books.php" method="POST">
                <div class="input-group">
                    <label for="delete_isbn">ISBN</label>
                    <input type="text" name="isbn" id="delete_isbn" class="input-field" required>
                </div>
                <button type="submit" class="btn">Törlés</button>
            </form>
        </div>

<!-- Kategória törlés -->
<div class="form-box">
    <h2>Kategória törlése</h2>
    <form action="delete_category.php" method="POST" id="deleteCategoryForm">
        <div class="input-group">
            <label for="delete_category">Kategória</label>
            <select name="category_id" id="delete_category" class="input-field" required>
                <option value="">Válassz kategóriát</option>
                <!-- Kategóriák dinamikusan kerülnek ide -->
            </select>
        </div>
        <button type="button" class="btn" id="deleteButton">Törlés</button>
    </form>
</div>


</div>
<div class="button-container">
  <a href="orders.php" class="modern-button">Rendelések kilistázása</a>
</div>

<script src="../js/admin.js"></script>

</body>
</html>
