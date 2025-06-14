<!DOCTYPE html>
<html>
<head>
    <title>Web Pariwisata - Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; padding: 0;">

    <header style="background: linear-gradient(45deg, #00bfa6, #1de9b6); padding: 20px; color: white; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h1 style="margin: 0; font-size: 32px; text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
            🌴 Web Sistem Pariwisata
        </h1>
        <nav style="margin-top: 10px;">
            <a href="#" style="color: white; text-decoration: none; margin: 0 15px; font-weight: bold; transition: color 0.3s;">Home</a> 
            <a href="#" style="color: white; text-decoration: none; margin: 0 15px; font-weight: bold; transition: color 0.3s;">Wisata</a> 
            <a href="{{ route('events.index') }}" style="color: white; text-decoration: none; margin: 0 15px; font-weight: bold; transition: color 0.3s;">Event</a> 
            <a href="#" style="color: white; text-decoration: none; margin: 0 15px; font-weight: bold; transition: color 0.3s;">Profil</a>
        </nav>
    </header>

    <main style="padding: 30px;">
        @yield('content')
    </main>

    <footer style="background: #00bfa6; color: white; text-align: center; padding: 15px 0; box-shadow: 0 -2px 6px rgba(0,0,0,0.1);">
        <p style="margin: 0;">&copy; 2025 Sistem Pariwisata</p>
    </footer>

</body>
</html>
