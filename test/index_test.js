const { JSDOM } = require("jsdom");
const fs = require("fs");

//Szimulálni kell a DOM-ot mert közvetlenül nem képes ez a driver a localstorage-ot megvizsgálni
const dom = new JSDOM(`
<!DOCTYPE html>
<html>
  <body>
    <div id="cartModal">
      <div class="modal-content">
        <div id="cart-items"></div>
        <div class="total-amount"></div>
      </div>
    </div>
  </body>
</html>
`, { url: "http://localhost" });

global.window = dom.window;
global.document = dom.window.document;
global.localStorage = dom.window.localStorage;

function showCartItems() {
    const cartModal = document.getElementById("cartModal");
    const cartItemsContainer = document.getElementById("cart-items");
    const totalAmountElement = document.querySelector(".total-amount");

    cartItemsContainer.innerHTML = "";
    totalAmountElement.textContent = "";

    const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

    if (cartItems.length === 0) {
        cartItemsContainer.innerHTML = "<p>A kosár üres.</p>";
        totalAmountElement.textContent = "";
    } else {
        let totalAmount = 0;
        cartItems.forEach((item) => {
            const itemDiv = document.createElement("div");
            itemDiv.classList.add("cart-item");

            const image = document.createElement("img");
            image.src = item.image;
            image.alt = item.title;

            const title = document.createElement("h4");
            title.textContent = item.title;

            const price = document.createElement("p");
            price.textContent = `${item.price.toFixed(0)} Ft`;

            itemDiv.appendChild(image);
            itemDiv.appendChild(title);
            itemDiv.appendChild(price);

            cartItemsContainer.appendChild(itemDiv);

            totalAmount += item.price;
        });

        totalAmountElement.textContent = `Összesen: ${totalAmount.toFixed(0)} Ft`;
    }
}

function logToFile(text) {
    fs.appendFileSync("test_log.txt", text + "\n", "utf8", (err) => {
        if (err) {
            console.error("Hiba történt a fájlba íráskor: ", err);
        }
    });
}

function runTests() {
    if (!fs.existsSync("test_log.txt")) {
        fs.writeFileSync("test_log.txt", "🚀 Tesztelés elkezdődött...\n", "utf8");
    }

    //test 1
    localStorage.removeItem("cartItems");
    showCartItems();
    const emptyMessage = document.getElementById("cart-items").textContent.trim();
    logToFile("✅ Üres kosár teszt: " + (emptyMessage === "A kosár üres." ? "Sikeres" : "Sikertelen"));

    //test 2
    localStorage.setItem("cartItems", JSON.stringify([
        { image: "book.jpg", title: "Teszt Könyv", price: 3500 }
    ]));
    showCartItems();
    const itemsHTML = document.getElementById("cart-items").innerHTML;
    const total = document.querySelector(".total-amount").textContent.trim();
    logToFile("✅ Egy termék teszt: " + (itemsHTML.includes("Teszt Könyv") && total === "Összesen: 3500 Ft" ? "Sikeres" : "Sikertelen"));

    //test 3
    localStorage.setItem("cartItems", JSON.stringify([
        { image: "book1.jpg", title: "Könyv 1", price: 2000 },
        { image: "book2.jpg", title: "Könyv 2", price: 3000 },
    ]));
    showCartItems();
    const total2 = document.querySelector(".total-amount").textContent.trim();
    logToFile("✅ Több termék teszt: " + (total2 === "Összesen: 5000 Ft" ? "Sikeres" : "Sikertelen"));

    logToFile("🎉 Tesztelés vége.");
}

runTests();
