<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan Model User sudah dibuat

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register'); // view di folder resources/views/auth/register.blade.php
    }

    /**
     * Memproses data dari form registrasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Secara default, role-nya adalah 'user'
            'role' => 'user',
        ]);

        // Login user yang baru dibuat
        Auth::login($user);

        // Redirect ke halaman utama setelah berhasil registrasi
        return redirect()->route('home')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    /**
     * Menampilkan halaman form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // view di folder resources/views/auth/login.blade.php
    }

    /**
     * Memproses data dari form login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencoba untuk login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role user
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard'); // Redirect ke dashboard admin
            }

            return redirect()->intended('/'); // Redirect ke halaman utama untuk user biasa
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    /**
     * Proses logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
