<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class AboutController extends Controller
{
    public function index()
    {
        // Mengambil data admin
        $admin = User::where('role', 'admin')->first();

        // Mengambil data bendahara
        $bendahara = User::where('role', 'bendahara')->first();

        // Mengirim data admin dan bendahara ke view
        return view('about.index', compact('admin', 'bendahara'));
    }
}
