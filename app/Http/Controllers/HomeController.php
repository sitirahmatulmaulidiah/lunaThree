<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $featured_events = Event::orderBy('date')->get();
    return view('home', compact('featured_events'));
}
}
 
