document.addEventListener("DOMContentLoaded", function () {
    /** @type {HTMLElement} */ const searchInput = document.querySelector(".search-bar input");
    /** @type {HTMLElement} */ const searchBar = document.querySelector(".search-bar");
    /** @type {HTMLElement} */ const logo = document.querySelector(".navbar-brand");
    /** @type {HTMLElement} */ const whislist = document.querySelector("#wishlist-icon");
    /** @type {HTMLElement} */ const cart = document.querySelector("#cart-icon");
    /** @type {HTMLElement} */ const userDropdown = document.querySelector("#userDropdown");
    /** @type {HTMLElement} */ const logout = document.querySelector(".dropdown-item.text-danger");
    const mediaQuery = window.matchMedia("(max-width: 1200px)");

    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

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

    function hideNavItems() {
        if (mediaQuery.matches) {
            logo?.classList.add("hide-on-search");
            wishlist?.classList.add("hide-on-search");
            cart?.classList.add("hide-on-search");
            userDropdown?.classList.add("hide-on-search");
        }
    }

    function showNavItems() {
        logo?.classList.remove("hide-on-search");
        wishlist?.classList.remove("hide-on-search");
        cart?.classList.remove("hide-on-search");
        userDropdown?.classList.remove("hide-on-search");
    }

    if (searchInput) {
        searchInput.addEventListener("focus", hideNavItems);
        searchInput.addEventListener("blur", showNavItems);
    }

    fetch('/bookshop/web/api/categories.php')
        .then(v => v.json())
        .then(categories => {
            const main = document.getElementsByTagName('main').item(0);
            for (const category of categories) {
                let container = document.createElement('div');
                container.className = 'slider-container';
                container.innerHTML = `
                    <h2 class="h2-title">${category.name}</h2>
                    <button class="prev-btn">&#10094;</button>
                    <div class="slider" id="slider-${category.category_id}"></div>
                    <button class="next-btn">&#10095;</button>
                `;
                main.appendChild(container);

                const slider = document.getElementById(`slider-${category.category_id}`);
                const prevBtn = container.querySelector(".prev-btn");
                const nextBtn = container.querySelector(".next-btn");
                
                const _books = [];

                fetch(`/bookshop/web/api/books.php?category=${category.category_id}`)
                    .then(res => res.json())
                    .then(books => {
                        if (!books || books.length === 0) {
                            console.error(`Nincsenek könyvek a ${category.category_id} kategóriában.`);
                            return;
                        }

                        _books.push(...books);

                        books.forEach(book => {
                            const card = document.createElement("div");
                            card.classList.add("card");
                            card.style.position = "relative";
                            card.style.overflow = "hidden";

                            card.innerHTML = `
                                <span class="wishlist-icon">&#9825;</span>
                                <img src="/bookshop/web/database/covers/${book.cover}.png" alt="${book.title}" class="book-image" data-id="${book.book_id}">
                                <div class="card-info">
                                    <p class="title">${book.title}</p>
                                    <p class="price">${Math.floor(book.price)} Ft</p>
                                    <button class="buy-btn">Vásárlás</button>
                                </div>
                            `;

                            slider.appendChild(card);

                            card.querySelector(".buy-btn").addEventListener("click", function () {
                                addToCart(book.book_id, book.cover, book.title, book.price);
                            });

                            if (isLoggedIn === 'true') {
                                card.querySelector(".wishlist-icon").style.display = "block";
                                card.querySelector(".wishlist-icon").addEventListener("click", function () {
                                    addToWishlist(book.book_id);
                                });
                            } else {
                                card.querySelector(".wishlist-icon").style.display = "none";
                            }

                            const bookImage = card.querySelector('.book-image');
                            bookImage.addEventListener('click', function () {
                                const bookId = bookImage.dataset.id;
                                window.location.href = `/bookshop/web/info/info_frontend.php?bookId=${bookId}`;
                            });
                        });

                        let currentPosition = 0;

                        function cardScrollerStepLeft(scroller, cards) {
                            for (let i = cards.length - 2; i >= 0; i--) {
                                const card = cards.item(i);
                                if (card.offsetLeft <= currentPosition - scroller.clientWidth) {
                                    currentPosition = cards.item(i + 1).offsetLeft;
                                    scroller.style.transform = `translateX(-${currentPosition}px)`;
                                    return;
                                }
                            }
                            scroller.style.transform = `translateX(0px)`;
                        }

                        function cardScrollerStepRight(scroller, cards) {
                            for (let i = 1; i < cards.length; i++) {
                                const card = cards.item(i);
                                if (card.offsetLeft >= currentPosition + scroller.clientWidth) {
                                    currentPosition = cards.item(i - 1).offsetLeft;
                                    scroller.style.transform = `translateX(-${currentPosition}px)`;
                                    return;
                                }
                            }
                        }

                        prevBtn.addEventListener('click', () => {
                            if (!mediaQuery.matches && currentPosition > 0) {
                                cardScrollerStepLeft(slider, slider.querySelectorAll('.card'));
                            }
                        });

                        nextBtn.addEventListener('click', () => {
                            if (!mediaQuery.matches && currentPosition < slider.scrollWidth - slider.offsetWidth) {
                                cardScrollerStepRight(slider, slider.querySelectorAll('.card'));
                            }
                        });

                        if (mediaQuery.matches) {
                            slider.style.overflowX = "auto"; 
                            prevBtn.style.display = "none";
                            nextBtn.style.display = "none";
                        }

                        window.addEventListener('resize', () => {
                            if (mediaQuery.matches) {
                                slider.style.overflowX = "auto";
                                prevBtn.style.display = "none";
                                nextBtn.style.display = "none";
                            } else {
                                slider.style.overflowX = null;
                                prevBtn.style.display = "block";
                                nextBtn.style.display = "block";
                                slider.style.transform = "translateX(0px)"; 
                                currentPosition = 0;
                            }
                        });
                    })
                    .catch(error => {
                        console.error("Hiba a könyvek betöltésekor: ", error);
                    });
            }
        })
        .catch(error => console.error('Hiba a kategóriák betöltésekor:', error));

    function addToCart(bookId, cover, title, price) {
        cartItems.push({ book_id: bookId, cover, title, price });
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        updateCartModal();

        window['notifyCartAddition']?.()
    }

    function updateCartModal() {
        /** @type {HTMLElement} */ const cartItemsContainer = document.querySelector("#cartModal .modal-content #cart-items");
        /** @type {HTMLElement} */ const totalAmountElement = document.querySelector("#cartModal .total-amount");
        /** @type {HTMLElement} */ const checkoutBtn = document.querySelector("#checkout-btn");

        if (!cartItemsContainer || !totalAmountElement || !checkoutBtn) {
            console.error('Néhány kosár elem nem található!');
            return;
        }

        let totalAmount = 0;

        if (cartItems.length > 0) {
            cartItemsContainer.innerHTML = ""; 
    
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

                totalAmount += parseFloat(item.price) || 0;
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

    updateCartModal();

    function addToWishlist(bookId) {
        if (!isBookInWishlist(bookId)) {
            window.WishlistManager.add(bookId);
            window['notifyWishlistAddition']?.()
        }
    }

    function isBookInWishlist(bookId) {
        return window.WishlistManager.wishlist.some(item => item.book_id === bookId);
    }
});
