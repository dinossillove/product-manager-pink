@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <!-- Welcome Hero Banner -->
    <div class="relative overflow-hidden bg-gradient-to-r from-rose-500 via-pink-500 to-rose-400 text-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-rose-200/50 mb-8">
        <!-- Background decorative circles -->
        <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute right-20 -top-10 w-32 h-32 bg-pink-300/20 rounded-full blur-xl pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-xs font-semibold mb-3">
                <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                Sistem Aktif &bull; Laravel 12
            </span>

            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-2">
                Selamat Datang, {{ auth()->user()->name }}! 🌸
            </h1>

            <p class="text-rose-100 text-sm sm:text-base leading-relaxed mb-6">
                Kelola katalog stok produk, pantau data supplier, kategori, dan pelanggan toko Anda secara terpusat dalam satu aplikasi.
            </p>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('products.index') }}"
                   class="bg-white text-rose-600 hover:bg-rose-50 font-bold px-5 py-2.5 rounded-xl shadow-md transition transform active:scale-95 text-sm inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Kelola Produk
                </a>

                <a href="{{ route('products.create') }}"
                   class="bg-white/20 hover:bg-white/30 backdrop-blur-md text-white font-semibold px-5 py-2.5 rounded-xl transition text-sm inline-flex items-center gap-2">
                    + Tambah Produk Baru
                </a>
            </div>
        </div>
    </div>

    <!-- 4 Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        <!-- Card 1: Produk -->
        <div class="bg-white p-6 rounded-2xl border border-rose-100/80 shadow-sm hover:shadow-md hover:border-rose-300 transition group">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Produk</span>
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-extrabold text-slate-800 mb-1">
                {{ $totalProducts ?? 0 }}
            </div>
            <a href="{{ route('products.index') }}" class="text-xs font-semibold text-rose-600 hover:text-rose-700 inline-flex items-center gap-1">
                Buka inventaris &rarr;
            </a>
        </div>

        <!-- Card 2: Kategori -->
        <div class="bg-white p-6 rounded-2xl border border-pink-100/80 shadow-sm hover:shadow-md hover:border-pink-300 transition group">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Kategori</span>
                <div class="w-10 h-10 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-extrabold text-slate-800 mb-1">
                {{ $totalCategories ?? 0 }}
            </div>
            <a href="{{ route('categories.index') }}" class="text-xs font-semibold text-pink-600 hover:text-pink-700 inline-flex items-center gap-1">
                Kelola kategori &rarr;
            </a>
        </div>

        <!-- Card 3: Supplier -->
        <div class="bg-white p-6 rounded-2xl border border-amber-100/80 shadow-sm hover:shadow-md hover:border-amber-300 transition group">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Supplier</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-extrabold text-slate-800 mb-1">
                {{ $totalSuppliers ?? 0 }}
            </div>
            <a href="{{ route('suppliers.index') }}" class="text-xs font-semibold text-amber-600 hover:text-amber-700 inline-flex items-center gap-1">
                Daftar vendor &rarr;
            </a>
        </div>

        <!-- Card 4: Customer -->
        <div class="bg-white p-6 rounded-2xl border border-indigo-100/80 shadow-sm hover:shadow-md hover:border-indigo-300 transition group">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Customer</span>
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-extrabold text-slate-800 mb-1">
                {{ $totalCustomers ?? 0 }}
            </div>
            <a href="{{ route('customers.index') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 inline-flex items-center gap-1">
                Data pelanggan &rarr;
            </a>
        </div>

    </div>

    <!-- Quick Shortcuts Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-rose-100/80 shadow-sm">
        <h2 class="text-lg font-bold text-slate-800 mb-2">Aksi Cepat ⚡</h2>
        <p class="text-xs text-slate-500 mb-5">Pintasan praktis untuk mempercepat operasional pencatatan data:</p>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <a href="{{ route('products.create') }}"
               class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-rose-50 hover:border-rose-200 transition text-center group">
                <span class="text-xl block mb-1 group-hover:scale-110 transition">📦</span>
                <span class="text-xs font-bold text-slate-700 group-hover:text-rose-600">+ Produk Baru</span>
            </a>

            <a href="{{ route('categories.create') }}"
               class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-pink-50 hover:border-pink-200 transition text-center group">
                <span class="text-xl block mb-1 group-hover:scale-110 transition">🏷️</span>
                <span class="text-xs font-bold text-slate-700 group-hover:text-pink-600">+ Kategori Baru</span>
            </a>

            <a href="{{ route('suppliers.create') }}"
               class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-amber-50 hover:border-amber-200 transition text-center group">
                <span class="text-xl block mb-1 group-hover:scale-110 transition">🚚</span>
                <span class="text-xs font-bold text-slate-700 group-hover:text-amber-600">+ Supplier Baru</span>
            </a>

            <a href="{{ route('customers.create') }}"
               class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-indigo-50 hover:border-indigo-200 transition text-center group">
                <span class="text-xl block mb-1 group-hover:scale-110 transition">👥</span>
                <span class="text-xs font-bold text-slate-700 group-hover:text-indigo-600">+ Customer Baru</span>
            </a>
        </div>
    </div>

@endsection