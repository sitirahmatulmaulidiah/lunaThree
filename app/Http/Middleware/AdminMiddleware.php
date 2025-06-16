<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika pengguna sudah login DAN memiliki peran 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Lanjutkan request ke controller tujuan
            return $next($request);
        }

        // Jika tidak, kembalikan ke halaman utama dengan pesan error
        return redirect('/')->with('error', 'Anda tidak memiliki hak akses ke halaman ini.');
    }
}
