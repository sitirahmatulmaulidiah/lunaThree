<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Menampilkan halaman profil user yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user')); // view di resources/views/profile/show.blade.php
    }

    /**
     * Menampilkan daftar event yang pernah diajukan oleh user.
     *
     * @return \Illuminate\View\View
     */
    public function myEvents()
    {
        $user = Auth::user();
        // Mengambil semua event milik user tersebut, diurutkan dari yang terbaru
        $events = $user->events()->latest()->paginate(10); 

        return view('profile.my_events', compact('events')); // view di resources/views/profile/my_events.blade.php
    }
}
