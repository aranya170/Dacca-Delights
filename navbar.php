<nav class="bg-cream py-6">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="index.php"
                    class="w-32 h-32 sm:w-20 sm:h-20 md:w-32 md:h-32 rounded-full flex items-center justify-center">
                    <img src="assets/logo/Logo_Dacca Delights-03.svg" alt="Dacca Delights Logo"
                        class="w-32 h-32 sm:w-32 sm:h-32 md:w-32 md:h-32 object-contain">
                </a>
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="md:hidden flex items-center">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none relative w-8 h-8">
                    <span class="sr-only">Toggle menu</span>
                    <div class="hamburger-icon">
                        <span
                            class="block w-6 h-0.5 bg-gray-700 absolute transform transition-transform duration-300 ease-in-out top-2"></span>
                        <span
                            class="block w-6 h-0.5 bg-gray-700 absolute transform transition-transform duration-300 ease-in-out top-4"></span>
                        <span
                            class="block w-6 h-0.5 bg-gray-700 absolute transform transition-transform duration-300 ease-in-out top-6"></span>
                    </div>
                </button>
            </div>

            <!-- Navigation Links -->
            <div id="nav-links"
                class="flex md:items-center md:space-x-8 flex-col md:flex-row absolute md:static top-20 left-0 w-full md:w-auto bg-cream md:bg-transparent p-4 md:p-0 transition-all duration-300 ease-in-out md:flex hidden">
                <a href="index.php"
                    class="text-gray-700 hover:text-warm-brown font-outfit font-medium py-2 md:py-0 opacity-0 md:opacity-100 nav-item sm:text-sm">Home</a>
                <a href="menu.php"
                    class="text-gray-700 hover:text-warm-brown font-outfit font-medium py-2 md:py-0 opacity-0 md:opacity-100 nav-item sm:text-sm">Menu</a>
                <a href="about.php"
                    class="text-gray-700 hover:text-warm-brown font-outfit font-medium py-2 md:py-0 opacity-0 md:opacity-100 nav-item sm:text-sm">About
                    Us</a>
                <a href="contact.php"
                    class="text-gray-700 hover:text-warm-brown font-outfit font-medium py-2 md:py-0 opacity-0 md:opacity-100 nav-item sm:text-sm">Contact</a>
            </div>

            <!-- Right Side (Order Now Button - Desktop Only) -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="https://wa.me/8801622823269?text=I%20would%20like%20to%20place%20an%20order" target="_blank">
                    <button
                        class="bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-3 sm:py-2 px-6 sm:px-4 rounded-full btn-hover transition-colors duration-300 sm:text-sm">
                        Order Now!
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- CSS for Hamburger Animation -->
    <style>
    .hamburger-icon span:nth-child(1) {
        top: 0.5rem;
    }

    .hamburger-icon span:nth-child(2) {
        top: 1rem;
    }

    .hamburger-icon span:nth-child(3) {
        top: 1.5rem;
    }

    .menu-open .hamburger-icon span:nth-child(1) {
        transform: translateY(0.5rem) rotate(45deg);
    }

    .menu-open .hamburger-icon span:nth-child(2) {
        opacity: 0;
    }

    .menu-open .hamburger-icon span:nth-child(3) {
        transform: translateY(-0.5rem) rotate(-45deg);
    }

    #nav-links:not(.hidden) .nav-item {
        animation: slideIn 0.3s ease-in-out forwards;
    }

    #nav-links:not(.hidden) .nav-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    #nav-links:not(.hidden) .nav-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    #nav-links:not(.hidden) .nav-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    #nav-links:not(.hidden) .nav-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>

    <!-- JavaScript for Hamburger Menu Toggle -->
    <script>
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');

    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('hidden');
        menuToggle.classList.toggle('menu-open');

        // Reset opacity for animation on mobile menu open
        if (!navLinks.classList.contains('hidden')) {
            const navItems = navLinks.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.style.opacity = '1';
            });
        }
    });

    // Ensure links are visible on desktop resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            navLinks.classList.remove('hidden');
            menuToggle.classList.remove('menu-open');
            const navItems = navLinks.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.style.opacity = '1';
            });
        } else if (!navLinks.classList.contains('hidden')) {
            navLinks.classList.add('hidden');
        }
    });
    </script>
</nav>