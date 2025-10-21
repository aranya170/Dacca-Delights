<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dacca Delights - Premium Bakery & Cookies</title>
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
                screens: {
                    'sm': {
                        'max': '480px'
                    },
                },
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

    .gold-text {
        background: linear-gradient(45deg, #D4AF37, #FFD700, #B8860B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-shadow {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    @media (max-width: 767px) {
        .text-xl {
            font-size: 1.125rem;
            /* equivalent to text-lg */
            line-height: 1.75rem;
        }

        .text-2xl {
            font-size: 1.25rem;
            /* equivalent to text-xl */
            line-height: 1.75rem;
        }
    }

    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .category-tag {
        transition: all 0.3s ease;
    }

    .category-tag:hover {
        transform: scale(1.05);
    }
    </style>
</head>

<body class="bg-white">
    <?php include 'navbar.php'; ?>
    <div class="unified-bg py-10">

        <!-- Hero Content Card -->
        <section class="pb-20 px-6">
            <div class="max-w-7xl mx-auto">
                <!-- Main Content Card -->
                <div class="bg-white rounded-3xl p-8 lg:p-12">
                    <!-- Tagline spanning full width - left aligned -->
                    <div class="mb-12">
                        <h2
                            class="text-6xl sm:text-5xl lg:text-7xl font-black text-gray-800 font-outfit leading-tight mb-4 text-left">
                            Every Bite, A Unique Delight
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
                        <!-- Left Content - 1.5 columns equivalent -->
                        <div class="lg:col-span-1">
                            <!-- Main Heading -->
                            <div class="mb-8">
                                <h3
                                    class="text-4xl sm:text-3xl lg:text-5xl font-black text-gray-800 font-outfit leading-tight mb-4">
                                    Freshly Baked
                                    <br>
                                    Every Single Day
                                </h3>
                            </div>

                            <!-- Subheading -->
                            <div class="mb-8">

                                <p class="text-gray-600 text-lg sm:text-base mb-8 font-outfit">
                                    We're Literally Obsessed With Giving<br>
                                    More What You Love!
                                </p>
                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="https://wa.me/8801622823269?text=I%20would%20like%20to%20place%20an%20order"
                                    target="_blank">
                                    <button
                                        class="bg-banana text-warm-brown font-bold py-4 sm:py-3 px-8 sm:px-6 rounded-full btn-hover text-lg sm:text-base font-outfit">
                                        Order Now!
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- Right Image - 2 columns (wider) -->
                        <div class="lg:col-span-2">
                            <div class="relative">
                                <!-- Bakery product image - wider -->
                                <div class="rounded-3xl overflow-hidden shadow-lg">
                                    <img src="assets/Items/hero.jpeg" alt="Dacca Delights Bakery Products"
                                        class="w-full h-72 lg:h-96 object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-16 pt-16 border-gray-200">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <!-- Left Image for Featured Section -->
                        <div>
                            <!-- Badge decoration -->
                            <div class="relative">
                                <div class="absolute -top-4 -left-4 z-10">
                                    <div
                                        class="w-20 h-20 bg-banana rounded-full flex items-center justify-center shadow-lg transform -rotate-12">
                                        <i class="fas fa-award text-warm-brown text-xl"></i>
                                    </div>
                                </div>

                                <!-- Main product image -->
                                <div class="rounded-3xl overflow-hidden">
                                    <img src="assets/Items/WhatsApp Image 2025-09-11 at 4.32.55 AM (1).jpeg"
                                        alt="Featured Bakery Items" class="w-full h-72 lg:h-96 object-cover">
                                </div>

                                <!-- Cookie decoration -->
                                <div class="absolute -top-2 -right-2">

                                </div>
                            </div>
                        </div>

                        <!-- Right Content for Featured Section -->
                        <div>
                            <!-- Main Heading -->
                            <div class="mb-8">
                                <h3
                                    class="text-4xl sm:text-3xl lg:text-5xl font-black text-warm-brown font-outfit leading-tight">
                                    Give it a Try!
                                </h3>
                            </div>

                            <!-- Featured Items Section -->
                            <div class="mb-8">
                                <h4 class="text-2xl sm:text-xl font-bold text-gray-800 font-outfit mb-2">Featured Item
                                </h4>

                                <!-- Product Card -->
                                <div class="bg-gray-50 rounded-2xl p-6 sm:p-4 mb-2 product-card">
                                    <div class="flex items-center gap-4">
                                        <!-- Product Image -->
                                        <div class="flex-shrink-0">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvalTIX_iXWu-MqbHYJc3t2OG3tEpp60FN3Q&s"
                                                alt="Bagel Buns"
                                                class="w-20 sm:w-16 h-20 sm:h-16 rounded-xl object-cover">
                                        </div>

                                        <!-- Product Info -->
                                        <div class="flex-grow">
                                            <div class="flex items-start justify-between items-center mb-2">
                                                <div>
                                                    <h5 class="text-xl sm:text-lg font-bold text-gray-800 font-outfit">
                                                        Regular Ciabatta Bread
                                                    </h5>
                                                    <p class="text-gray-600 sm:text-sm font-outfit">Minimum 4 pcs</p>
                                                </div>
                                                <div class="text-right justify-between">
                                                    <span
                                                        class="text-2xl sm:text-xl font-bold text-gray-800 font-outfit justify-between">80
                                                        tk/pc.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <p class="text-gray-600 font-outfit mb-6 leading-relaxed">
                                    Perfectly airy, delicately flaky, and irresistibly fresh.
                                </p>

                                <!-- Order Button -->
                                <a href="https://wa.me/8801622823269?text=I%20would%20like%20to%20place%20an%20order"
                                    target="_blank">
                                    <button
                                        class="bg-banana text-warm-brown font-bold py-4 sm:py-3 px-8 sm:px-6 rounded-full btn-hover text-lg sm:text-base font-outfit">
                                        Order Now!
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products We Bake Section -->
                <section class="py-20 bg-cream">
                    <div class="max-w-7xl mx-auto px-6">
                        <!-- Top Section: Heading + Tags -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
                            <!-- Left: Heading -->
                            <div>
                                <h2
                                    class="text-5xl sm:text-4xl lg:text-6xl font-black text-warm-brown font-outfit leading-tight">
                                    Our Daily Bakes -
                                </h2>
                            </div>

                            <!-- Right: Category Tags -->
                            <div>
                                <div class="space-y-4">
                                    <!-- Row 1 -->
                                    <div class="flex flex-wrap gap-3">
                                        <a href="menu.php?category=tarts"
                                            class="bg-gray-300 text-gray-800 px-4 sm:px-3 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-banana hover:text-gray-800 transition-colors category-tag">
                                            Tarts <span
                                                class="ml-2 bg-gray-600 text-white px-2 py-1 sm:px-1 sm:py-0.5 rounded-full text-xs sm:text-[10px]">6</span>
                                        </a>
                                        <a href="menu.php?category=bagels"
                                            class="bg-teal-400 text-white px-4 sm:px-3 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-banana hover:text-gray-800 transition-colors category-tag">
                                            Bagels <span
                                                class="ml-2 bg-teal-600 text-white px-2 py-1 sm:px-1 sm:py-0.5 rounded-full text-xs sm:text-[10px]">10</span>
                                        </a>
                                        <a href="menu.php?category=desserts"
                                            class="bg-purple-400 text-white px-4 sm:px-3 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-banana hover:text-gray-800 transition-colors category-tag">
                                            Desserts <span
                                                class="ml-2 bg-purple-600 text-white px-2 py-1 sm:px-1 sm:py-0.5 rounded-full text-xs sm:text-[10px]">8</span>
                                        </a>
                                    </div>
                                    <!-- Row 2 -->
                                    <div class="flex flex-wrap gap-3">
                                        <a href="menu.php?category=breads"
                                            class="bg-gray-500 text-white px-4 sm:px-3 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-banana hover:text-gray-800 transition-colors category-tag">
                                            Breads <span
                                                class="ml-2 bg-gray-700 text-white px-2 py-1 sm:px-1 sm:py-0.5 rounded-full text-xs sm:text-[10px]">14</span>
                                        </a>
                                        <a href="menu.php?category=buns"
                                            class="bg-banana text-gray-800 px-4 sm:px-3 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-yellow-600 hover:text-white transition-colors category-tag">
                                            Buns & Rolls <span
                                                class="ml-2 bg-yellow-600 text-white px-2 py-1 sm:px-1 sm:py-0.5 rounded-full text-xs sm:text-[10px]">6</span>
                                        </a>
                                        <a href="menu.php?category=gluten-free"
                                            class="bg-orange-400 text-white px-4 sm:px-3 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-banana hover:text-gray-800 transition-colors category-tag">
                                            Gluten Free <span
                                                class="ml-2 bg-orange-600 text-white px-2 py-1 sm:px-1 sm:py-0.5 rounded-full text-xs sm:text-[10px]">2</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Section: Product Images -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Product 1: Bagel With Seeds -->
                            <div class="text-center product-card" style="pointer-events: none;">
                                <div class="rounded-2xl overflow-hidden shadow-lg mb-4">
                                    <img src="assets/Items/Bagels.jpeg" alt="Bagel With Seeds"
                                        class="w-full h-48 object-cover">
                                </div>
                                <h3 class="text-xl sm:text-lg font-bold text-gray-800 font-outfit">Chewy Bagels</h3>
                            </div>

                            <!-- Product 2: Sliced Piece Bread -->
                            <div class="text-center product-card" style="pointer-events: none;">
                                <div class="rounded-2xl overflow-hidden shadow-lg mb-4">
                                    <img src="assets/Items/Bread.jpeg" alt="Sliced Piece Bread"
                                        class="w-full h-48 object-cover">
                                </div>
                                <h3 class="text-xl sm:text-lg font-bold text-gray-800 font-outfit">Fresh Breads
                                </h3>
                            </div>

                            <!-- Product 3: Cookies Glucose -->
                            <div class="text-center product-card" style="pointer-events: none;">
                                <div class="rounded-2xl overflow-hidden shadow-lg mb-4">
                                    <img src="assets/Items/Arabian Bread.jpeg" alt="Cookies Glucose"
                                        class="w-full h-48 object-cover">
                                </div>
                                <h3 class="text-xl sm:text-lg font-bold text-gray-800 font-outfit">Delightful Deserts
                                </h3>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Why is Baking Considered as Art Form Section -->
                <section class="py-20 bg-cream">
                    <div class="max-w-7xl mx-auto px-6">
                        <!-- Dark Card with exact color #391f24 -->
                        <div class="rounded-3xl p-8 lg:p-12 relative overflow-hidden"
                            style="background-color: #391f24;">

                            <!-- Decorative Background Element -->
                            <div class="absolute bottom-0 right-0 opacity-20">
                                <svg class="w-64 h-64 text-orange-300" fill="currentColor" viewBox="0 0 384 384">
                                    <path
                                        d="M368 112c0-61.856-50.144-112-112-112H128C66.144 0 16 50.144 16 112c0 15.36 3.072 30.208 8.64 43.648C9.728 162.56 0 177.152 0 194.56v108.8c0 44.8 36.352 81.152 81.152 81.152h221.696c44.8 0 81.152-36.352 81.152-81.152v-108.8c0-17.408-9.728-31.936-24.64-38.912C364.928 142.208 368 127.36 368 112zM48 112c0-44.096 35.904-80 80-80h128c44.096 0 80 35.904 80 80s-35.904 80-80 80H128c-44.096 0-80-35.904-80-80zm304 191.36c0 27.04-21.984 49.152-49.152 49.152H81.152C54.112 352.512 32 330.4 32 303.36v-108.8c0-10.24 8.32-18.56 18.56-18.56h15.168c14.976 17.024 36.096 28.48 60.032 31.104v76.256c0 8.832 7.168 16 16 16s16-7.168 16-16v-76.256c20.736-1.792 39.616-9.856 55.072-22.4c15.456 12.544 34.336 20.608 55.072 22.4v76.256c0 8.832 7.168 16 16 16s16-7.168 16-16v-76.256c23.936-2.624 45.056-14.08 60.032-31.104H335.44c10.24 0 18.56 8.32 18.56 18.56v108.8z" />
                                    <circle cx="150" cy="140" r="8" />
                                    <circle cx="234" cy="140" r="8" />
                                    <path
                                        d="M126 164c-3.2 0-6.4 1.28-8.8 3.68-4.8 4.8-4.8 12.8 0 17.6l24 24c2.4 2.4 5.6 3.68 8.8 3.68s6.4-1.28 8.8-3.68c4.8-4.8 4.8-12.8 0-17.6l-24-24c-2.4-2.4-5.6-3.68-8.8-3.68z" />
                                    <path
                                        d="M174 164c-3.2 0-6.4 1.28-8.8 3.68c-4.8 4.8-4.8 12.8 0 17.6l48 48c2.4 2.4 5.6 3.68 8.8 3.68s6.4-1.28 8.8-3.68c4.8-4.8 4.8-12.8 0-17.6l-48-48c-2.4-2.4-5.6-3.68-8.8-3.68z" />
                                    <path
                                        d="M198 212c-3.2 0-6.4 1.28-8.8 3.68c-4.8 4.8-4.8 12.8 0 17.6l24 24c2.4 2.4 5.6 3.68 8.8 3.68s6.4-1.28 8.8-3.68c4.8-4.8 4.8-12.8 0-17.6l-24-24c-2.4-2.4-5.6-3.68-8.8-3.68z" />
                                    <circle cx="150" cy="256" r="8" />
                                </svg>


                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
                                <!-- Left Image -->
                                <div class="relative w-full max-w-4xl mx-auto">
                                    <div class="rounded-2xl overflow-hidden shadow-xl relative">
                                        <!-- Carousel container -->
                                        <div id="carousel" class="w-full h-80 lg:h-96 overflow-hidden">
                                            <!-- Images -->
                                            <img src="assets/Items/MadeWithLoaf.jpg"
                                                alt="Baking Process - Hands preparing dough"
                                                class="w-full h-full object-cover absolute top-0 left-0 transition-opacity duration-500">
                                            <img src="assets/madeWithLoaf/07abdec1-8f2a-4ad9-9758-2c4f280f415a.jpg"
                                                alt="Baking Process - Bread in oven"
                                                class="w-full h-full object-cover absolute top-0 left-0 transition-opacity duration-500 opacity-0">
                                            <img src="assets/madeWithLoaf/455b6cc8-1c96-48ed-a0b3-398a22dba791.jpg"
                                                alt="Baking Process - Fresh baked loaf"
                                                class="w-full h-full object-cover absolute top-0 left-0 transition-opacity duration-500 opacity-0">
                                            <img src="assets/madeWithLoaf/f8d851a3-416f-4b23-9145-dd2a01131713.jpg"
                                                alt="Baking Process - Fresh baked loaf"
                                                class="w-full h-full object-cover absolute top-0 left-0 transition-opacity duration-500 opacity-0">
                                        </div>

                                        <!-- Navigation buttons -->
                                        <button id="prevBtn"
                                            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800/50 backdrop-blur-md text-white p-3 rounded-full hover:bg-gray-800/70 transition-all duration-300"
                                            aria-label="Previous image">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button id="nextBtn"
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800/50 backdrop-blur-md text-white p-3 rounded-full hover:bg-gray-800/70 transition-all duration-300"
                                            aria-label="Next image">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <script>
                                const carousel = document.getElementById('carousel');
                                const images = carousel.getElementsByTagName('img');
                                const prevBtn = document.getElementById('prevBtn');
                                const nextBtn = document.getElementById('nextBtn');
                                let index1 = 0;
                                let playInterval;

                                function showImage(index) {
                                    for (let i = 0; i < images.length; i++) {
                                        images[i].classList.add('opacity-0');
                                        images[i].classList.remove('opacity-100');
                                    }
                                    images[index].classList.remove('opacity-0');
                                    images[index].classList.add('opacity-100');
                                    index1 = index;
                                }

                                function nextImage() {
                                    const nextIndex = (index1 + 1) % images.length;
                                    showImage(nextIndex);
                                }

                                function prevImage() {
                                    const prevIndex = (index1 - 1 + images.length) % images.length;
                                    showImage(prevIndex);
                                }

                                // Auto-play functionality
                                function startAutoPlay() {
                                    stopAutoPlay(); // Clear any existing interval to prevent duplicates
                                    playInterval = setInterval(nextImage, 4000); // Change image every 4 seconds
                                }

                                function stopAutoPlay() {
                                    clearInterval(playInterval);
                                }

                                // Event listeners for buttons
                                nextBtn.addEventListener('click', () => {
                                    stopAutoPlay();
                                    nextImage();
                                    startAutoPlay();
                                });

                                prevBtn.addEventListener('click', () => {
                                    stopAutoPlay();
                                    prevImage();
                                    startAutoPlay();
                                });

                                // Pause auto-play on hover
                                carousel.addEventListener('mouseenter', stopAutoPlay);
                                carousel.addEventListener('mouseleave', startAutoPlay);

                                // Start auto-play immediately
                                startAutoPlay();

                                // Initial display
                                showImage(index1);
                                </script>

                                <!-- Right Content -->
                                <div class="text-white">
                                    <!-- Main Heading -->
                                    <h2
                                        class="text-4xl sm:text-3xl lg:text-5xl font-black font-outfit leading-tight mb-6">
                                        #MadeWithLoaf
                                    </h2>

                                    <!-- Description -->
                                    <p class="text-gray-300 text-lg sm:text-base font-outfit leading-relaxed mb-8">
                                        Get our breads and bakery products made with love and the finest ingredients.
                                        Customize it all you want! Capture it, share it with us, and get featured on our
                                        page.
                                    </p>

                                    <!-- Learn Baking Button -->
                                    <a href="https://wa.me/8801622823269?text=I%20would%20like%20to%20share%20my%20#MadeWithLoaf"
                                        target="_blank">
                                        <button
                                            class="bg-banana text-warm-brown font-bold py-4 sm:py-3 px-8 sm:px-6 rounded-full btn-hover text-lg sm:text-base font-outfit">
                                            Share Your Creation!
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Customer Review Card -->
                <section class="py-20 bg-cream">
                    <div class="max-w-7xl mx-auto px-6">
                        <!-- Light Blue/Teal Card -->
                        <div class="rounded-3xl p-8 lg:p-12 relative overflow-hidden"
                            style="background-color: #B3D4D1;">

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                                <!-- Left Content -->
                                <div class="text-teal-800">
                                    <!-- Main Heading -->
                                    <h2
                                        class="text-4xl sm:text-2xl lg:text-5xl font-black font-outfit leading-tight mb-8">
                                        #LoafWhatTheySay
                                    </h2>

                                    <!-- Customer Review Carousel -->
                                    <div class="relative w-full max-w-2xl mx-auto">
                                        <div id="reviewCarousel" class="overflow-hidden">
                                            <!-- Review Slides -->
                                            <div class="flex transition-transform duration-500 ease-in-out"
                                                id="reviewSlides">
                                                <!-- Review 1 -->
                                                <div class="flex items-start gap-4 mb-6 min-w-full">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-16 h-16 rounded-full overflow-hidden">
                                                            <img src="https://img.freepik.com/premium-vector/portrait-brunette-woman-avatar-female-person-vector-icon-adult-flat-style_605517-159.jpg?semt=ais_incoming&w=740&q=80"
                                                                alt="Customer" class="w-full h-full object-cover">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="text-gray-700 font-outfit text-lg sm:text-base leading-relaxed mb-2">
                                                            Sarah Chowdhury
                                                        </p>
                                                        <p class="text-gray-600 font-outfit text-sm sm:text-xs">
                                                            The bagels are chewy on the outside, soft inside, and
                                                            perfect for stacking with cold cuts. Their baguette is just
                                                            as good! crispy crust, fluffy middle. I've already ordered
                                                            three times, and coming back for more!
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- Review 2 -->
                                                <div class="flex items-start gap-4 mb-6 min-w-full">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-16 h-16 rounded-full overflow-hidden">
                                                            <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/male3-512.png"
                                                                alt="Customer" class="w-full h-full object-cover">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="text-gray-700 font-outfit text-lg sm:text-base leading-relaxed mb-2">
                                                            Adnan Chowdhury
                                                        </p>
                                                        <p class="text-gray-600 font-outfit text-sm sm:text-xs">
                                                            We recently ordered 2 baguettes. I have to say the product
                                                            was excellent. We really miss rustic, western bread which is
                                                            not readily available in Bangladesh. Finally, Dacca Delights
                                                            have taken care of that.
                                                            Price is also reasonable.
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- Review 3 -->
                                                <div class="flex items-start gap-4 mb-6 min-w-full">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-16 h-16 rounded-full overflow-hidden">
                                                            <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/male3-512.png"
                                                                alt="Customer" class="w-full h-full object-cover">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="text-gray-700 font-outfit text-lg sm:text-base leading-relaxed mb-2">
                                                            Arif Ali
                                                        </p>
                                                        <p class="text-gray-600 font-outfit text-sm sm:text-xs">
                                                            I usually dont post reviews but I make exceptions when the
                                                            experience is extraordinary. Every experience I`ve had with
                                                            Dacca Delights has been just that. Best customer service in
                                                            Dhaka and the baguette, milk bread, bagels, brioche rolls
                                                            are all exquisite. I order weekly and I encourage everyone
                                                            to try it, it`ll soon become your go to place in Dhaka. So
                                                            glad I can order top tier quality bread without leaving my
                                                            house and I can even personalize my order to my preference.
                                                            I cannot say enough about this place, I`d give 6 stars if I
                                                            could.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-start gap-4 mb-6 min-w-full">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-16 h-16 rounded-full overflow-hidden">
                                                            <img src="https://img.freepik.com/premium-vector/portrait-brunette-woman-avatar-female-person-vector-icon-adult-flat-style_605517-159.jpg?semt=ais_incoming&w=740&q=80"
                                                                alt="Customer" class="w-full h-full object-cover">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="text-gray-700 font-outfit text-lg sm:text-base leading-relaxed mb-2">
                                                            Rezia Malik
                                                        </p>
                                                        <p class="text-gray-600 font-outfit text-sm sm:text-xs">
                                                            Best suger-free brown bread in the town!
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-start gap-4 mb-6 min-w-full">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-16 h-16 rounded-full overflow-hidden">
                                                            <img src="https://img.freepik.com/premium-vector/portrait-brunette-woman-avatar-female-person-vector-icon-adult-flat-style_605517-159.jpg?semt=ais_incoming&w=740&q=80"
                                                                alt="Customer" class="w-full h-full object-cover">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="text-gray-700 font-outfit text-lg sm:text-base leading-relaxed mb-2">
                                                            Sumaiya
                                                        </p>
                                                        <p class="text-gray-600 font-outfit text-sm sm:text-xs">
                                                            I`m picky with my desserts… extremely picky… but I love
                                                            tarts and usually the downfall of a custard tart is that
                                                            it`s too sweet.

                                                            But somehow u managed to hit just the perfect level of
                                                            sweetness… idk what magic R&D ur head baker did because oh
                                                            my goodness… it`s not overwhelming and still light enough to
                                                            enjoy the full bite… the crust is yum, but the custard
                                                            definitely stands out… really satisfies the sweetness
                                                            craving…

                                                            if u guys can use this recipe to make a lemon or fruit tart
                                                            in the future 🫡🫡 you know I`m here
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Dots Navigation -->
                                        <div id="dotsNav" class="flex justify-center gap-2 mt-6">
                                            <button
                                                class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-300"
                                                data-slide="0" aria-label="Go to slide 1"></button>
                                            <button
                                                class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-300"
                                                data-slide="1" aria-label="Go to slide 2"></button>
                                            <button
                                                class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-300"
                                                data-slide="2" aria-label="Go to slide 3"></button>
                                            <button
                                                class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-300"
                                                data-slide="1" aria-label="Go to slide 2"></button>
                                            <button
                                                class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-300"
                                                data-slide="2" aria-label="Go to slide 3"></button>
                                        </div>

                                        <!-- Navigation buttons (under the carousel) -->
                                        <div class="flex justify-between mt-6">
                                            <button id="prevReviewBtn"
                                                class="text-gray-600 hover:text-teal-800 transition-colors duration-300"
                                                aria-label="Previous review">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button id="nextReviewBtn"
                                                class="text-gray-600 hover:text-teal-800 transition-colors duration-300"
                                                aria-label="Next review">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                const reviewCarousel = document.getElementById('reviewCarousel');
                                const reviewSlides = document.getElementById('reviewSlides');
                                const slides = reviewSlides.getElementsByClassName('min-w-full');
                                const prevReviewBtn = document.getElementById('prevReviewBtn');
                                const nextReviewBtn = document.getElementById('nextReviewBtn');
                                const dots = document.querySelectorAll('.dot');
                                let currentIndex = 0;
                                let autoPlayInterval;

                                function showSlide(index) {
                                    reviewSlides.style.transform = `translateX(-${index * 100}%)`;
                                    currentIndex = index;

                                    // Update dots
                                    dots.forEach((dot, i) => {
                                        if (i === index) {
                                            dot.classList.add('w-6', 'bg-teal-600');
                                            dot.classList.remove('w-3', 'bg-gray-300');
                                        } else {
                                            dot.classList.add('w-3', 'bg-gray-300');
                                            dot.classList.remove('w-6', 'bg-teal-600');
                                        }
                                    });
                                }

                                function nextSlide() {
                                    const nextIndex = (currentIndex + 1) % slides.length;
                                    showSlide(nextIndex);
                                }

                                function prevSlide() {
                                    const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
                                    showSlide(prevIndex);
                                }

                                // Auto-play functionality
                                function startAutoPlay() {
                                    stopAutoPlay(); // Clear any existing interval
                                    autoPlayInterval = setInterval(nextSlide, 6000); // Change review every 6 seconds
                                }

                                function stopAutoPlay() {
                                    clearInterval(autoPlayInterval);
                                }

                                // Event listeners for arrow buttons
                                nextReviewBtn.addEventListener('click', () => {
                                    stopAutoPlay();
                                    nextSlide();
                                    startAutoPlay();
                                });

                                prevReviewBtn.addEventListener('click', () => {
                                    stopAutoPlay();
                                    prevSlide();
                                    startAutoPlay();
                                });

                                // Event listeners for dots
                                dots.forEach((dot, index) => {
                                    dot.addEventListener('click', () => {
                                        stopAutoPlay();
                                        showSlide(index);
                                        startAutoPlay();
                                    });
                                });

                                // Pause auto-play on hover
                                reviewCarousel.addEventListener('mouseenter', stopAutoPlay);
                                reviewCarousel.addEventListener('mouseleave', startAutoPlay);

                                // Start auto-play immediately
                                startAutoPlay();

                                // Initial display
                                showSlide(currentIndex);
                                </script>

                                <!-- Right Content -->
                                <div class="text-center lg:text-left">
                                    <!-- Rating Section -->
                                    <div class="mb-8">
                                        <!-- Large Rating Number -->
                                        <div
                                            class="text-6xl sm:text-5xl lg:text-7xl font-black text-teal-800 font-outfit mb-2">
                                            5.00
                                        </div>

                                        <!-- Star Rating -->
                                        <div class="flex items-center justify-center lg:justify-start gap-1 mb-2">
                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                        </div>

                                        <!-- Review Count -->
                                        <p class="text-gray-700 font-outfit text-sm sm:text-xs">
                                            From Google Maps reviews
                                        </p>
                                    </div>

                                    <!-- Product Tags -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                        <!-- Row 1 -->
                                        <button
                                            class="w-full bg-teal-600 bg-opacity-30 text-teal-800 px-4 sm:px-2 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-opacity-40 transition-all">
                                            Bagel
                                        </button>
                                        <button
                                            class="w-full bg-teal-600 bg-opacity-30 text-teal-800 px-4 sm:px-2 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-opacity-40 transition-all">
                                            Baguette
                                        </button>
                                        <button
                                            class="w-full bg-teal-600 bg-opacity-30 text-teal-800 px-4 sm:px-2 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-opacity-40 transition-all">
                                            Brioche rolls
                                        </button>
                                        <button
                                            class="w-full bg-teal-600 bg-opacity-30 text-teal-800 px-4 sm:px-2 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-opacity-40 transition-all">
                                            Milk bread
                                        </button>
                                        <button
                                            class="w-full bg-teal-600 bg-opacity-30 text-teal-800 px-4 sm:px-2 py-2 sm:py-1 rounded-full font-outfit font-medium text-sm sm:text-xs hover:bg-opacity-40 transition-all">
                                            Custard tart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>







            </div>

        </section>
    </div>


    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>