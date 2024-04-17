@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="card">
        <div class="card-header">
            Settings
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                    @if(session('error') == 'The current password is incorrect.')
                        Please make sure you entered the correct current password.
                    @elseif(session('error') == 'validation.min.string')
                        The new password must be at least 8 characters long.
                    @elseif(session('error') == 'validation.confirmed')
                        The new password confirmation does not match.
                    @elseif(session('error') == 'The new password must be different from the current password.')
                        The new password must be different from the current password.
                    @endif
                </div>
            @endif

            <form action="{{ route('update.password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" class="form-control" id="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="new_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>
@endsection
