<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Dacca Delights</title>
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
    <style>
    .unified-bg {
        background: linear-gradient(135deg, #FAF0E6 0%, #FDF2E9 100%);
    }

    .btn-hover {
        transition: all 0.3s ease;
    }

    .btn-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card-shadow {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .menu-item {
        transition: all 0.3s ease;
    }

    .menu-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 767px) {
        .menu-item h3 {
            font-size: 1.125rem;
            /* equivalent to text-lg */
            line-height: 1.75rem;
        }

        .menu-item span {
            font-size: 1.25rem;
            /* equivalent to text-xl */
            line-height: 1.75rem;
        }
    }
    </style>
</head>

<body class="bg-white">
    <?php include 'navbar.php'; ?>
    <script src="script.js"></script>

    <!-- Hero Section -->
    <section class="unified-bg py-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-2">
                <h1 class="text-6xl lg:text-7xl font-black text-gray-800 font-outfit leading-tight mb-4">
                    Our Menu
                </h1>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white rounded-3xl p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <!-- Search Bar -->
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search menu items..."
                            class="w-full px-6 py-4 rounded-full border-2 border-gray-200 focus:border-banana outline-none font-outfit text-lg">
                        <i class="fas fa-search absolute right-6 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <!-- Category Filter -->
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-end">
                        <button
                            class="filter-btn active bg-banana text-gray-800 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm"
                            data-category="all">
                            All Items
                        </button>
                        <button
                            class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm"
                            data-category="bagels">
                            Bagels
                        </button>

                        <button
                            class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm"
                            data-category="breads">
                            Breads
                        </button>
                        <button
                            class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm"
                            data-category="buns">
                            Buns & Rolls
                        </button>
                        <button
                            class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm"
                            data-category="desserts">
                            Desserts
                        </button>
                        <button
                            class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm"
                            data-category="tarts">
                            Tarts
                        </button>
                        <button
                            class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm"
                            data-category="gluten-free">
                            Gluten Free
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Items Section -->
    <section class="py-20 bg-cream">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Breads Section -->
            <div class="menu-category mb-16" data-category="breads">
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
                        <div class="order-2 lg:order-1">
                            <img src="assets/Items/Bread.jpeg" alt="Bread"
                                class="w-64 h-64 object-cover rounded-full shadow-xl mx-auto">
                        </div>
                        <div class="order-1 lg:order-2">
                            <h2 class="text-5xl lg:text-6xl font-black text-warm-brown font-outfit leading-tight mb-4">
                                Breads
                            </h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="sandwich bread"
                            data-price="250">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Sandwich Bread</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 1000 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">250
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="sourdough bread"
                            data-price="350">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Sourdough Bread</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 650 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">350
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md"
                            data-name="sourdough bread whole wheat" data-price="420">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Sourdough Bread (Whole
                                        Wheat)</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 650 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">420
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="baguette" data-price="300">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Baguette</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 400 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">300
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative" data-name="mini baguette"
                            data-price="300">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Mini Baguette</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 200 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">300
                                        tk/pair</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="milk bread"
                            data-price="200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Milk Bread</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 650 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">200
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="premium brown bread"
                            data-price="350">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Premium Brown Bread
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 650 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">350
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="regular brown bread"
                            data-price="300">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Regular Brown Bread
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 650 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">300
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="premium multigrain bread"
                            data-price="450">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Premium Multigrain
                                        Bread
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 650 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">450
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="regular multigrain bread"
                            data-price="400">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Regular Multigrain
                                        Bread
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 650 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">400
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="khobus" data-price="40">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Khobus</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 100 gm) (minimum 6 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">40
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative"
                            data-name="regular ciabatta bread" data-price="80">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Regular Ciabatta Bread
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~180 gm) (Minimum 4 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">80
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative"
                            data-name="premium ciabatta bread" data-price="100">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Premium Ciabatta Bread
                                    </h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-lg font-semibold text-orange-600 font-outfit whitespace-nowrap">Coming
                                        soon!</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="arabian khalid al nahal"
                            data-price="1200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Arabian Khalid Al
                                        Nahal*
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(9 inch) *Available only on weekends
                                    </p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">1200
                                        tk/loaf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Buns & Rolls Section -->
            <div class="menu-category mb-16" data-category="buns">
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
                        <div class="order-2 lg:order-1">
                            <img src="assets/Items/roll.jpeg" alt="Buns and Rolls"
                                class="w-64 h-64 object-cover rounded-full shadow-xl mx-auto">
                        </div>
                        <div class="order-1 lg:order-2">
                            <h2 class="text-5xl lg:text-6xl font-black text-warm-brown font-outfit leading-tight mb-4">
                                Buns & Rolls
                            </h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="burger bun"
                            data-price="50">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Burger Bun</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm) (minimum 6 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">50
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="brioche burger bun"
                            data-price="65">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Brioche Burger Bun</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm) (minimum 6 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">65
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="mini burger bun"
                            data-price="35">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Mini Burger Bun</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 35 gm) (minimum 12 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">35
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="sourdough bun"
                            data-price="65">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Sourdough Bun</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm) (minimum 10 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">65
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="brioche roll"
                            data-price="60">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Brioche Roll</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm) (minimum 6 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">60
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative" data-name="hot cross bun"
                            data-price="85">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Hot Cross Bun</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(minimum 6 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">85
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bagels Section -->
            <div class="menu-category mb-16" data-category="bagels">
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
                        <div>
                            <h2 class="text-5xl lg:text-6xl font-black text-warm-brown font-outfit leading-tight mb-4">
                                Bagels
                            </h2>
                            <p class="text-gray-700 font-outfit text-lg mb-4">
                                A minimum of <span class="bg-banana px-2 py-1 rounded font-semibold">6 bagels</span> per
                                order is required.
                            </p>
                        </div>
                        <div class="flex justify-center">
                            <img src="assets/Items/Bagels.jpeg" alt="Bagel"
                                class="w-64 h-64 object-cover rounded-full shadow-xl">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative"
                            data-name="cinnamon raisin bagel" data-price="95">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Cinnamon Raisin Bagel
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">95
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="plain bagel"
                            data-price="80">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Plain Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">80
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="sesame bagel"
                            data-price="80">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Sesame Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">80
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="mixed seed bagel"
                            data-price="90">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Mixed Seed Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">90
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="chia bagel"
                            data-price="90">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Chia Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">90
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="cheese bagel"
                            data-price="100">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Cheese Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">100
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="black sesame bagel"
                            data-price="95">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Black Sesame Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">95
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="bagel bunch"
                            data-price="500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Bagel Bunch</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(A set of Plain, Cheese, White Sesame,
                                        Black Sesame, Chia and Mixed Seed Bagel)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">500
                                        tk/set</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="garlic herb bagel"
                            data-price="0">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Garlic Herb Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-lg font-semibold text-orange-600 font-outfit whitespace-nowrap">Coming
                                        soon!</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="everything bagel"
                            data-price="0">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Everything Bagel</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 90 gm)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-lg font-semibold text-orange-600 font-outfit whitespace-nowrap">Coming
                                        soon!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Desserts Section -->
            <div class="menu-category mb-16" data-category="desserts">
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
                        <div>
                            <h2 class="text-5xl lg:text-6xl font-black text-warm-brown font-outfit leading-tight mb-4">
                                Dessert
                            </h2>
                            <p class="text-gray-700 font-outfit text-lg mb-4">
                                A minimum of <span class="bg-banana px-2 py-1 rounded font-semibold">2 pieces</span> of
                                Brownies per order is required.
                            </p>
                        </div>
                        <div class="flex justify-center">
                            <img src="assets/Items/muffin.jpeg" alt="Brownie"
                                class="w-64 h-64 object-cover rounded-full shadow-xl">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="cheese kunafa"
                            data-price="290">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Cheese Kunafa</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(minimum 2 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">290
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="chocolate brownie"
                            data-price="115">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Chocolate Brownie</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">115
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md"
                            data-name="chocolate peanut crunch brownie" data-price="130">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Chocolate Peanut Crunch
                                        Brownie</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">130
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="chocolate chips cookie"
                            data-price="75">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Chocolate Chips Cookie
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 50 gm) (minimum 10 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">75
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="oatmeal cookie"
                            data-price="65">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Oatmeal Cookie</h3>
                                    <p class="text-gray-600 font-outfit text-sm">(~ 25 gm) (minimum 10 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">65
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative"
                            data-name="pumpkin spice muffin" data-price="65">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Pumpkin Spice Muffin
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(minimum 4 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">65
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative"
                            data-name="carrot cheese muffin" data-price="65">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Carrot Cheese Muffin
                                    </h3>
                                    <p class="text-gray-600 font-outfit text-sm">(minimum 4 pieces)</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">65
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie & Tarts Section -->
            <div class="menu-category mb-16" data-category="tarts">
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
                        <div>
                            <h2 class="text-5xl lg:text-6xl font-black text-warm-brown font-outfit leading-tight mb-4">
                                Pie & Tart
                            </h2>
                            <p class="text-gray-700 font-outfit text-lg mb-4">
                                A minimum of <span class="bg-banana px-2 py-1 rounded font-semibold">4 pieces</span> of
                                Tarts per order is required.
                            </p>
                        </div>
                        <div class="flex justify-center">
                            <img src="assets/Items/tart.jpeg" alt="Tart"
                                class="w-64 h-64 object-cover rounded-full shadow-xl">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="mango cheese tart"
                            data-price="135">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Mango Cheese Tart</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">135
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="hokkaido cheese tart"
                            data-price="125">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Hokkaido Cheese Tart
                                    </h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">125
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="egg tart" data-price="120">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Egg Tart</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">120
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="chocolate cheese tart"
                            data-price="125">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Chocolate Cheese Tart
                                    </h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">125
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md" data-name="custard tart"
                            data-price="120">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Custard Tart</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">120
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative" data-name="lemon tart"
                            data-price="150">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Lemon Tart</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl md:text-xl font-bold text-gray-800 font-outfit whitespace-nowrap">150
                                        tk/pc.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <!-- Gluten Free Section -->
            <div class="menu-category mb-16" data-category="gluten-free">
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
                        <div>
                            <h2 class="text-5xl lg:text-6xl font-black text-warm-brown font-outfit leading-tight mb-4">
                                Gluten Free
                            </h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative"
                            data-name="regular ragi bread" data-price="0">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Regular Ragi Bread</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-lg font-semibold text-orange-600 font-outfit whitespace-nowrap">Coming
                                        soon!</span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item bg-white p-6 rounded-2xl shadow-md relative"
                            data-name="premium ragi bread" data-price="0">
                            <div class="absolute -top-2 -left-2">
                                <div
                                    class="bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12">
                                    New!
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-outfit mr-2">Premium Ragi Bread</h3>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-lg font-semibold text-orange-600 font-outfit whitespace-nowrap">Coming
                                        soon!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- No Results Message -->
            <div id="noResults" class="text-center py-20 hidden">
                <h3 class="text-2xl font-bold text-gray-800 font-outfit mb-2">No items found</h3>
                <p class="text-gray-600 font-outfit">Try adjusting your search or filter criteria</p>
            </div>
        </div>
    </section>



    <script>
    // Search and Filter Functionality
    const searchInput = document.getElementById('searchInput');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const menuItems = document.querySelectorAll('.menu-item');
    const menuCategories = document.querySelectorAll('.menu-category');
    const noResults = document.getElementById('noResults');

    let currentFilter = 'all';

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        filterItems(searchTerm, currentFilter);
    });

    // Filter functionality
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active filter button
            filterBtns.forEach(b => b.classList.remove('active', 'bg-banana', 'text-gray-800'));
            filterBtns.forEach(b => b.classList.add('bg-gray-200', 'text-gray-700'));

            this.classList.add('active', 'bg-banana', 'text-gray-800');
            this.classList.remove('bg-gray-200', 'text-gray-700');

            currentFilter = this.dataset.category;
            const searchTerm = searchInput.value.toLowerCase();
            filterItems(searchTerm, currentFilter);
        });
    });

    function filterItems(searchTerm, category) {
        let visibleCount = 0;

        // Handle category filtering
        menuCategories.forEach(categoryDiv => {
            const categoryName = categoryDiv.dataset.category;

            if (category === 'all' || category === categoryName) {
                categoryDiv.style.display = 'block';

                // Handle search within visible categories
                const items = categoryDiv.querySelectorAll('.menu-item');
                let categoryHasVisible = false;

                items.forEach(item => {
                    const itemName = item.dataset.name.toLowerCase();
                    const matchesSearch = itemName.includes(searchTerm);

                    if (matchesSearch) {
                        item.style.display = 'block';
                        visibleCount++;
                        categoryHasVisible = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Hide category if no items match search
                if (!categoryHasVisible && searchTerm) {
                    categoryDiv.style.display = 'none';
                }
            } else {
                categoryDiv.style.display = 'none';
            }
        });

        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }

    // Hover effects for buttons
    document.querySelectorAll('.btn-hover').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    </script>
    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>