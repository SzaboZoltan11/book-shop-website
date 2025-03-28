/**
 * @param {number} categoryId
 */
function loadBooks(categoryId) {
    fetch('szepirodalom_backend.php?category_id=' + encodeURIComponent(categoryId))
        .then(v => {
            if (v.status < 200 || v.status >= 300) {
                const szepirodalomDetails = document.getElementById('szepirodalom-details');
                if (szepirodalomDetails) {
                    szepirodalomDetails.innerHTML = "Hiba történt a könyvek adatainak betöltésekor.";
                }
                return null;
            } else {
                return v.json();
            }
        })
        .then(v => {
            if (!v) return;
            if (v.error) {
                const szepirodalomDetails = document.getElementById('szepirodalom-details');
                if (szepirodalomDetails) {
                    szepirodalomDetails.innerHTML = v.error;
                }
                return;
            }

            let booksHtml = '';
            for (const book of v.books) {
                const coverPath = '/bookshop/web/database/covers/' + book.cover + '.png';
                booksHtml += `
                    <div class="book">
                        <img src="${coverPath}" alt="${book.title}" />
                        <h3>${book.title}</h3>
                        <p><strong>Ár:</strong> ${book.price}</p>
                    </div>
                `;
            }
            const szepirodalomDetails = document.getElementById('szepirodalom-details');
            if (szepirodalomDetails) {
                szepirodalomDetails.innerHTML = booksHtml;
            }
        })
        .catch(e => {
            console.error(e);
            const szepirodalomDetails = document.getElementById('szepirodalom-details');
            if (szepirodalomDetails) {
                szepirodalomDetails.innerHTML = "Hiba történt a könyvek adatainak betöltésekor.";
            }
        });
}

loadBooks(2);  
