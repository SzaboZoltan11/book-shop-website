document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".search-bar input");
    const searchBar = document.querySelector(".search-bar");
    const logo = document.querySelector(".navbar-brand");
    const wishlist = document.querySelector("a[href='wishlist.html']");
    const cart = document.querySelector("a[href='cart.html']");
    const login = document.querySelector("a[href='logination.php']");
    const register = document.querySelector("a[href='registration.php']");
    const mediaQuery = window.matchMedia("(max-width: 1200px)");

    function toggleSearchState(event) {
        if (mediaQuery.matches) {
            if (event.type === "focus") {
                logo.style.display = "none";
                wishlist.style.display = "none";
                cart.style.display = "none";
                login.style.display = "none";
                register.style.display = "none";
                searchInput.classList.add("expanded");
                searchBar.style.width = "100%";
            } else if (event.type === "blur") {
                logo.style.display = "";
                wishlist.style.display = "";
                cart.style.display = "";
                login.style.display = "";
                register.style.display = "";
                searchInput.classList.remove("expanded");
                searchBar.style.width = "";
            }
        }
    }

    if (searchInput && searchBar) {
        searchInput.addEventListener("focus", toggleSearchState);
        searchInput.addEventListener("blur", toggleSearchState);
    }

    // Slider kód több containerhez
    const sliderContainers = document.querySelectorAll(".slider-container");

    sliderContainers.forEach(container => {
        const slider = container.querySelector(".slider");
        const prevBtn = container.querySelector(".prev-btn");
        const nextBtn = container.querySelector(".next-btn");
        const category = container.getAttribute("data-category");

        const _books = [];

        fetch(`/bookshop/web/api/books.php?category=${category}`)
            .then(res => res.json())
            .then(books => {
                _books.push(...books);
                books.forEach(book => {
                    const card = document.createElement("div");
                    card.classList.add("card");
                    card.style.position = "relative";
                    card.style.overflow = "hidden";

                    card.innerHTML = `
                        <img src="/bookshop/web/database/covers/${book.cover}.png">
                        <div class="card-info">
                            <p class="title">${book.title}</p>
                            <p class="price">${Math.floor(book.price)} Ft</p>
                            <button class="buy-btn">Vásárlás</button>
                        </div>
                    `;

                    slider.appendChild(card);
                });
            })
            .catch(console.error);

        let scrollAmount = 0;
        const scrollStep = 270;

        function handleResize() {
            if (window.innerWidth < 1201) {
                prevBtn.style.display = "none";
                nextBtn.style.display = "none";
                slider.style.transition = "none";
                slider.classList.add("scrollable");
            } else {
                prevBtn.style.display = "block";
                nextBtn.style.display = "block";
                slider.style.transition = "transform 0.3s ease-in-out";
                slider.classList.remove("scrollable");
            }
        }

        nextBtn.addEventListener("click", () => {
            if (window.innerWidth >= 1201) {
                const maxScroll = (_books.length - 4) * scrollStep;
                if (scrollAmount < maxScroll) {
                    scrollAmount += scrollStep;
                    slider.style.transform = `translateX(-${scrollAmount}px)`;
                }
            }
        });

        prevBtn.addEventListener("click", () => {
            if (window.innerWidth >= 1201 && scrollAmount > 0) {
                scrollAmount -= scrollStep;
                slider.style.transform = `translateX(-${scrollAmount}px)`;
            }
        });

        handleResize();
        window.addEventListener("resize", handleResize);
    });

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
