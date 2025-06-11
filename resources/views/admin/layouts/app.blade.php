<!DOCTYPE html>
<html>
<head>
    <title>Admin - Web Pariwisata</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Dashboard Admin</h1>
        <nav>
            <a href="{{ route('admin.events.index') }}">Kelola Event</a> |
            <a href="{{ route('profile') }}">Profil</a>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Admin Panel - Sistem Pariwisata</p>
    </footer>
</body>
</html>
