function loadBooks(categoryIds) {
    const queryString = Array.isArray(categoryIds)
        ? categoryIds.map(id => `category_id[]=${encodeURIComponent(id)}`).join('&')
        : `category_id=${encodeURIComponent(categoryIds)}`;

    fetch('ifjusagi_backend.php?' + queryString)
        .then(response => {
            if (!response.ok) {
                throw new Error("Hiba történt a szerver válaszában.");
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                document.getElementById('ifjusagi-details').innerHTML = data.error;
                return;
            }

            let booksHtml = '';
            for (const book of data.books) {
                const coverPath = '/bookshop/web/database/covers/' + book.cover + '.png';
                booksHtml += `
                    <div class="book">
                        <img src="${coverPath}" alt="${book.title}" />
                        <h3>${book.title}</h3>
                        <p><strong>Ár:</strong> ${book.price}</p>
                    </div>
                `;
            }
            document.getElementById('ifjusagi-details').innerHTML = booksHtml;
        })
        .catch(error => {
            console.error(error);
            document.getElementById('ifjusagi-details').innerHTML = "Hiba történt a könyvek betöltésekor.";
        });
}

// Több kategóriát kérdezz le egyszerre
loadBooks([3]);
