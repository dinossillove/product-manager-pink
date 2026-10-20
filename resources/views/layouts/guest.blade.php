<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Product Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-rose-50 via-pink-50 to-slate-100 flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Logo & Header Brand -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-rose-500 to-pink-400 text-white shadow-lg shadow-rose-200 mb-4">
                <!-- Cute Boutique & Inventory Bag SVG Icon -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>

            <h1 class="text-3xl font-extrabold bg-gradient-to-r from-rose-600 to-pink-500 bg-clip-text text-transparent">
                Product Manager
            </h1>

            <p class="text-slate-500 text-sm mt-1">
                Sistem Manajemen Inventaris & Operasional Toko
            </p>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white/95 backdrop-blur-md p-8 rounded-3xl shadow-xl shadow-rose-100/60 border border-rose-100">
            @yield('content')
        </div>

        <p class="text-center text-xs text-slate-400 mt-6">
            &copy; {{ date('Y') }} Product Manager &bull; Crafted with Care
        </p>
    </div>

</body>
</html>