@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container">
        <h1>Edit Anggota</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Formulir untuk mengedit anggota -->
                    <div class="form-group">
                        <label for="membership_number">Nomor Anggota:</label>
                        <input type="text" name="membership_number" id="membership_number" class="form-control" value="{{ $anggota->membership_number }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $anggota->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Alamat:</label>
                        <textarea name="address" id="address" class="form-control" required>{{ $anggota->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Aktif" {{ $anggota->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Nonaktif" {{ $anggota->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <!-- Tombol untuk menyimpan perubahan -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
