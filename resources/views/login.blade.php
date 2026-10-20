@extends('layouts.guest')

@section('title', 'Login')

@section('content')

    <h2 class="text-2xl font-bold text-slate-800 mb-1">Selamat Datang! 🌸</h2>

    <p class="text-slate-500 text-sm mb-6">
        Masuk menggunakan akun Anda untuk mengelola inventaris.
    </p>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-3.5 rounded-xl text-sm mb-5 flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3.5 rounded-xl text-sm mb-5 flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Email</label>

            <input type="email" name="email"
                   value="{{ old('email') }}"
                   required
                   placeholder="nama@email.com"
                   class="w-full border border-slate-200 rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">
        </div>

        <div class="mb-6">
            <label class="block mb-1.5 text-sm font-semibold text-slate-700">Password</label>

            <div class="relative">
                <input type="password" name="password"
                       id="password" required
                       placeholder="••••••••"
                       class="w-full border border-slate-200 rounded-xl p-3 pr-20 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition bg-slate-50/50 focus:bg-white">

                <button type="button"
                        id="togglePassword"
                        class="absolute right-3.5 top-3 text-rose-500 hover:text-rose-600 text-xs font-semibold cursor-pointer">
                    Lihat
                </button>
            </div>
        </div>

        <button type="submit"
                class="w-full bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold p-3.5 rounded-xl shadow-lg shadow-rose-200/60 cursor-pointer transition transform active:scale-[0.99]">
            Masuk ke Sistem
        </button>
    </form>

    <p class="text-center text-sm text-slate-500 mt-6">
        Belum punya akun?
        <a href="{{ route('register') }}"
           class="text-rose-600 hover:text-rose-700 font-semibold underline decoration-rose-200 underline-offset-4">
            Daftar sekarang
        </a>
    </p>

@endsection