<?php
include 'admin/config/database.php';
$database = new Database();
$db = $database->getConnection();
?>

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
                        <?php
                        $query = "SELECT * FROM categories WHERE is_active = 1 ORDER BY sort_order";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo "<button class=\"filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-outfit font-semibold btn-hover text-sm\" data-category=\"$id\">$name</button>";
                        }
                        ?>
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
                        <?php
                        $query = "SELECT * FROM menu_items WHERE category_id = 'breads' AND is_available = 1";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo "<div class=\"menu-item relative bg-white p-6 rounded-2xl shadow-md\" data-name=\"$name\" data-price=\"$price\">";
                            if ($is_new) {
                                echo "<div class=\"absolute -top-2 -left-2\"><div class=\"bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12\">New!</div></div>";
                            }
                            echo "<div class=\"flex justify-between items-center\">";
                            echo "<div><h3 class=\"text-xl font-bold text-gray-800 font-outfit mr-2\">$name</h3><p class=\"text-gray-600 font-outfit text-sm\">$size_info</p></div>";
                            echo "<div class=\"text-right\"><button class=\"add-to-cart-btn bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-2 px-4 rounded-full btn-hover transition-colors duration-300 text-sm\" data-id=\"$id\" data-name=\"$name\" data-price=\"$price\">Add to Cart - $price tk</button></div>";
                            echo "</div></div>";
                        }
                        ?>
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
                        <?php
                        $query = "SELECT * FROM menu_items WHERE category_id = 'buns' AND is_available = 1";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo "<div class=\"menu-item bg-white p-6 rounded-2xl shadow-md\" data-name=\"$name\" data-price=\"$price\">";
                            if ($is_new) {
                                echo "<div class=\"absolute -top-2 -left-2\"><div class=\"bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12\">New!</div></div>";
                            }
                            echo "<div class=\"flex justify-between items-center\">";
                            echo "<div><h3 class=\"text-xl font-bold text-gray-800 font-outfit mr-2\">$name</h3><p class=\"text-gray-600 font-outfit text-sm\">$size_info</p></div>";
                            echo "<div class=\"text-right\"><button class=\"add-to-cart-btn bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-2 px-4 rounded-full btn-hover transition-colors duration-300 text-sm\" data-id=\"$id\" data-name=\"$name\" data-price=\"$price\">Add to Cart - $price tk</button></div>";
                            echo "</div></div>";
                        }
                        ?>
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
                        <?php
                        $query = "SELECT * FROM menu_items WHERE category_id = 'bagels' AND is_available = 1";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo "<div class=\"menu-item bg-white p-6 rounded-2xl shadow-md\" data-name=\"$name\" data-price=\"$price\">";
                            if ($is_new) {
                                echo "<div class=\"absolute -top-2 -left-2\"><div class=\"bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12\">New!</div></div>";
                            }
                            echo "<div class=\"flex justify-between items-center\">";
                            echo "<div><h3 class=\"text-xl font-bold text-gray-800 font-outfit mr-2\">$name</h3><p class=\"text-gray-600 font-outfit text-sm\">$size_info</p></div>";
                            echo "<div class=\"text-right\"><button class=\"add-to-cart-btn bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-2 px-4 rounded-full btn-hover transition-colors duration-300 text-sm\" data-id=\"$id\" data-name=\"$name\" data-price=\"$price\">Add to Cart - $price tk</button></div>";
                            echo "</div></div>";
                        }
                        ?>
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
                        <?php
                        $query = "SELECT * FROM menu_items WHERE category_id = 'desserts' AND is_available = 1";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo "<div class=\"menu-item bg-white p-6 rounded-2xl shadow-md\" data-name=\"$name\" data-price=\"$price\">";
                            if ($is_new) {
                                echo "<div class=\"absolute -top-2 -left-2\"><div class=\"bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12\">New!</div></div>";
                            }
                            echo "<div class=\"flex justify-between items-center\">";
                            echo "<div><h3 class=\"text-xl font-bold text-gray-800 font-outfit mr-2\">$name</h3><p class=\"text-gray-600 font-outfit text-sm\">$size_info</p></div>";
                            echo "<div class=\"text-right\"><button class=\"add-to-cart-btn bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-2 px-4 rounded-full btn-hover transition-colors duration-300 text-sm\" data-id=\"$id\" data-name=\"$name\" data-price=\"$price\">Add to Cart - $price tk</button></div>";
                            echo "</div></div>";
                        }
                        ?>
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
                        <?php
                        $query = "SELECT * FROM menu_items WHERE category_id = 'tarts' AND is_available = 1";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo "<div class=\"menu-item bg-white p-6 rounded-2xl shadow-md\" data-name=\"$name\" data-price=\"$price\">";
                            if ($is_new) {
                                echo "<div class=\"absolute -top-2 -left-2\"><div class=\"bg-banana text-warm-brown px-3 py-1 rounded-full text-sm font-bold transform -rotate-12\">New!</div></div>";
                            }
                            echo "<div class=\"flex justify-between items-center\">";
                            echo "<div><h3 class=\"text-xl font-bold text-gray-800 font-outfit mr-2\">$name</h3><p class=\"text-gray-600 font-outfit text-sm\">$size_info</p></div>";
                            echo "<div class=\"text-right\"><button class=\"add-to-cart-btn bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-2 px-4 rounded-full btn-hover transition-colors duration-300 text-sm\" data-id=\"$id\" data-name=\"$name\" data-price=\"$price\">Add to Cart - $price tk</button></div>";
                            echo "</div></div>";
                        }
                        ?>
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