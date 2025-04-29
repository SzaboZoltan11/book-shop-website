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
                    <script>
                        {
                            const categoryInput = document.getElementById('category');
                            const categoryContainer = document.getElementById('category-container');
                            fetch('/bookshop/web/api/categories.php')
                                .then(v => v.json())
                                .then(v => {
                                    for (const category of v) {
                                        const option = document.createElement('option');
                                        option.value = category.category_id;
                                        option.textContent = category.name;
                                        categoryInput.appendChild(option);
                                    }
                                });
                            function refreshCategoriesInputValue() {
                                const categoryItems = categoryContainer.getElementsByClassName('__category_item');
                                const values = [];
                                for (const categoryItem of categoryItems) {
                                    values.push(categoryItem.getAttribute('data-category-id'));
                                }
                                document.getElementById('categories_input_hidden').value = values.join(',');
                            }
                            categoryInput.addEventListener('input', () => {
                                const selectedCategory = categoryInput.selectedOptions.item(0);
                                if (!selectedCategory) return;
                                const categoryItem = document.createElement('div');
                                categoryItem.innerHTML = `<span data-category-id="${selectedCategory.value}" class="__category_item">${selectedCategory.textContent}</span><span id="category-item-${selectedCategory.value}" class="category_style">X</span>`;
                                categoryContainer.appendChild(categoryItem);
                                const xButton = categoryContainer.querySelector(`#category-item-${selectedCategory.value}`);
                                xButton.addEventListener('click', () => {
                                    categoryItem.remove();
                                    refreshCategoriesInputValue();
                                });
                                categoryInput.value = '';
                                refreshCategoriesInputValue();
                            });
                        }
                    </script>
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

<script>
    document.getElementById('deleteButton').addEventListener('click', function() {
        const categoryId = document.getElementById('delete_category').value;
        
        if (!categoryId) {
            alert("Válassz kategóriát!");
            return;
        }

        // Kérdezzük meg, hogy a felhasználó biztosan törölni akarja-e a kategóriát.
        fetch(`/bookshop/web/api/categories.php?category_id=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                if (data.has_books) {
                    const confirmDelete = confirm("Ez a kategória könyveket is tartalmaz. Biztosan törölni szeretnéd a kategóriát és a benne lévő könyveket?");
                    if (confirmDelete) {
                        document.getElementById('deleteCategoryForm').submit();
                    }
                } else {
                    const confirmDelete = confirm("Biztosan törölni szeretnéd a kategóriát?");
                    if (confirmDelete) {
                        document.getElementById('deleteCategoryForm').submit();
                    }
                }
            })
            .catch(error => {
                alert("Hiba történt a kategória ellenőrzése során.");
            });
    });
</script>


    </div>

    <script>
        fetch('/bookshop/web/api/categories.php')
            .then(res => res.json())
            .then(data => {
                const select = document.getElementById('delete_category');
                data.forEach(cat => {
                    const option = document.createElement('option');
                    option.value = cat.category_id;
                    option.textContent = cat.name;
                    select.appendChild(option);
                });
            });

        function confirmDeleteCategory() {
            const select = document.getElementById('delete_category');
            const selectedText = select.options[select.selectedIndex].text;

            if (!select.value) {
                alert("Válassz egy kategóriát!");
                return;
            }

            const confirmed = confirm(`Biztosan törölni szeretnéd a(z) "${selectedText}" kategóriát?\nFIGYELEM: Az ebben a kategóriában lévő könyvek is törlődnek!`);
            if (confirmed) {
                document.getElementById('delete-category-form').action = 'delete_category.php';
                document.getElementById('delete-category-form').submit();
            }
        }
    </script>
</body>
</html>
