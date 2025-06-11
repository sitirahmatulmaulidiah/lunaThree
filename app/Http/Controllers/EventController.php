<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'approved')->get();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        Event::create([
            'name' => $request->name,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return redirect()->route('events.index')->with('success', 'Event berhasil diajukan, menunggu persetujuan admin.');
    }

    public function adminIndex()
    {
        $events = Event::where('status', 'pending')->get();
        return view('admin.events.index', compact('events'));
    }

    public function approve($id)
    {
        Event::where('id', $id)->update(['status' => 'approved']);
        return back()->with('success', 'Event disetujui.');
    }

    public function reject($id)
    {
        Event::where('id', $id)->update(['status' => 'rejected']);
        return back()->with('error', 'Event ditolak.');
    }
}
