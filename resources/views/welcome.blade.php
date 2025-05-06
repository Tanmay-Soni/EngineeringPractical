<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Livewire Styles (Top of <head>) -->
    @livewireStyles

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">WeatherApp</a>
        <a href="https://google.com" target="_blank" class="text-blue-500 hover:underline">Google</a>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">🌤️ Weather Dashboard</h1>

        <div> 
            {{-- Livewire Component --}}
            @livewire('weather-search-component')
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-md p-4 flex justify-between items-center text-sm text-gray-600">
        <p>&copy; {{ date('Y') }} WeatherApp</p>
        <div class="flex gap-4 text-xl">
            <a href="https://twitter.com" target="_blank" aria-label="Twitter" class="hover:text-blue-500">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="https://facebook.com" target="_blank" aria-label="Facebook" class="hover:text-blue-600">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://github.com" target="_blank" aria-label="GitHub" class="hover:text-gray-800">
                <i class="bi bi-github"></i>
            </a>
        </div>
    </footer>

    <!-- Livewire Scripts (Before closing body tag) -->
    @livewireScripts
</body>
</html>
