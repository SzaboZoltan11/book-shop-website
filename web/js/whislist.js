document.addEventListener("DOMContentLoaded", function() {
    var wishlistIcon = document.getElementById("wishlist-icon");
    var wishlistModal = document.getElementById("wishlistModal");
    var closeWishlist = document.getElementById("close-wishlist");
    var wishlistItemsContainer = document.getElementById("wishlist-items");
    var wishlistCount = document.getElementById("wishlist-count");

    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    function updateWishlistModal() {
        wishlistItemsContainer.innerHTML = "";
        wishlistCount.textContent = wishlist.length;

        if (wishlist.length === 0) {
            wishlistItemsContainer.innerHTML = "<p>A kívánságlista üres.</p>";
            return;
        }

        wishlist.forEach((item, index) => {
            const wishlistItem = document.createElement("div");
            wishlistItem.classList.add("wishlist-item");
            wishlistItem.innerHTML = `
                <img src="/bookshop/web/database/covers/${item.cover}.png" alt="${item.title}" class="wishlist-item-image">
                <div class="wishlist-item-info">
                    <p class="wishlist-item-title">${item.title}</p>
                    <p class="wishlist-item-price">${item.price} Ft</p>
                </div>
                <button class="remove-wishlist-btn" data-index="${index}">Törlés</button>
            `;

            wishlistItem.querySelector(".remove-wishlist-btn").addEventListener("click", function() {
                removeFromWishlist(index);
            });

            wishlistItemsContainer.appendChild(wishlistItem);
        });
    }

    function addToWishlist(cover, title, price) {
        wishlist.push({ cover, title, price });
        localStorage.setItem("wishlist", JSON.stringify(wishlist));
        updateWishlistModal();
        wishlistModal.style.display = "block"; // Megnyitja a modált
    }

    function removeFromWishlist(index) {
        wishlist.splice(index, 1);
        localStorage.setItem("wishlist", JSON.stringify(wishlist));
        updateWishlistModal();
    }

    wishlistIcon.addEventListener("click", function(event) {
        event.preventDefault();
        wishlistModal.style.display = "block"; // Megnyitja a modált
        updateWishlistModal();
    });

    // **Bezárás X gombra**
    closeWishlist.addEventListener("click", function() {
        wishlistModal.style.display = "none"; // Bezárja a modált
    });

    // **Bezárás háttérre kattintáskor**
    window.addEventListener("click", function(event) {
        if (event.target == wishlistModal) {
            wishlistModal.style.display = "none"; // Bezárja a modált
        }
    });

    updateWishlistModal();
});
