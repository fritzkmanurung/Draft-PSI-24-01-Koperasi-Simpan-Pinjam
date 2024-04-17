<!-- resources/views/events/create.blade.php -->

@extends('layouts.app')

@section('title', 'Tambahkan Event')

@section('content')
    <div class="container">
        <h1>Tambahkan Event</h1>

        <!-- Formulir untuk menambahkan event -->
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul Event</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>
            <!-- Tambahkan kolom lain sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
