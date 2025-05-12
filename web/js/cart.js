document.addEventListener("DOMContentLoaded", function () {
    const cartIcon = document.getElementById('cart-icon');
    const cartModal = document.getElementById('cartModal');
    const closeModal = document.getElementById('close-modal');
    const checkoutBtn = document.getElementById('checkout-btn');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartFeedback = document.getElementById('cart-feedback');
    const wishlistFeedback = document.getElementById('wishlist-feedback');

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
        if (event.target === cartModal) {
            cartModal.classList.remove('show');
        }
    });

    window['notifyCartAddition'] = function () {
        cartFeedback.classList.add('show');

        setTimeout(() => {
            cartFeedback.classList.remove('show');
        }, 2000);

        toggleCheckoutButton();
    }

    window['notifyWishlistAddition'] = function () {
        wishlistFeedback.classList.add('show');

        setTimeout(() => {
            wishlistFeedback.classList.remove('show');
        }, 2000);

        toggleCheckoutButton();
    }
});
