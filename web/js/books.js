// @ts-check

/**
 * @param {string} cover
 * @param {string} title
 * @param {string} price
 */
function addToCart(cover, title, price) {
    const numericPrice = parseFloat(price.replace(/[^\d.-]/g, '')); 
    if (isNaN(numericPrice)) {
        console.error('Hibás ár formátum');
        return;
    }

    cartItems.push({ cover, title, price: numericPrice });
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    updateCartModal();
}

function toggleCheckoutButton() {
    const cartItemsContainer = document.getElementById('cart-items');
    const checkoutBtn = document.getElementById('checkout-btn');
    if (cartItemsContainer.children.length > 0) {
        checkoutBtn.style.display = 'block';
    } else {
        checkoutBtn.style.display = 'none';
    }
}

/**
 * @param {HTMLElement} container
 * @param {{
 *   categoryIds?: ReadonlyArray<number>
 *   electronic?: boolean
 *   year?: [number, number]
 * }} [filter]
 */
function loadBooks(container, filter = null) {
    const queires = []

    if (filter.categoryIds) {
        queires.push(...filter.categoryIds.map(id => `category_id[]=${encodeURIComponent(id)}`));
    }

    if (filter.electronic) {
        queires.push(`electronic=1`)
    }

    if (filter.year) {
        queires.push(`startYear=${filter.year[0]}`)
        queires.push(`endYear=${filter.year[1]}`)
    }

    fetch(`books.php${queires.length ? '?' + queires.join('&') : ''}`)
        .then(v => v.json())
        .then(data => {
            if (!data.books || data.error) {
                container.innerHTML = "Nem található ilyen típusú könyv.";
                return;
            }

            container.innerHTML = ''

            for (const book of data.books) {
                const coverPath = '/bookshop/web/database/covers/' + book.cover + '.png';
                const cardDiv = document.createElement('div')
                cardDiv.classList.add('card')
                cardDiv.innerHTML = `
                    ${isLoggedIn === 'true' ? `<span class="wishlist-icon" data-id="${book.id}">&#9825;</span>` : ""}
                        <img src="${coverPath}" alt="${book.title}" class="book-image"/>
                        <div class="card-info">
                            <p class="title">${book.title}</p>
                            <p class="price">${book.price}</p>
                            <button class="buy-btn">Vásárlás</button>
                        </div>
                `;

                container.appendChild(cardDiv)

                const buyButton = cardDiv.querySelector(".buy-btn");
                buyButton.addEventListener("click", function () {
                    const card = buyButton.closest(".card");
                    const cover = card.querySelector(".book-image").getAttribute("src").split("/").pop().split(".")[0];
                    const title = card.querySelector(".title").textContent;
                    const price = card.querySelector(".price").textContent;

                    // Kosárba adás
                    addToCart(cover, title, price);
                    toggleCheckoutButton(); 
                });

                const wishlistButton = cardDiv.querySelector(".wishlist-icon");
                wishlistButton.addEventListener("click", function () {
                    // Check if the book is already in the wishlist
                    if (!isBookInWishlist(book.id)) {
                        window.WishlistManager.add(book.id);
                    }
                });
            }
        })
        .catch(e => {
            console.error(e);
            document.getElementById('ekönyv-details').innerHTML = "Hiba történt a könyvek adatainak betöltésekor.";
        });
}

/**
 * @param {number} bookId
 */
function isBookInWishlist(bookId) {
    return window.WishlistManager.wishlist.some(item => item.book_id === bookId);
}

function updateCartModal() {
    /** @type {HTMLElement} */ const cartModalContent = document.querySelector("#cartModal .modal-content p");
    /** @type {HTMLElement} */ const totalAmountElement = document.querySelector("#cartModal .total-amount");
    /** @type {HTMLElement} */ const checkoutBtn = document.querySelector("#checkout-btn");
    /** @type {HTMLElement} */ const cartItemsContainer = document.querySelector("#cartModal .modal-content #cart-items");

    if (!cartItemsContainer || !totalAmountElement || !checkoutBtn) {
        console.error('Néhány kosár elem nem található!');
        return;
    }

    cartModalContent.innerHTML = "";

    let totalAmount = 0;

    if (cartItems.length > 0) {
        cartItemsContainer.innerHTML = ''
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

            cartItemsContainer.appendChild(cartItem);

            totalAmount += item.price || 0;
        });

        const formattedTotalAmount = Math.floor(totalAmount).toLocaleString();
        if (totalAmountElement) {
            totalAmountElement.textContent = `Teljes összeg: ${formattedTotalAmount} Ft`;
        }
        
        checkoutBtn.style.display = "block";
    } else {
        cartItemsContainer.innerHTML = "A kosár üres.";
        if (totalAmountElement) {
            totalAmountElement.textContent = "Teljes összeg: 0 Ft";
        }
        checkoutBtn.style.display = "none";
    }
}

/**
 * @param {number} index
 */
function removeFromCart(index) {
    cartItems.splice(index, 1);
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    updateCartModal();
}

let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has("sessionEnded") && urlParams.get("sessionEnded") === "true") {
    localStorage.removeItem("cartItems");
    cartItems = [];
    console.log("A felhasználó kijelentkezett, kosár törölve.");
}

document.addEventListener('DOMContentLoaded', () => {
    const cart = document.querySelector("#cart-icon");
    updateCartModal();
})
