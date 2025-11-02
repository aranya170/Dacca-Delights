<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Dacca Delights</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/jpeg" href="assets/logo/481163664_10229431150832277_6672533633109793344_n.jpg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Dancing+Script:wght@400;500;600;700&family=Pacifico&family=Great+Vibes&family=Kaushan+Script&display=swap"
        rel="stylesheet">
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    banana: '#F7DC6F',
                    'banana-dark': '#F4D03F',
                    'cream': '#FAF0E6',
                    'gold': '#D4AF37',
                    'warm-brown': '#8B4513',
                },
                fontFamily: {
                    'outfit': ['Outfit', 'sans-serif'],
                    'script': ['Dancing Script', 'cursive'],
                    'fancy': ['Great Vibes', 'cursive'],
                    'bakery': ['Kaushan Script', 'cursive']
                }
            }
        }
    }
    </script>
</head>

<body class="bg-cream">
    <?php include 'navbar.php'; ?>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                <h1 class="text-4xl lg:text-5xl font-black text-gray-800 font-outfit leading-tight mb-8 text-center">
                    Checkout
                </h1>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div>
                        <h2 class="text-2xl font-bold font-outfit text-gray-800 mb-4">Your Order</h2>
                        <div id="order-summary" class="mb-8">
                            <!-- Order summary will be dynamically inserted here -->
                        </div>
                        <div class="flex justify-between items-center border-t pt-4">
                            <span class="text-xl font-bold font-outfit text-gray-800">Total:</span>
                            <span id="order-total" class="text-xl font-bold font-outfit text-gray-800">0 tk</span>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold font-outfit text-gray-800 mb-4">Shipping Details</h2>
                        <form id="checkout-form" action="form_handler.php" method="POST">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="name" class="block text-lg font-medium text-gray-700 font-outfit">Full Name</label>
                                    <input type="text" id="name" name="name" required
                                        class="mt-1 block w-full px-4 py-3 rounded-full border-2 border-gray-200 focus:border-banana outline-none font-outfit text-lg">
                                </div>
                                <div>
                                    <label for="phone" class="block text-lg font-medium text-gray-700 font-outfit">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" required
                                        class="mt-1 block w-full px-4 py-3 rounded-full border-2 border-gray-200 focus:border-banana outline-none font-outfit text-lg">
                                </div>
                                <div>
                                    <label for="email" class="block text-lg font-medium text-gray-700 font-outfit">Email</label>
                                    <input type="email" id="email" name="email" required
                                        class="mt-1 block w-full px-4 py-3 rounded-full border-2 border-gray-200 focus:border-banana outline-none font-outfit text-lg">
                                </div>
                                <div>
                                    <label for="address" class="block text-lg font-medium text-gray-700 font-outfit">Address</label>
                                    <textarea id="address" name="address" rows="3" required
                                        class="mt-1 block w-full px-4 py-3 rounded-2xl border-2 border-gray-200 focus:border-banana outline-none font-outfit text-lg"></textarea>
                                </div>
                                <div>
                                    <label for="delivery_instructions" class="block text-lg font-medium text-gray-700 font-outfit">Delivery Instructions</label>
                                    <textarea id="delivery_instructions" name="delivery_instructions" rows="3"
                                        class="mt-1 block w-full px-4 py-3 rounded-2xl border-2 border-gray-200 focus:border-banana outline-none font-outfit text-lg"></textarea>
                                </div>
                                <div>
                                    <label class="block text-lg font-medium text-gray-700 font-outfit">Payment Method</label>
                                    <div class="mt-2 flex gap-4">
                                        <label class="flex items-center">
                                            <input type="radio" name="payment_method" value="cod" checked class="mr-2">
                                            Cash on Delivery
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="payment_method" value="bkash" class="mr-2">
                                            bKash
                                        </label>
                                    </div>
                                </div>
                                <div id="bkash-transaction-id-container" class="hidden">
                                    <label for="bkash_transaction_id" class="block text-lg font-medium text-gray-700 font-outfit">bKash Transaction ID</label>
                                    <input type="text" id="bkash_transaction_id" name="bkash_transaction_id"
                                        class="mt-1 block w-full px-4 py-3 rounded-full border-2 border-gray-200 focus:border-banana outline-none font-outfit text-lg">
                                </div>
                                <input type="hidden" name="order_items" id="order_items">
                                <input type="hidden" name="order_total" id="order_total_hidden">
                            </div>
                            <div class="mt-8">
                                <button type="submit"
                                    class="w-full bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-3 rounded-full btn-hover transition-colors duration-300">
                                    Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const orderSummaryContainer = document.getElementById('order-summary');
            const orderTotal = document.getElementById('order-total');
            const orderItemsInput = document.getElementById('order_items');
            const orderTotalInput = document.getElementById('order_total_hidden');

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            function renderOrderSummary() {
                orderSummaryContainer.innerHTML = '';
                if (cart.length === 0) {
                    orderSummaryContainer.innerHTML = '<p class="text-center text-gray-500">Your cart is empty.</p>';
                    return;
                }

                cart.forEach(item => {
                    const orderItem = document.createElement('div');
                    orderItem.classList.add('flex', 'justify-between', 'items-center', 'mb-4');
                    orderItem.innerHTML = `
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 font-outfit">${item.name}</h3>
                            <p class="text-gray-600 font-outfit">${item.price} tk x ${item.quantity}</p>
                        </div>
                        <div class="text-lg font-bold text-gray-800 font-outfit">
                            ${item.price * item.quantity} tk
                        </div>
                    `;
                    orderSummaryContainer.appendChild(orderItem);
                });
            }

            function updateOrderTotal() {
                const total = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
                orderTotal.textContent = `${total} tk`;
                orderTotalInput.value = total;
            }

            function updateOrderItems() {
                orderItemsInput.value = JSON.stringify(cart);
            }

            renderOrderSummary();
            updateOrderTotal();
            updateOrderItems();

            const checkoutForm = document.getElementById('checkout-form');
            checkoutForm.addEventListener('submit', () => {
                localStorage.removeItem('cart');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
            const bkashTransactionIdContainer = document.getElementById('bkash-transaction-id-container');

            paymentMethodRadios.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (radio.value === 'bkash') {
                        bkashTransactionIdContainer.classList.remove('hidden');
                    } else {
                        bkashTransactionIdContainer.classList.add('hidden');
                    }
                });
            });
        });
    </script>
    <script src="script.js"></script>
</body>

</html>