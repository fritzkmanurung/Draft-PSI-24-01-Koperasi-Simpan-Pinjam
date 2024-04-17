<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Import model Event
use Illuminate\Support\Facades\Storage; // Import facade Storage

class EventController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data event dari database
        $events = Event::all();

        // Mengirim data event ke halaman index
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:200048', // Validasi foto
        ]);

        // Menyimpan foto ke dalam folder storage/app/public
        $photoPath = $request->file('photo')->store('public/photos');

        // Membuat event baru dan menyimpan ke dalam database
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Mengambil data event berdasarkan ID
        $event = Event::findOrFail($id);

        // Mendapatkan URL absolut dari foto
        $photoUrl = Storage::url($event->photo);

        // Mengirim data event dan URL foto ke halaman detail event
        return view('events.show', compact('event', 'photoUrl'));
    }
}
