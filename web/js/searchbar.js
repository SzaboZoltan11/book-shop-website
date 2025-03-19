document.addEventListener('DOMContentLoaded', function() {
    let allBooks = [];

    const bookResultsDiv = document.getElementById('bookResults');

    bookResultsDiv.classList.remove('visible');

    function fetchBooks() {
        fetch('http://localhost/bookshop/web/api/books.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(books => {
                allBooks = books;
            })
            .catch(error => {
                console.error('Error fetching books:', error);
            });
    }

    function filterBooks(books, searchTerm) {
        return books.filter(book => 
            book.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
            book.author.toLowerCase().includes(searchTerm.toLowerCase())
        );
    }

    function renderBooks(books) {
        bookResultsDiv.innerHTML = '';

        if (books.length === 0) {
            bookResultsDiv.innerHTML = '<p>No books found.</p>';
            bookResultsDiv.classList.remove('visible');
        } else {
            books.forEach(book => {
                const bookDiv = document.createElement('div');
                bookDiv.classList.add('book-item');

                bookDiv.innerHTML = `
                    <div class="book-item-content">
                        <img src="/bookshop/web/database/covers/${book.cover}.png" alt="${book.title}" class="searched_image" data-id="${book.book_id}" />
                        <div class="book-info">
                            <h3>${book.title}</h3>
                            <p>${book.author}</p>
                        </div>
                    </div>
                `;

                bookDiv.addEventListener('click', function () {
                    const bookId = book.book_id;
                    window.location.href = `/bookshop/web/info/info_frontend.php?bookId=${bookId}`;
                });

                bookResultsDiv.appendChild(bookDiv);
            });
            bookResultsDiv.classList.add('visible');
        }
    }

    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('focus', function() {
        bookResultsDiv.innerHTML = '';
        bookResultsDiv.classList.remove('visible');
    });

    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.trim();

        if (searchTerm === "") {
            renderBooks([]);
        } else {
            const filteredBooks = filterBooks(allBooks, searchTerm);
            renderBooks(filteredBooks);
        }
    });

    fetchBooks();

    searchInput.blur();

    bookResultsDiv.classList.remove('visible');
});
