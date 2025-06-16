<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'lunaThree') }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        .section-title {
            @apply text-3xl font-bold text-gray-800 text-center relative pb-2;
        }

        .section-title::after {
            content: '';
            @apply absolute bottom-0 left-1/2 w-20 h-1 bg-cyan-500 -translate-x-1/2 rounded;
        }
    </style>
</head>

<body class="antialiased">
    <div id="app" class="flex flex-col min-h-screen">
        <!-- Header / Navigation Bar -->
        <header class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-50 transition-all duration-300">
            <nav class="container mx-auto px-6 py-3 flex justify-between items-center">

                <!-- === LOGO === -->
                <a href="{{ route('home') }}">
                    {{-- Ganti URL placeholder ini dengan path ke logo Anda, misal: {{ asset('images/logo.svg') }} --}}
                    <img src="{{ asset('images/logo.png') }}" alt="lunaThree Logo" class="h-10"> </a>
                <!-- ============================================== -->

                <div class="hidden md:flex items-center space-x-8 text-sm">

                    <!-- === LOGIKA UNTUK MENU AKTIF === -->
                    <a href="{{ route('home') }}" class="font-medium transition-colors {{ request()->routeIs('home') ? 'text-cyan-600' : 'text-gray-500 hover:text-cyan-600' }}">Home</a>
                    <a href="{{ route('wisata.index') }}" class="font-medium transition-colors {{ request()->routeIs('wisata.*') ? 'text-cyan-600' : 'text-gray-500 hover:text-cyan-600' }}">Wisata</a>
                    <a href="{{ route('event.index') }}" class="font-medium transition-colors {{ request()->routeIs('event.*') ? 'text-cyan-600' : 'text-gray-500 hover:text-cyan-600' }}">Event</a>

                    @auth
                    <a href="{{ route('profile.show') }}" class="font-medium transition-colors {{ request()->routeIs('profile.*') ? 'text-cyan-600' : 'text-gray-500 hover:text-cyan-600' }}">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-medium text-gray-500 hover:text-cyan-600 transition-colors">Logout</button>
                    </form>
                    @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-sm font-semibold bg-cyan-500 text-white rounded-md hover:bg-cyan-600 transition-colors shadow-md hover:shadow-lg">
                        Dashboard Admin
                    </a>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="font-medium transition-colors {{ request()->routeIs('login') ? 'text-cyan-600' : 'text-gray-500 hover:text-cyan-600' }}">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 px-4 py-2 text-sm font-semibold bg-cyan-500 text-white rounded-md hover:bg-cyan-600 transition-colors shadow-md hover:shadow-lg">Daftar</a>
                    @endauth
                    <!-- ========================================================= -->
                </div>
                <div class="md:hidden">
                    <button>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white">
            <div class="container mx-auto px-6 py-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                    <div>
                        <img src="https://placehold.co/140x40/1f2937/FFFFFF?text=lunaThree&font=poppins" alt="lunaThree Logo" class="h-10 mb-2 mx-auto md:mx-0">
                        <p class="text-gray-400 mt-2">Menemukan pesona tersembunyi Kalimantan Selatan.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold uppercase tracking-wider">Tautan Cepat</h4>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('wisata.index') }}" class="text-gray-400 hover:text-white">Wisata</a></li>
                            <li><a href="{{ route('event.index') }}" class="text-gray-400 hover:text-white">Event</a></li>
                            <li><a href="{{ route('tentang-kami') }}" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold uppercase tracking-wider">Ikuti Kami</h4>
                        <div class="mt-4 space-y-3">
                            <a href="https://www.instagram.com/imrhmaa" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white flex items-center space-x-2">
                                <img src="{{ asset('images/instagram_logo.png') }}" alt="Instagram Logo" class="w-6 h-6">
                                <span>@imrhmaa</span>
                            </a>
                            <a href="https://www.instagram.com/putudevia14" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white flex items-center space-x-2">
                                <img src="{{ asset('images/instagram_logo.png') }}" alt="Instagram Logo" class="w-6 h-6">
                                <span>@putudevia14</span>
                            </a>
                            <a href="https://www.instagram.com/shofiapramudiaa" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white flex items-center space-x-2">
                                <img src="{{ asset('images/instagram_logo.png') }}" alt="Instagram Logo" class="w-6 h-6">
                                <span>@shofiapramudiaa</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400 text-sm">
                    <p>&copy; {{ date('Y') }} lunaThree. Dibuat dengan cinta di Kalimantan Selatan.</p>
                </div>
            </div>
        </footer>
    </div>
    @yield('scripts')
</body>

</html>