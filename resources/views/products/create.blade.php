@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <div class="max-w-2xl mx-auto">

        {{-- Page Header --}}
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('products.index') }}"
               class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-rose-100 text-rose-500 hover:bg-rose-50 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">📦 Tambah Produk</h1>
                <p class="text-slate-500 text-sm">Isi detail produk baru yang akan ditambahkan.</p>
            </div>
        </div>

        {{-- Error Alert --}}
        @if($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm mb-5">
                <div class="flex items-center gap-2 font-semibold mb-1">
                    <svg class="w-4 h-4 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    Periksa kembali data Anda:
                </div>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl border border-rose-100/80 shadow-sm p-6 sm:p-8">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="grid gap-5">

                    <div>
                        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Nama Produk</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Contoh: Lipstik Matte Pink"
                               class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Harga (Rp)</label>
                            <input type="number"
                                   name="price"
                                   min="0"
                                   value="{{ old('price') }}"
                                   required
                                   placeholder="0"
                                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
                        </div>
                        <div>
                            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Stok</label>
                            <input type="number"
                                   name="stock"
                                   min="0"
                                   value="{{ old('stock') }}"
                                   required
                                   placeholder="0"
                                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Supplier <span class="text-slate-400 font-normal">(opsional)</span></label>
                            <select name="supplier_id"
                                    class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
                                <option value="">— Pilih supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @selected(old('supplier_id') == $supplier->id)>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Kategori <span class="text-slate-400 font-normal">(opsional)</span></label>
                            <select name="category_id"
                                    class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
                                <option value="">— Pilih kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Deskripsi <span class="text-slate-400 font-normal">(opsional)</span></label>
                        <textarea name="description"
                                  rows="4"
                                  placeholder="Masukkan deskripsi produk..."
                                  class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white resize-none">{{ old('description') }}</textarea>
                    </div>

                </div>

                {{-- Actions --}}
                <div class="flex gap-3 mt-6 pt-5 border-t border-rose-50">
                    <button type="submit"
                            class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold px-6 py-2.5 rounded-xl shadow-md shadow-rose-200 transition transform active:scale-95 cursor-pointer text-sm">
                        💾 Simpan Produk
                    </button>
                    <a href="{{ route('products.index') }}"
                       class="px-6 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection