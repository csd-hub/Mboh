<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Tailwind Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">Dealer ARR</h1>
            <ul class="hidden md:flex space-x-6">
                <li><a href="#" class="text-gray-700 hover:text-blue-500">Home</a></li>
                <li><a href="#features" class="text-gray-700 hover:text-blue-500">Features</a></li>
                <li><a href="#about" class="text-gray-700 hover:text-blue-500">About</a></li>
                <li><a href="#contact" class="text-gray-700 hover:text-blue-500">Contact</a></li>
            </ul>
            <button class="md:hidden p-2 bg-gray-900 text-white rounded">☰</button>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="text-center py-20 bg-blue-500 text-white">
        <h2 class="text-4xl font-bold">Welcome to MyWebsite</h2>
        <p class="mt-4 text-lg">Build your dream website with ease</p>
        <a href="#features" class="mt-6 inline-block bg-white text-blue-500 px-6 py-2 rounded-full font-semibold hover:bg-gray-200">Get Started</a>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-20 container mx-auto text-center">
        <h3 class="text-3xl font-bold">Our Features</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-xl font-semibold">🚀 Fast & Responsive</h4>
                <p class="mt-2">Optimized for speed and mobile-first design.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-xl font-semibold">🔒 Secure & Reliable</h4>
                <p class="mt-2">Built with security and stability in mind.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-xl font-semibold">🎨 Customizable</h4>
                <p class="mt-2">Easily adaptable to suit your needs.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center p-6 mt-10">
        <p>&copy; 2025 MyWebsite. All rights reserved.</p>
    </footer>

</body>

</html>