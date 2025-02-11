document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".search-bar input");
    const searchBar = document.querySelector(".search-bar"); 
    const logo = document.querySelector(".navbar-brand");
    const wishlist = document.querySelector("a[href='wishlist.html']");
    const cart = document.querySelector("a[href='cart.html']");
    const login = document.querySelector("a[href='../login.html']");
    const register = document.querySelector("a[href='../register.html']");
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
});

//kártya
document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("slider");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");

    fetch('/api/books')
        .then(v => v.json())
        .then(books => {
            for (const book of books) {
                const card = document.createElement("div")
                card.classList.add("card")
                card.innerHTML = `<img src="data:image/png;base64,${book.cover}"><p>${book.title}</p>`
                slider.appendChild(card)
            }
        })
        .catch(console.error)

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
            const maxScroll = (items.length - 4) * scrollStep; 
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
