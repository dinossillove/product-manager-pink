<div class="grid gap-5">

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Nama Customer</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $customer->name ?? '') }}"
                   required
                   maxlength="255"
                   placeholder="Nama lengkap customer"
                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
        </div>
        <div>
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Telepon</label>
            <input type="text"
                   name="phone"
                   value="{{ old('phone', $customer->phone ?? '') }}"
                   required
                   maxlength="20"
                   placeholder="0812-xxxx-xxxx"
                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
        </div>
    </div>

    <div>
        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Email <span class="text-slate-400 font-normal">(opsional)</span></label>
        <input type="email"
               name="email"
               value="{{ old('email', $customer->email ?? '') }}"
               maxlength="255"
               placeholder="email@customer.com"
               class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
    </div>

    <div>
        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Alamat <span class="text-slate-400 font-normal">(opsional)</span></label>
        <textarea name="address"
                  rows="3"
                  placeholder="Masukkan alamat customer..."
                  class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white resize-none">{{ old('address', $customer->address ?? '') }}</textarea>
    </div>

</div>

<div class="flex gap-3 mt-6 pt-5 border-t border-rose-50">
    <button type="submit"
            class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold px-6 py-2.5 rounded-xl shadow-md shadow-rose-200 transition transform active:scale-95 cursor-pointer text-sm">
        💾 {{ isset($customer->id) ? 'Update Customer' : 'Simpan Customer' }}
    </button>
    <a href="{{ route('customers.index') }}"
       class="px-6 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm transition">
        Batal
    </a>
</div>
