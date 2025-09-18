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
                    Contact Dacca Delights
                </h1>
                <p class="text-lg text-gray-600 font-outfit max-w-3xl mx-auto">
                    Get in touch with us! Whether you have questions, feedback, or want to place an order, we’re here to
                    help.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <h2 class="text-4xl lg:text-5xl font-black text-warm-brown font-outfit leading-tight mb-6">
                        Send Us a Message
                    </h2>
                    <form id="contact-form" method="POST" action="form_handler.php">
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-outfit font-medium mb-2">Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-banana"
                                    placeholder="Your Name">
                            </div>
                            <div>
                                <label for="email"
                                    class="block text-gray-700 font-outfit font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-banana"
                                    placeholder="Your Email">
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700 font-outfit font-medium mb-2">Phone
                                    (Optional)</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-banana"
                                    placeholder="Your Phone Number">
                            </div>
                            <div>
                                <label for="message"
                                    class="block text-gray-700 font-outfit font-medium mb-2">Message</label>
                                <textarea id="message" name="message" required rows="5"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-banana"
                                    placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-banana hover:bg-banana-dark text-warm-brown font-outfit font-semibold py-3 px-6 rounded-full btn-hover">
                                Send Message
                            </button>
                        </div>
                    </form>
                    <div id="form-messages" class="mt-4"></div>
                </div>

                <!-- Contact Information and Map -->
                <div class="bg-white rounded-3xl p-8 lg:p-12 card-shadow">
                    <h2 class="text-4xl lg:text-5xl font-black text-warm-brown font-outfit leading-tight mb-6">
                        Get in Touch
                    </h2>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-brown text-xl"></i>
                            <p class="text-gray-700 font-outfit text-lg">
                                North Kafrul, Dhaka Cantonment, Dhaka
                            </p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-brown text-xl"></i>
                            <p class="text-gray-700 font-outfit text-lg">
                                +8801622-823269
                            </p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-facebook text-brown text-xl"></i>
                            <p class="text-gray-700 font-outfit text-lg">
                                Dacca Delights
                            </p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-instagram text-brown text-xl"></i>
                            <p class="text-gray-700 font-outfit text-lg">
                                Dacca Delights
                            </p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-whatsapp text-brown text-xl"></i>
                            <p class="text-gray-700 font-outfit text-lg">
                                +8801622-823269
                            </p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-brown text-xl"></i>
                            <p class="text-gray-700 font-outfit text-lg">
                                info@daccadelights.com
                            </p>
                        </div>
                    </div>
                    <!-- <h3 class="text-2xl font-black text-warm-brown font-outfit mb-4">Find Us</h3> -->
                    <!-- <div class="w-full rounded-2xl">
                        <iframe class="rounded-2xl"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5162.9589884591!2d90.38182009302218!3d23.791441345906193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79556047f3d%3A0x6df692c0fad7aba1!2sDacca%20Delights!5e0!3m2!1sen!2sbd!4v1757859877634!5m2!1sen!2sbd"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script>
    $(function() {
        var form = $('#contact-form');
        var formMessages = $('#form-messages');
        $(form).submit(function(event) {
            event.preventDefault();
            var formData = $(form).serialize();
            $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: formData
                })
                .done(function(response) {
                    $(formMessages).removeClass('error');
                    $(formMessages).addClass('success');
                    $(formMessages).text(response);
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#message').val('');
                })
                .fail(function(data) {
                    $(formMessages).removeClass('success');
                    $(formMessages).addClass('error');
                    if (data.responseText !== '') {
                        $(formMessages).text(data.responseText);
                    } else {
                        $(formMessages).text(
                            'Oops! An error occurred and your message could not be sent.');
                    }
                });
        });
    });
    </script>
</body>

</html>