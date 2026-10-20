<div class="mb-5">
    <label class="block mb-1.5 text-sm font-semibold text-slate-700">Nama Kategori</label>
    <input type="text"
           name="name"
           value="{{ old('name', $category->name ?? '') }}"
           required
           maxlength="255"
           placeholder="Contoh: Skincare, Makeup, dll..."
           class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
</div>

<div class="mb-6">
    <label class="block mb-1.5 text-sm font-semibold text-slate-700">Deskripsi <span class="text-slate-400 font-normal">(opsional)</span></label>
    <textarea name="description"
              rows="4"
              placeholder="Masukkan deskripsi kategori..."
              class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white resize-none">{{ old('description', $category->description ?? '') }}</textarea>
</div>

<div class="flex gap-3 pt-5 border-t border-rose-50">
    <button type="submit"
            class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold px-6 py-2.5 rounded-xl shadow-md shadow-rose-200 transition transform active:scale-95 cursor-pointer text-sm">
        💾 {{ isset($category->id) ? 'Update Kategori' : 'Simpan Kategori' }}
    </button>
    <a href="{{ route('categories.index') }}"
       class="px-6 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm transition">
        Batal
    </a>
</div>
