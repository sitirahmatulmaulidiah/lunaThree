<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wisata;
use App\Models\Event;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalWisata = Wisata::count();
        $totalEvents = Event::count();
        $pendingEvents = Event::where('status', 'menunggu')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalWisata', 'totalEvents', 'pendingEvents'));
    }
}
