<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Dashboard</div>

                <div class="card-body" style="display: flex">
                    <img style="max-width: 50%;" class="logo" src="{{ asset('img/logo.png') }}" alt="Logo">
                    <p>Selamat datang di halaman dashboard!</p>
                </div>
                
                <div class="card-body" style="display: flex; padding: 20px;">
                    @foreach($events as $event)
                    <div style="background:; width:50%; border-radius:5px; height:250px; padding:20px;">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p style="margin-top:-15px" class="card-text">{{ $event->description }}</p>
                        @if($event->photo)
                            <img style="max-width: 100%;" src="{{ Storage::url($event->photo) }}" alt="Event Photo" class="img-fluid">
                        @else
                            <p>No Photo Available</p>
                        @endif
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection
