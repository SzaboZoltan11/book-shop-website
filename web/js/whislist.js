document.addEventListener("DOMContentLoaded", function() {
    const wishlistIcon = document.getElementById("wishlist-icon");
    const wishlistModal = document.getElementById("wishlistModal");
    const closeWishlist = document.getElementById("close-wishlist");
    const wishlistItemsContainer = document.getElementById("wishlist-items");
    const wishlistCount = document.getElementById("wishlist-count");

    window.WishlistManager.addEventListener('update', () => {
        updateWishlistModal()
    })

    function updateWishlistModal() {
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
                    if (!v[0]) return
                    const details = v[0]
                    const wishlistItem = document.createElement("div");
                    wishlistItem.classList.add("wishlist-item");
                    wishlistItem.innerHTML = `
                        <img src="/bookshop/web/database/covers/${details.cover}.png" alt="${details.title}" class="wishlist-item-image">
                        <div class="wishlist-item-info">
                            <p class="wishlist-item-title">${details.title}</p>
                            <p class="wishlist-item-price">${Math.floor(details.price)} Ft</p>
                        </div>
                        <button class="remove-wishlist-btn">Törlés</button>
                    `;
        
                    wishlistItem.querySelector(".remove-wishlist-btn").addEventListener("click", function() {
                        removeFromWishlist(item.book_id);
                    });
        
                    wishlistItemsContainer.appendChild(wishlistItem);
                })
        });
    }

    function removeFromWishlist(bookId) {
        window.WishlistManager.remove(bookId);
    }

    wishlistIcon.addEventListener("click", function(event) {
        event.preventDefault();
        wishlistModal.style.display = "block";
        updateWishlistModal();
    });

    closeWishlist.addEventListener("click", function() {
        wishlistModal.style.display = "none"; 
    });

    window.addEventListener("click", function(event) {
        if (event.target == wishlistModal) {
            wishlistModal.style.display = "none"; 
        }
    });

    updateWishlistModal();
});
