document.addEventListener("DOMContentLoaded", function () {
    var cartIcon = document.getElementById('cart-icon');
    var cartModal = document.getElementById('cartModal');
    var closeModal = document.getElementById('close-modal');
    var checkoutBtn = document.getElementById('checkout-btn');
    var cartItemsContainer = document.getElementById('cart-items');
    var addToCartBtn = document.getElementById('buy-btn');

    function toggleCheckoutButton() {
        if (cartItemsContainer.children.length > 0) {
            checkoutBtn.style.display = 'block';
        } else {
            checkoutBtn.style.display = 'none';
        }
    }

    cartIcon.addEventListener('click', function (event) {
        event.preventDefault();
        cartModal.classList.add('show');
        toggleCheckoutButton();
    });

    closeModal.addEventListener('click', function () {
        cartModal.classList.remove('show');
    });

    window.addEventListener('click', function (event) {
        if (event.target == cartModal) {
            cartModal.classList.remove('show');
        }
    });

    // Dinamikus hozzáadás a kosárhoz
    addToCartBtn.addEventListener('click', function () {
        var newItem = document.createElement('div');
        newItem.classList.add('cart-item');
        newItem.textContent = 'Könyv neve'; // Dinamikus név is lehet
        cartItemsContainer.appendChild(newItem);
        toggleCheckoutButton(); // Ez frissíti a gombot
    });
});
