<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dacca Delights POS System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'cream': '#FAF0E6',
                    'gold': '#FA812F',
                    'warm-brown': '#8B4513',
                    'bakery-orange': '#FF7F50',
                    'bakery-green': '#28A745',
                },
                fontFamily: {
                    'inter': ['Inter', 'sans-serif'],
                }
            }
        }
    }
    </script>

    <style>
    .btn-hover {
        transition: all 0.3s ease;
    }

    .btn-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card-shadow {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 10px -3px rgba(0, 0, 0, 0.04);
    }

    .menu-item:hover {
        transform: scale(1.02);
    }

    .order-summary {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    .fade-in {
        animation: fadeIn 0.3s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @media print {
        .no-print {
            display: none !important;
        }

        #receipt-modal {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
        }
    }
    </style>
</head>

<body class="bg-cream min-h-screen font-inter">

    <!-- Header -->
    <header class="bg-white shadow-md border-b-4 border-gold no-print">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <a href="#" class="flex items-center space-x-3">
                        <img src="..\assets\logo\Logo_Dacca Delights-03.svg" alt="Dacca Delights Logo"
                            class="h-10 w-10 object-cover rounded-md shadow-sm">
                        <div>
                            <h1 class="text-2xl font-bold text-warm-brown">Dacca Delights</h1>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Today's Date</p>
                        <p class="font-semibold" id="current-date"></p>
                    </div>
                    <button id="reports-btn" class="bg-gold text-white px-4 py-2 rounded-lg btn-hover">
                        <i class="fas fa-chart-line mr-2"></i>Reports
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-6 no-print">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Menu Section (Left Side) -->
            <div class="lg:col-span-2">
                <!-- Search and Categories -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex flex-col md:flex-row gap-4 mb-6">
                        <div class="flex-1">
                            <input type="text" id="search-input" placeholder="Search menu items..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-transparent">
                        </div>
                        <select id="category-filter"
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
                            <option value="">All Categories</option>
                        </select>
                    </div>

                    <!-- Category Pills -->
                    <div id="category-pills" class="flex flex-wrap gap-2 mb-4">
                        <!-- Categories will be loaded here -->
                    </div>
                </div>

                <!-- Menu Items Grid -->
                <div id="menu-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <!-- Menu items will be loaded here -->
                </div>

                <!-- Loading State -->
                <div id="loading-menu" class="text-center py-8">
                    <i class="fas fa-spinner fa-spin text-2xl text-gold"></i>
                    <p class="mt-2 text-gray-600">Loading menu items...</p>
                </div>
            </div>

            <!-- Order Summary (Right Side) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
                    <h2 class="text-xl font-bold text-warm-brown mb-4">Current Order</h2>

                    <!-- Customer Info -->
                    <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold mb-2">Customer Information</h3>
                        <input type="text" id="customer-name" placeholder="Customer Name (Optional)"
                            class="w-full px-3 py-2 border border-gray-300 rounded mb-2 text-sm">
                        <input type="text" id="customer-phone" placeholder="Phone Number (Optional)"
                            class="w-full px-3 py-2 border border-gray-300 rounded text-sm">
                    </div>

                    <!-- Order Items -->
                    <div id="order-items" class="order-summary mb-4">
                        <div id="empty-cart" class="text-center py-8 text-gray-500">
                            <i class="fas fa-shopping-cart text-3xl mb-2"></i>
                            <p>No items in cart</p>
                        </div>
                    </div>

                    <!-- Order Total -->
                    <div id="order-totals" class="border-t pt-4 space-y-2 hidden">
                        <div class="flex justify-between">
                            <span>Subtotal:</span>
                            <span id="subtotal">৳0.00</span>
                        </div>
                        <div class="flex justify-between font-bold text-lg border-t pt-2">
                            <span>Total:</span>
                            <span id="total-amount">৳0.00</span>
                        </div>
                    </div>

                    <!-- Payment Section -->
                    <div id="payment-section" class="mt-4 hidden">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold mb-3">Payment</h3>
                            <div class="space-y-2">
                                <div class="flex gap-2">
                                    <button
                                        class="payment-method-btn bg-bakery-green text-white px-3 py-1 rounded text-sm"
                                        data-method="cash">Cash</button>
                                    <button
                                        class="payment-method-btn bg-gray-300 text-gray-700 px-3 py-1 rounded text-sm"
                                        data-method="card">Card</button>
                                    <button
                                        class="payment-method-btn bg-gray-300 text-gray-700 px-3 py-1 rounded text-sm"
                                        data-method="mobile">Mobile</button>
                                </div>
                                <input type="number" id="amount-paid" placeholder="Amount Paid" step="0.01"
                                    class="w-full px-3 py-2 border border-gray-300 rounded">
                                <div id="change-amount" class="text-sm text-gray-600 hidden">
                                    Change: <span class="font-semibold text-bakery-green">৳0.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-2 mt-4">
                            <button id="clear-order-btn"
                                class="flex-1 bg-gray-500 text-white py-2 rounded-lg btn-hover">
                                <i class="fas fa-trash mr-2"></i>Clear
                            </button>
                            <button id="process-order-btn"
                                class="flex-2 bg-bakery-orange text-white py-2 px-4 rounded-lg btn-hover">
                                <i class="fas fa-check mr-2"></i>Process Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Receipt Modal -->
    <div id="receipt-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg max-w-md w-full mx-4">
            <div class="text-center mb-4">
                <h3 class="text-xl font-bold text-warm-brown">Order Receipt</h3>
                <p class="text-sm text-gray-600">Order #<span id="receipt-order-number"></span></p>
            </div>

            <div id="receipt-content" class="border-t border-b py-4 my-4">
                <!-- Receipt content will be generated here -->
            </div>

            <div class="flex gap-2 no-print">
                <button id="print-receipt-btn" class="flex-1 bg-gold text-white py-2 rounded-lg btn-hover">
                    <i class="fas fa-print mr-2"></i>Print
                </button>
                <button id="close-receipt-btn" class="flex-1 bg-gray-500 text-white py-2 rounded-lg btn-hover">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Reports Modal -->
    <div id="reports-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg max-w-4xl w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-warm-brown">Sales Reports</h3>
                <button id="close-reports-btn" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="flex gap-4 mb-4">
                <select id="report-type-filter" class="px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
                <input type="date" id="report-date-filter" class="px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div id="reports-content">
                <!-- Reports content will be generated here -->
            </div>

            <div class="mt-4">
                <canvas id="sales-chart"></canvas>
            </div>
        </div>
    </div>

    <script src="assets/js/pos.js"></script>
</body>

</html>