@extends('layouts.app')

@section('title', 'Tambah Customer')

@section('content')

    <div class="max-w-2xl mx-auto">

        {{-- Page Header --}}
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('customers.index') }}"
               class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-rose-100 text-rose-500 hover:bg-rose-50 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">👥 Tambah Customer</h1>
                <p class="text-slate-500 text-sm">Tambahkan data pelanggan baru.</p>
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
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                @include('customers._form')
            </form>
        </div>
    </div>

@endsection
