<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-5 space-y-6 hidden md:block">
            <h2 class="text-2xl font-bold">Dashboard</h2>
            <nav>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">🏠 Home</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">📊 Analytics</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">⚙ Settings</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">🔓 Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <button class="md:hidden p-2 bg-gray-900 text-white rounded">☰</button>
            </header>

            <!-- Content Area -->
            <main class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-bold">📈 Total Sales</h3>
                        <p class="text-3xl font-semibold">$5,230</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-bold">👥 New Users</h3>
                        <p class="text-3xl font-semibold">320</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-bold">📦 Orders</h3>
                        <p class="text-3xl font-semibold">78</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>