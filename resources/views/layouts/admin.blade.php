<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name', 'lunaThree') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
            <div class="p-6 text-2xl font-bold border-b border-gray-700">
                Admin Panel
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : '' }}">Dashboard</a>
                <a href="{{ route('admin.kategori.index') }}" class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.kategori.*') ? 'bg-gray-900' : '' }}">Kelola Kategori</a> <!-- BARIS BARU -->
                <a href="{{ route('admin.wisata.index') }}" class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.wisata.*') ? 'bg-gray-900' : '' }}">Kelola Wisata</a>
                <a href="{{ route('admin.event.index') }}" class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.event.*') ? 'bg-gray-900' : '' }}">Kelola Event</a>
                <a href="{{ route('home') }}" class="block px-6 py-3 hover:bg-gray-700 border-t border-gray-700 mt-4">Lihat Website</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left block px-6 py-3 hover:bg-gray-700">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>