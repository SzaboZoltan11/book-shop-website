/**
 * @param {number} electronic 
 */
function loadBooks(electronic) { 
    fetch('ekonyv_backend.php?electronic=' + electronic)
        .then(v => {
            if (v.status < 200 || v.status >= 300) {
                document.getElementById('ekönyv-details').innerHTML = "Hiba történt a könyvek adatainak betöltésekor."
                return null
            } else {
                return v.json()
            }
        })
        .then(v => {
            if (!v || v.error) {
                if (v.error) console.error(v.error)
                document.getElementById('ekönyv-details').innerHTML = "Nem található ilyen típusú könyv."
                return
            }
            
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
            document.getElementById('ekönyv-details').innerHTML = booksHtml
        })
        .catch(e => {
            console.error(e)
            document.getElementById('ekönyv-details').innerHTML = "Hiba történt a könyvek adatainak betöltésekor."
        })
}


loadBooks(1)
