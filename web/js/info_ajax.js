function loadBook(bookId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'info_backend.php?bookId=' + bookId, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.error) {
                document.getElementById('book-details').innerHTML = response.error;
            } else {
                document.getElementById('book-title').innerHTML = response.title;
                var coverPath = '/bookshop/web/database/covers/' + response.cover + '.png';
                document.getElementById('book-cover').src = coverPath;
                document.getElementById('book-description').innerHTML = response.description;
            }
        } else {
            document.getElementById('book-details').innerHTML = "Hiba történt a könyv adatainak betöltésekor.";
        }
    };
    xhr.send();
}

window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    var bookId = urlParams.get('bookId');
    
    if (!bookId) {
        bookId = 1; 
    }

    loadBook(bookId);
};