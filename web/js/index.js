document.addEventListener("DOMContentLoaded", function () {
    /** @type {HTMLElement} */ const searchInput = document.querySelector(".search-bar input");
    /** @type {HTMLElement} */ const searchBar = document.querySelector(".search-bar");
    /** @type {HTMLElement} */ const logo = document.querySelector(".navbar-brand");
    // ez a 4 element nincs sehol a htmlben
    // const wishlist = document.querySelector("a[href='wishlist.html']");
    // const cart = document.querySelector("a[href='cart.html']");
    // const login = document.querySelector("a[href='logination.php']");
    // const register = document.querySelector("a[href='registration.php']");
    /** @type {HTMLElement} */ const logout = document.querySelector(".dropdown-item.text-danger");
    const mediaQuery = window.matchMedia("(max-width: 1200px)");

    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

    // URL tartalmazza a `sessionEnded=true` paramétert, töröljük a kosarat
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("sessionEnded") && urlParams.get("sessionEnded") === "true") {
        localStorage.removeItem("cartItems");
        cartItems = [];
        updateCartModal();
        console.log("A felhasználó kijelentkezett, kosár törölve.");
    }

    if (logout) {
        logout.addEventListener("click", function () {
            localStorage.setItem("loggedOut", "true");
        });
    }

    function toggleSearchState(event) {
        if (mediaQuery.matches) {
            if (event.type === "focus") {
                logo.style.display = "none";
                // wishlist.style.display = "none";
                // cart.style.display = "none";
                // login.style.display = "none";
                // register.style.display = "none";
                searchInput.classList.add("expanded");
                searchBar.style.width = "100%";
            } else if (event.type === "blur") {
                logo.style.display = "";
                // wishlist.style.display = "";
                // cart.style.display = "";
                // login.style.display = "";
                // register.style.display = "";
                searchInput.classList.remove("expanded");
                searchBar.style.width = "";
            }
        }
    }

    if (searchInput && searchBar) {
        searchInput.addEventListener("focus", toggleSearchState);
        searchInput.addEventListener("blur", toggleSearchState);
    }

    fetch('/bookshop/web/api/categories.php')
        .then(v => v.json())
        .then(v => {
            const main = document.getElementsByTagName('main').item(0);
            for (const item of v) {
                let container = document.createElement('div');
                container.className = 'slider-container';
                container.innerHTML = `
                    <h2>${item.name}</h2>
                    <button class="prev-btn">&#10094;</button>
                    <div class="slider" id="slider-${item.category_id}"></div>
                    <button class="next-btn">&#10095;</button>
                `;
                container = main.appendChild(container);

                const slider = document.getElementById(`slider-${item.category_id}`);
                const prevBtn = container.querySelector(".prev-btn");
                const nextBtn = container.querySelector(".next-btn");

                const _books = [];

                fetch(`/bookshop/web/api/books.php?category=${item.category_id}`)
                    .then(res => res.json())
                    .then(books => {
                        if (!books || books.length === 0) {
                            console.error(`Nincsenek könyvek a ${item.category_id} kategóriában.`);
                            return;
                        }

                        _books.push(...books);

                        books.forEach(book => {
                            const card = document.createElement("div");
                            card.classList.add("card");
                            card.style.position = "relative";
                            card.style.overflow = "hidden";

                            card.innerHTML = `
                                <span class="wishlist-icon">&#9825;</span> <!-- Szív ikon -->
                                <img src="/bookshop/web/database/covers/${book.cover}.png" alt="${book.title}">
                                <div class="card-info">
                                    <p class="title">${book.title}</p>
                                    <p class="price">${Math.floor(book.price)} Ft</p>
                                    <button class="buy-btn">Vásárlás</button>
                                </div>
                            `;

                            slider.appendChild(card);

                            card.querySelector(".buy-btn").addEventListener("click", function () {
                                addToCart(book.cover, book.title, book.price);
                            });

                            // Wishlist ikon eseménykezelő
                            card.querySelector(".wishlist-icon").addEventListener("click", function () {
                                addToWishlist(book.book_id);
                            });
                        });
                    })
                    .catch(error => {
                        console.error("Hiba a könyvek betöltésekor: ", error);
                    });
            }
        });

    function addToCart(cover, title, price) {
        cartItems.push({ cover, title, price });
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        updateCartModal();
    }

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
                        <p class="cart-item-price">${item.price} Ft</p>
                    </div>
                    <button class="remove-btn" data-index="${index}">Törlés</button>
                `;

                cartItem.querySelector(".remove-btn").addEventListener("click", function () {
                    removeFromCart(index);
                });

                cartModalContent.appendChild(cartItem);

                totalAmount += parseFloat(item.price) || 0;
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

    function removeFromCart(index) {
        cartItems.splice(index, 1);
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        updateCartModal();
    }

    updateCartModal();

    // Wishlist kezelés
    function addToWishlist(bookId) {
        window.WishlistManager.add(bookId)
        // localStorage.setItem("wishlist", JSON.stringify(wishlist));
        // updateWishlistModal(); // Hívjuk itt is a frissítést, hogy a modal látható legyen
        // wishlistModal.style.display = "block"; // Megnyitja a modált
    }
    



    // Dekoratív dobozok (animált)
    {
        const boxes = []
        for (let i = 0; i < 10; i++) {
            const x = -170 + Math.random() * 300
            const y = -170 + 155 + Math.random() * 300

            const element = document.createElement('div')
            element.style.position = 'absolute'
            element.style.width = `${80 + Math.round(Math.random() * 170)}px`
            element.style.height = element.style.width
            element.style.backgroundColor = '#fff1'
            element.style.top = `${Math.round(y)}px`
            element.style.left = `${Math.round(x)}px`
            element.style.transform = `rotate(45deg)`
            element.style.zIndex = `-1`
            document.body.appendChild(element)
            boxes.push({
                element: element,
                x: x,
                y: y,
                v: (Math.random() - 0.5) * 2,
            })
        }

        setInterval(() => {
            for (const element of boxes) {
                const x = element.x + Math.cos(performance.now() * 0.0003 * element.v) * 50
                const y = element.y + Math.sin(performance.now() * 0.0003 * element.v) * 50
                element.element.style.top = `${Math.round(y)}px`
                element.element.style.left = `${Math.round(x)}px`
            }
        }, 10)
    }
});
