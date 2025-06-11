<!DOCTYPE html>
<html>
<head>
    <title>Web Pariwisata - Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Web Sistem Pariwisata</h1>
        <nav>
            <a>Home</a> 
            <a>Wisata</a> 
            <a href="{{ route('events.index') }}">Event</a> 
            <a>Profil</a>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; 2025 Sistem Pariwisata</p>
    </footer>
</body>
</html>
