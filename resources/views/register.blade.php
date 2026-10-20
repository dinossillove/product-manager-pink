@extends('layouts.guest')

@section('title', 'Register')

@section('content')

    <h2 class="text-2xl font-bold text-slate-800 mb-1">Buat Akun Baru ✨</h2>

    <p class="text-slate-500 text-sm mb-6">
        Silakan isi data untuk bergabung sebagai pengelola.
    </p>

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3.5 rounded-xl text-sm mb-5">
            <div class="flex items-center gap-2 font-semibold mb-1">
                <svg class="w-4 h-4 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
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

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Nama Lengkap</label>

            <input type="text" name="name"
                   value="{{ old('name') }}"
                   required
                   placeholder="Contoh: Aisyah Berlianti"
                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
        </div>

        <div class="mb-4">
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Email</label>

            <input type="email" name="email"
                   value="{{ old('email') }}"
                   required
                   placeholder="nama@email.com"
                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
        </div>

        <div class="mb-4">
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Password</label>

            <input type="password" name="password"
                   minlength="8" required
                   placeholder="Minimal 8 karakter"
                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
        </div>

        <div class="mb-6">
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Konfirmasi Password</label>

            <input type="password"
                   name="password_confirmation"
                   minlength="8" required
                   placeholder="Ulangi password di atas"
                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
        </div>

        <button type="submit"
                class="w-full bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold p-3.5 rounded-xl shadow-lg shadow-rose-200/60 cursor-pointer transition transform active:scale-[0.99]">
            Daftar Akun Baru
        </button>
    </form>

    <p class="text-center text-sm text-slate-500 mt-6">
        Sudah punya akun?
        <a href="{{ route('login') }}"
           class="text-rose-600 hover:text-rose-700 font-semibold underline decoration-rose-200 underline-offset-4">
            Masuk di sini
        </a>
    </p>

@endsection