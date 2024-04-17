<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Import model Event

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data event dari database
        $events = Event::all();

        // Mengirim data event ke halaman dashboard
        return view('dashboard', compact('events'));
    }
}
