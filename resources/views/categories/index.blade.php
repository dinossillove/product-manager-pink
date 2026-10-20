@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')

    {{-- Page Header --}}
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 flex items-center gap-2">
                🏷️ Daftar Kategori
            </h1>
            <p class="text-slate-500 text-sm mt-0.5">Kelola seluruh kategori produk.</p>
        </div>
        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold px-5 py-2.5 rounded-xl shadow-md shadow-rose-200 transition transform active:scale-95 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Kategori
        </a>
    </div>

    {{-- Flash Success --}}
    @if(session('success'))
        <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 p-3.5 rounded-xl text-sm mb-5">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Main Card --}}
    <div class="bg-white rounded-2xl border border-rose-100/80 shadow-sm overflow-hidden">

        {{-- Search Bar --}}
        <div class="p-5 border-b border-rose-50 bg-rose-50/30">
            <form action="{{ route('categories.index') }}" method="GET" class="flex flex-wrap gap-3">
                <div class="relative">
                    <svg class="absolute left-3 top-3 w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                    </svg>
                    <input type="search"
                           name="q"
                           value="{{ request('q') }}"
                           placeholder="Cari nama kategori..."
                           class="pl-9 pr-4 py-2.5 border border-rose-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 bg-white w-72 transition">
                </div>
                <button type="submit"
                        class="inline-flex items-center gap-1.5 bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition cursor-pointer">
                    Cari
                </button>
                @if(request('q'))
                    <a href="{{ route('categories.index') }}"
                       class="inline-flex items-center px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm transition">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-rose-500 to-pink-500 text-white text-xs uppercase tracking-wider">
                        <th class="px-5 py-3.5 font-semibold">No</th>
                        <th class="px-5 py-3.5 font-semibold">Nama Kategori</th>
                        <th class="px-5 py-3.5 font-semibold">Deskripsi</th>
                        <th class="px-5 py-3.5 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-rose-50">
                    @forelse($categories as $category)
                        <tr class="hover:bg-rose-50/40 transition">
                            <td class="px-5 py-3.5 text-slate-400 font-medium">
                                {{ $categories->firstItem() + $loop->index }}
                            </td>
                            <td class="px-5 py-3.5 font-semibold text-slate-800">
                                <span class="inline-flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-pink-400"></span>
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td class="px-5 py-3.5 text-slate-500">
                                {{ $category->description ?? '-' }}
                            </td>
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('categories.show', $category) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-pink-50 text-pink-600 hover:bg-pink-100 text-xs font-semibold transition">
                                        👁 Detail
                                    </a>
                                    <a href="{{ route('categories.edit', $category) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 text-xs font-semibold transition">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}"
                                          method="POST"
                                          class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 text-xs font-semibold transition cursor-pointer">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <span class="text-4xl">🏷️</span>
                                    <p class="text-slate-400 font-medium">Belum ada kategori yang tersedia.</p>
                                    <a href="{{ route('categories.create') }}" class="text-rose-500 text-sm font-semibold hover:text-rose-600">+ Tambah sekarang</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($categories->hasPages())
            <div class="px-5 py-4 border-t border-rose-50 bg-rose-50/20">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

@endsection
