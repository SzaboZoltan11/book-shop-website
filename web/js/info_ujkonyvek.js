/**
 * @param {number} startYear
 * @param {number} endYear
 */
function loadBooks(startYear, endYear) { 
    fetch('uj-konyvek-backend.php?startYear=' + startYear + '&endYear=' + endYear)
        .then(v => {
            if (v.status < 200 || v.status >= 300) {
                document.getElementById('book-details').innerHTML = "Hiba történt a könyvek adatainak betöltésekor."
                return null
            } else {
                return v.json()
            }
        })
        .then(v => {
            if (!v) return
            let booksHtml = ''
            for (const book of v) {
                const coverPath = '/bookshop/web/database/covers/' + book.cover + '.png'
                booksHtml += `
                    <div class="book">
                        <img src="${coverPath}" alt="${book.title}" />
                        <h3>${book.title}</h3>
                        <p><strong>Ár:</strong> ${book.price}</p>
                    </div>
                `
            }
            document.getElementById('book-details').innerHTML = booksHtml
        })
        .catch(e => {
            console.error(e)
            document.getElementById('book-details').innerHTML = "Hiba történt a könyvek adatainak betöltésekor."
        })
}

loadBooks(2024, 2025)
