<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function updatePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated.');
        }

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        // Check if the new password is different from the current password
        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->back()->with('error', 'The new password must be different from the current password.');
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
