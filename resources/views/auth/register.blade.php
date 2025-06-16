@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-lg">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Buat Akun Baru
            </h2>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="sr-only">Nama Lengkap</label>
                <input id="name" name="name" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" placeholder="Nama Lengkap" value="{{ old('name') }}">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
             <div>
                <label for="email" class="sr-only">Email</label>
                <input id="email" name="email" type="email" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" placeholder="Alamat Email" value="{{ old('email') }}">
                 @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
             <div>
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" placeholder="Password">
                 @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
             <div>
                <label for="password_confirmation" class="sr-only">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" placeholder="Konfirmasi Password">
            </div>
            
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                    Daftar
                </button>
            </div>
            <p class="text-center text-sm">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-cyan-600 hover:text-cyan-500">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
