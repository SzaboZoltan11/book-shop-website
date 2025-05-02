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







document.getElementById('deleteButton').addEventListener('click', function() {
    const categoryId = document.getElementById('delete_category').value;
    
    if (!categoryId) {
        alert("Válassz kategóriát!");
        return;
    }

    fetch(`/bookshop/web/api/categories.php?category_id=${categoryId}`)
        .then(response => response.json())
        .then(data => {
            if (data.has_books) {
                const confirmDelete = confirm("Ez a kategória könyveket is tartalmaz. Biztosan törölni szeretnéd a kategóriát és a benne lévő könyveket?");
                if (confirmDelete) {
                    document.getElementById('deleteCategoryForm').submit();
                }
            } else {
                const confirmDelete = confirm("Biztosan törölni szeretnéd a kategóriát?\n A törlendő kategóriában szereplő könyvek is törlésre kerülnek!");
                if (confirmDelete) {
                    document.getElementById('deleteCategoryForm').submit();
                }
            }
        })
        .catch(error => {
            alert("Hiba történt a kategória ellenőrzése során.");
        });
});


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