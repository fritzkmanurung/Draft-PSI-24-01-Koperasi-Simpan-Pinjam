@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <h1>Edit Profil Pengguna</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Formulir untuk mengedit profil pengguna -->
                    <!-- Anda dapat menambahkan input form untuk setiap atribut pengguna yang ingin diubah -->

                    <!-- Input untuk nama -->
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <!-- Input untuk email -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <!-- Input untuk foto profil -->
                    <div class="form-group">
                        <label for="photo">Foto Profil:</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    <!-- Input untuk username -->
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
                    </div>

                    <!-- Tombol untuk menyimpan perubahan -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
