@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <h1>Profil Pengguna</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Username:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Foto:</strong> <img style="max-width: 150px;" src="{{ asset('photos/'.$user->photo) }}" alt="Foto Profil"></p>
                <p><strong>Status:</strong> {{ $user->status }}</p>
                <p><strong>Tanggal Bergabung:</strong> {{ $user->joined_at }}</p>
                
                <!-- Tombol Edit Profile -->
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
