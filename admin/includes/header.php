<?php
// You can add session validation or other common logic here
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dacca Delights - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/jpeg" href="../assets/logo/481163664_10229431150832277_6672533633109793344_n.jpg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    banana: '#F7DC6F',
                    'banana-dark': '#F4D03F',
                    cream: '#FAF0E6',
                    gold: '#D4AF37',
                    'warm-brown': '#8B4513',
                },
                fontFamily: {
                    outfit: ['Outfit', 'sans-serif'],
                }
            }
        }
    }
    </script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-cream">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <a href="index.php" class="flex items-center space-x-3">
                        <img src="../assets/logo/Logo_Dacca Delights-03.svg" alt="Dacca Delights Logo" class="h-12">
                        <span class="text-2xl font-bold text-warm-brown">Admin Panel</span>
                    </a>
                </div>
                <nav class="flex items-center space-x-6">
                    <a href="index.php" class="text-gray-700 hover:text-warm-brown font-medium">Dashboard</a>
                    <a href="orders.php" class="text-gray-700 hover:text-warm-brown font-medium">Orders</a>
                    <a href="menu.php" class="text-gray-700 hover:text-warm-brown font-medium">Menu</a>
                    <a href="pos.php" class="text-gray-700 hover:text-warm-brown font-medium">POS</a>
                    <a href="../index.php" target="_blank" class="text-gray-700 hover:text-warm-brown font-medium">View Website</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8">
