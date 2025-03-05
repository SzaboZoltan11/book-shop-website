document.addEventListener("DOMContentLoaded", function() {
    var cartIcon = document.getElementById('cart-icon');
    var cartModal = document.getElementById('cartModal');
    var closeModal = document.getElementById('close-modal');

    cartIcon.addEventListener('click', function(event) {
        event.preventDefault();
        cartModal.classList.add('show'); 
    });

    closeModal.addEventListener('click', function() {
        cartModal.classList.remove('show'); 
    });

    window.addEventListener('click', function(event) {
        if (event.target == cartModal) {
            cartModal.classList.remove('show');
        }
    });
});
