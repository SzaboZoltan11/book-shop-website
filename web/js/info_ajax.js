document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const bookId = urlParams.get('bookId');

    if (!bookId) {
        console.warn(`bookId is null or undefined`)
        return
    }

    fetch(`info_backend.php?bookId=${bookId}`)
        .then(v => v.json())
        .then(v => {
            if (v.error) {
                document.getElementById('book-details').innerHTML = v.error;
                return
            }

            document.getElementById('button-add-wishlist').addEventListener('click', () => {
                if (!isBookInWishlist(bookId)) {
                    window.WishlistManager.add(bookId);
                }
            })

            document.getElementById('button-add-cart').addEventListener('click', () => {
                addToCart(v.cover, v.title, v.price)
            })

            const coverPath = '/bookshop/web/database/covers/' + v.cover + '.png';
            document.getElementById('book-cover').src = coverPath;
            document.getElementById('book-title').innerHTML = v.title;
            document.getElementById('book-price').innerHTML = v.price;
            document.getElementById('book-description').innerHTML = v.description;
            document.getElementById('book-author').innerHTML = v.author;
            document.getElementById('book-pages').innerHTML = v.pages;
            document.getElementById('book-release_date').innerHTML = v.release_date;
            document.getElementById('book-isbn').innerHTML = v.isbn;
        })
        .catch(console.error)
});