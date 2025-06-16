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
                            <li><a href="#" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold uppercase tracking-wider">Ikuti Kami</h4>
                        <div class="flex justify-center md:justify-start mt-4 space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.345 2.525c.636-.247 1.363-.416 2.427-.465C9.795 2.013 10.148 2 12.315 2zm-1.163 1.943c-1.042.045-1.636.21-2.146.41a3.097 3.097 0 00-1.14 1.14c-.199.51-.365 1.104-.41 2.146-.045 1.021-.057 1.358-.057 3.557s.012 2.536.057 3.557c.045 1.042.21 1.636.41 2.146a3.097 3.097 0 001.14 1.14c.51.199 1.104.365 2.146.41 1.021.045 1.358.057 3.557.057s2.536-.012 3.557-.057c1.042-.045 1.636-.21 2.146-.41a3.097 3.097 0 001.14-1.14c.199-.51.365-1.104.41-2.146.045-1.021.057-1.358.057-3.557s-.012-2.536-.057-3.557c-.045-1.042-.21-1.636-.41-2.146a3.097 3.097 0 00-1.14-1.14c-.51-.199-1.104-.365-2.146-.41-1.021-.045-1.358-.057-3.557-.057s-2.536.012-3.557.057zM12 6.845a5.155 5.155 0 100 10.31 5.155 5.155 0 000-10.31zm0 1.943a3.212 3.212 0 110 6.424 3.212 3.212 0 010-6.424zM16.862 6.344a1.155 1.155 0 100 2.31 1.155 1.155 0 000-2.31z" clip-rule="evenodd" />
                                </svg>
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
</body>

</html>