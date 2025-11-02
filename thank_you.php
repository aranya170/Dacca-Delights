<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Dacca Delights</title>
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
            <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow text-center">
                <h1 class="text-4xl lg:text-5xl font-black text-gray-800 font-outfit leading-tight mb-4">
                    Thank You For Your Order!
                </h1>
                <p class="text-lg text-gray-600 font-outfit mb-8">We have received your order and will process it shortly.</p>
                <a href="menu.php"
                    class="bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-3 px-6 rounded-full btn-hover transition-colors duration-300">
                    Continue Shopping
                </a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>