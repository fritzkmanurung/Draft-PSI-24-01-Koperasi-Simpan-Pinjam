<!-- resources/views/events/index.blade.php -->

@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container">
        <h1>Events Page</h1>

        <!-- Tampilkan tombol "Tambahkan Event" hanya untuk pengguna dengan role admin -->
        @if(Auth::check() && Auth::user()->role == 'admin')
            <div class="mb-3">
                <a href="{{ route('events.create') }}" class="btn btn-primary">Tambahkan Event</a>
            </div>
        @endif

        <!-- Tambahkan konten event di sini -->
        @if($events->isEmpty())
            <div class="alert alert-info" role="alert">
                Tidak ada Event
            </div>
        @else
            @foreach($events as $event)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        @if($event->photo)
                            <img src="{{ Storage::url($event->photo) }}" alt="Event Photo" class="img-fluid">
                        @else
                            <p>No Photo Available</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection
