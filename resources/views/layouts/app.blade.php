<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Product Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col font-sans">

    <!-- Header / Navbar -->
    <header class="bg-white/95 backdrop-blur-md border-b border-rose-100/80 sticky top-0 z-50 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3.5
                    flex flex-wrap justify-between items-center gap-4">

            <!-- Logo Brand -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-rose-500 to-pink-400 text-white flex items-center justify-center shadow-md shadow-rose-200 group-hover:scale-105 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div>
                    <span class="font-extrabold text-lg bg-gradient-to-r from-rose-600 to-pink-500 bg-clip-text text-transparent">
                        Product Manager
                    </span>
                    <span class="hidden sm:block text-[10px] text-slate-400 font-medium tracking-wider uppercase -mt-0.5">
                        Inventory System
                    </span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="flex flex-wrap items-center gap-1.5 sm:gap-2 text-sm font-medium">

                <a href="{{ route('dashboard') }}"
                   class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-rose-50 text-rose-600 font-semibold' : 'text-slate-600 hover:text-rose-600 hover:bg-rose-50/50' }}">
                    Dashboard
                </a>

                <a href="{{ route('products.index') }}"
                   class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('products.*') ? 'bg-rose-50 text-rose-600 font-semibold' : 'text-slate-600 hover:text-rose-600 hover:bg-rose-50/50' }}">
                    Produk
                </a>

                @auth
                    <a href="{{ route('categories.index') }}"
                       class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('categories.*') ? 'bg-rose-50 text-rose-600 font-semibold' : 'text-slate-600 hover:text-rose-600 hover:bg-rose-50/50' }}">
                        Kategori
                    </a>

                    <a href="{{ route('suppliers.index') }}"
                       class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('suppliers.*') ? 'bg-rose-50 text-rose-600 font-semibold' : 'text-slate-600 hover:text-rose-600 hover:bg-rose-50/50' }}">
                        Supplier
                    </a>

                    <a href="{{ route('customers.index') }}"
                       class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('customers.*') ? 'bg-rose-50 text-rose-600 font-semibold' : 'text-slate-600 hover:text-rose-600 hover:bg-rose-50/50' }}">
                        Customer
                    </a>

                    <!-- User Pill & Logout -->
                    <div class="flex items-center pl-2 ml-1 border-l border-slate-200 gap-2">
                        <span class="hidden md:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-xs font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            {{ auth()->user()->name }}
                        </span>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    title="Keluar dari akun"
                                    class="text-rose-600 hover:text-rose-700 hover:bg-rose-50 px-3 py-1.5 rounded-xl text-xs font-semibold transition cursor-pointer border border-rose-200/60">
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth

            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 flex-1 w-full">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-rose-100 bg-white py-4 text-center text-xs text-slate-400">
        Product Manager &bull; Dikembangkan dengan Laravel 12 &amp; Tailwind CSS
    </footer>

</body>
</html>