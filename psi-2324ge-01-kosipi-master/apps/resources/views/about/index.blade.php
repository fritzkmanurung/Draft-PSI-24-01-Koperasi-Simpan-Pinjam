<!-- resources/views/about.blade.php -->

@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="container">
        <h1>About</h1>
        
        <!-- Informasi tentang admin -->
        @php
            $admin = \App\Models\User::where('role', 'admin')->first();
        @endphp
        <h2>Admin</h2>
        <p><strong>Name:</strong> {{ $admin->name }}</p>
        <p><strong>Email:</strong> {{ $admin->email }}</p>
        <p><strong>Role:</strong> {{ $admin->role }}</p>
        
        <!-- Informasi tentang bendahara -->
        @php
            $bendahara = \App\Models\User::where('role', 'bendahara')->first();
        @endphp
        <h2>Bendahara</h2>
        <p><strong>Name:</strong> {{ $bendahara->name }}</p>
        <p><strong>Email:</strong> {{ $bendahara->email }}</p>
        <p><strong>Role:</strong> {{ $bendahara->role }}</p>
    </div>
@endsection
