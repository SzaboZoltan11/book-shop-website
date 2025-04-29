document.addEventListener("DOMContentLoaded", function () {
    const cartIcon = document.getElementById('cart-icon');
    const cartModal = document.getElementById('cartModal');
    const closeModal = document.getElementById('close-modal');
    const checkoutBtn = document.getElementById('checkout-btn');
    const cartItemsContainer = document.getElementById('cart-items');
    const addToCartBtn = document.getElementsByClassName('buy-btn').item(0);

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
});
