<!-- resources/views/anggota/create.blade.php -->

@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <div class="container">
        <h1>Tambah Anggota</h1>
        <!-- Formulir untuk menambahkan anggota -->
        <form action="{{ route('anggota.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="membership_number">Nomor Anggota</label>
                <input type="text" name="membership_number" id="membership_number" class="form-control" value="{{ $generated_membership_number }}" readonly>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="place_of_birth">Tempat Lahir</label>
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control">
            </div>

            <div class="form-group">
                <label for="date_of_birth">Tanggal Lahir</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input name="address" id="address" class="form-control"></input>
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telepon</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control">
            </div>

            <div class="form-group">
                <label for="institution">Instansi</label>
                <input type="text" name="institution" id="institution" class="form-control">
            </div>

            <div class="form-group">
                <label for="work_unit">Unit Kerja</label>
                <input type="text" name="work_unit" id="work_unit" class="form-control">
            </div>

            <!-- Input untuk role -->
            <input type="hidden" name="role" value="anggota">

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
