document.addEventListener("DOMContentLoaded", function () {
    // Kosár kezelés - kosárba adás, frissítés
    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

    const cart = document.querySelector("#cart-icon");

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("sessionEnded") && urlParams.get("sessionEnded") === "true") {
        localStorage.removeItem("cartItems");
        cartItems = [];
        updateCartModal();
        console.log("A felhasználó kijelentkezett, kosár törölve.");
    }

    // Kosárba adás funkció
    function addToCart(cover, title, price) {
        // Győződjünk meg róla, hogy a price számként van kezelve
        const numericPrice = parseFloat(price.replace(/[^\d.-]/g, '')); // eltávolítja a nem szám karaktereket (pl. Ft)
        
        if (isNaN(numericPrice)) {
            console.error('Hibás ár formátum');
            return;
        }

        cartItems.push({ cover, title, price: numericPrice });
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        updateCartModal();
    }

    // Kosár modal frissítése
    function updateCartModal() {
        const cartModalContent = document.querySelector("#cartModal .modal-content p");
        const totalAmountElement = document.querySelector("#cartModal .total-amount");

        if (!cartModalContent) {
            console.error('A kosár modal nem található!');
            return;
        }

        cartModalContent.innerHTML = "";

        let totalAmount = 0;

        if (cartItems.length > 0) {
            cartItems.forEach((item, index) => {
                const cartItem = document.createElement("div");
                cartItem.classList.add("cart-item");

                cartItem.innerHTML = `
                    <img src="/bookshop/web/database/covers/${item.cover}.png" alt="${item.title}" class="cart-item-image">
                    <div class="cart-item-info">
                        <p class="cart-item-title">${item.title}</p>
                        <p class="cart-item-price">${Math.floor(item.price)} Ft</p>
                    </div>
                    <button class="remove-btn" data-index="${index}">Törlés</button>
                `;

                cartItem.querySelector(".remove-btn").addEventListener("click", function () {
                    removeFromCart(index);
                });

                cartModalContent.appendChild(cartItem);

                totalAmount += item.price || 0;
            });

            const formattedTotalAmount = Math.floor(totalAmount).toLocaleString();

            if (totalAmountElement) {
                totalAmountElement.textContent = `Teljes összeg: ${formattedTotalAmount} Ft`;
            }
        } else {
            cartModalContent.innerHTML = "A kosár üres.";
            if (totalAmountElement) {
                totalAmountElement.textContent = "Teljes összeg: 0 Ft";
            }
        }
    }

    // Kosárból való törlés
    function removeFromCart(index) {
        cartItems.splice(index, 1);
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        updateCartModal();
    }

    updateCartModal();

    // Vásárlás gomb eseménykezelő
    function loadBooks(electronic) { 
        fetch('ekonyv_backend.php?electronic=' + electronic)
            .then(v => v.json())
            .then(v => {
                if (!v || v.error) {
                    document.getElementById('ekönyv-details').innerHTML = "Nem található ilyen típusú könyv.";
                    return;
                }
                
                let booksHtml = '';
                for (const book of v) {
                    const coverPath = '/bookshop/web/database/covers/' + book.cover + '.png';
                    booksHtml += `
                        <div class="card">
                            <span class="wishlist-icon" data-id="${book.id}">&#9825;</span>
                            <img src="${coverPath}" alt="${book.title}" class="book-image"/>
                            <div class="card-info">
                                <p class="title">${book.title}</p>
                                <p class="price">${book.price}</p>
                                <button class="buy-btn">Vásárlás</button>
                            </div>
                        </div>
                    `;
                }
                document.getElementById('ekönyv-details').innerHTML = booksHtml;

                const buyButtons = document.querySelectorAll(".buy-btn");
                buyButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        const card = button.closest(".card");
                        const cover = card.querySelector(".book-image").getAttribute("src").split("/").pop().split(".")[0];
                        const title = card.querySelector(".title").textContent;
                        const price = card.querySelector(".price").textContent;

                        // Kosárba adás
                        addToCart(cover, title, price);
                    });
                });

                const wishlistIcons = document.querySelectorAll(".wishlist-icon");
                wishlistIcons.forEach(function(icon) {
                    icon.addEventListener("click", function() {
                        const bookId = icon.getAttribute("data-id");
                        // Check if the book is already in the wishlist
                        if (!isBookInWishlist(bookId)) {
                            window.WishlistManager.add(bookId);
                            updateWishlistModal();
                        }
                    });
                });
            })
            .catch(e => {
                console.error(e);
                document.getElementById('ekönyv-details').innerHTML = "Hiba történt a könyvek adatainak betöltésekor.";
            });
    }

    loadBooks(1);

    // Kívánságlista modal frissítése
    function updateWishlistModal() {
        var wishlistItemsContainer = document.getElementById("wishlist-items");
        var wishlistCount = document.getElementById("wishlist-count");
        wishlistItemsContainer.innerHTML = "";
        wishlistCount.textContent = window.WishlistManager.wishlist.length;

        if (window.WishlistManager.wishlist.length === 0) {
            wishlistItemsContainer.innerHTML = "<p>A kívánságlista üres.</p>";
            return;
        }

        window.WishlistManager.wishlist.forEach((item) => {
            fetch('/bookshop/web/api/books.php?id=' + item.book_id)
                .then(v => v.json())
                .then(v => {
                    if (!v[0]) return;
                    const details = v[0];

                    const wishlistItem = document.createElement("div");
                    wishlistItem.classList.add("wishlist-item");
                    wishlistItem.innerHTML = `
                        <img src="/bookshop/web/database/covers/${details.cover}.png" alt="${details.title}" class="wishlist-item-image">
                        <div class="wishlist-item-info">
                            <p class="wishlist-item-title">${details.title}</p>
                            <p class="wishlist-item-price">${details.price} Ft</p> 
                        </div>
                        <button class="remove-wishlist-btn">Törlés</button>
                    `;
        
                    wishlistItem.querySelector(".remove-wishlist-btn").addEventListener("click", function() {
                        removeFromWishlist(item.book_id);
                    });
        
                    wishlistItemsContainer.appendChild(wishlistItem);
                });
        });
    }

    function removeFromWishlist(bookId) {
        window.WishlistManager.remove(bookId);
        updateWishlistModal();
    }

   
    document.getElementById("wishlist-icon").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById("wishlistModal").style.display = "block";
        updateWishlistModal();
    });


    document.getElementById("close-wishlist").addEventListener("click", function() {
        document.getElementById("wishlistModal").style.display = "none";
    });

  
    window.addEventListener("click", function(event) {
        if (event.target == document.getElementById("wishlistModal")) {
            document.getElementById("wishlistModal").style.display = "none";
        }
    });


    window.addEventListener('update', updateWishlistModal);

    
    updateWishlistModal();
    
    // Ellenőrzi, hogy a könyv már a kívánságlistán van-e
    function isBookInWishlist(bookId) {
        return window.WishlistManager.wishlist.some(item => item.book_id === bookId);
    }
});
