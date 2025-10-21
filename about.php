<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Dacca Delights</title>
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
                    'warm-brown': '#8B4513'
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
    </style>
</head>

<body class="bg-white">
    <?php include 'navbar.php'; ?>

    <!-- About Us Section -->
    <section class="py-20 bg-cream">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h1 class="text-6xl lg:text-7xl font-black text-gray-800 font-outfit leading-tight mb-4">
                    About Dacca Delights
                </h1>
                <p class="text-lg text-gray-600 font-outfit max-w-3xl mx-auto">
                    Your friendly neighborhood bakery, serving up fresh delights every day with a smile.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow mb-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-black text-warm-brown font-outfit leading-tight mb-6">
                            Our Story
                        </h2>
                        <p class="text-gray-700 font-outfit text-lg mb-4 leading-relaxed">
                            Born in a small kitchen, Dacca Delights was built on a dream to share authentic, homemade
                            flavor with our community. We honor that tradition by using only the freshest,
                            locally-sourced ingredients.
                        </p>
                        <p class="text-gray-700 font-outfit text-lg leading-relaxed">
                            Each offering, from hearty artisanal breads to delicate signature tarts, is crafted with
                            careful attention to detail. Our passion for baking is our promise to you: an exceptional
                            experience, one delightful bite at a time.
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <img src="assets/Items/Bread.jpeg" alt="Dacca Delights Interior"
                            class="rounded-2xl shadow-lg object-cover"
                            style="aspect-ratio: 4/3; width: 100%; max-width: 400px; height: auto;">
                    </div>
                </div>
            </div>

            <!-- <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                <h2 class="text-4xl lg:text-5xl font-black text-warm-brown font-outfit leading-tight mb-6 text-center">
                    Find Us
                </h2>
                <div class="w-full rounded-2xl">
                    <iframe class="rounded-2xl"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5162.9589884591!2d90.38182009302218!3d23.791441345906193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79556047f3d%3A0x6df692c0fad7aba1!2sDacca%20Delights!5e0!3m2!1sen!2sbd!4v1757859877634!5m2!1sen!2sbd"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div> -->
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
</body>

</html>