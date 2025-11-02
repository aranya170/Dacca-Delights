
document.addEventListener('DOMContentLoaded', () => {
    const cartToggle = document.getElementById('cart-toggle');
    const cartToggleMobile = document.getElementById('cart-toggle-mobile');
    const closeCart = document.getElementById('close-cart');
    const cartDrawer = document.getElementById('cart-drawer');
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartCount = document.getElementById('cart-count');
    const cartCountMobile = document.getElementById('cart-count-mobile');
    const cartTotal = document.getElementById('cart-total');

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Toggle cart drawer
    cartToggle.addEventListener('click', () => {
        cartDrawer.classList.remove('cart-hidden');
        cartDrawer.classList.add('cart-visible');
    });

    cartToggleMobile.addEventListener('click', () => {
        cartDrawer.classList.remove('cart-hidden');
        cartDrawer.classList.add('cart-visible');
    });

    closeCart.addEventListener('click', () => {
        cartDrawer.classList.remove('cart-visible');
        cartDrawer.classList.add('cart-hidden');
    });

    // Add to cart
    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const price = parseInt(button.dataset.price);

            const existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }

            updateCart();
        });
    });

    // Update cart
    function updateCart() {
        renderCartItems();
        updateCartCount();
        updateCartTotal();
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Render cart items
    function renderCartItems() {
        cartItemsContainer.innerHTML = '';
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p class="text-center text-gray-500">Your cart is empty.</p>';
            return;
        }

        cart.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('flex', 'justify-between', 'items-center', 'mb-4');
            cartItem.innerHTML = `
                <div>
                    <h3 class="text-lg font-bold text-gray-800 font-outfit">${item.name}</h3>
                    <p class="text-gray-600 font-outfit">${item.price} tk</p>
                </div>
                <div class="flex items-center">
                    <button class="quantity-btn text-gray-700 focus:outline-none" data-id="${item.id}" data-action="decrease">
                        <i class="fas fa-minus-circle"></i>
                    </button>
                    <span class="mx-2">${item.quantity}</span>
                    <button class="quantity-btn text-gray-700 focus:outline-none" data-id="${item.id}" data-action="increase">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    <button class="remove-btn text-red-500 focus:outline-none ml-4" data-id="${item.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            cartItemsContainer.appendChild(cartItem);
        });

        // Add event listeners for quantity and remove buttons
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const action = button.dataset.action;
                const item = cart.find(item => item.id === id);

                if (action === 'increase') {
                    item.quantity++;
                } else if (action === 'decrease') {
                    item.quantity--;
                    if (item.quantity === 0) {
                        cart = cart.filter(item => item.id !== id);
                    }
                }
                updateCart();
            });
        });

        document.querySelectorAll('.remove-btn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                cart = cart.filter(item => item.id !== id);
                updateCart();
            });
        });
    }

    // Update cart count
    function updateCartCount() {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartCount.textContent = totalItems;
        cartCountMobile.textContent = totalItems;
    }

    // Update cart total
    function updateCartTotal() {
        cartTotal.textContent = `${cart.reduce((total, item) => total + (item.price * item.quantity), 0)} tk`;
    }

    // Initial cart update
    updateCart();
});
