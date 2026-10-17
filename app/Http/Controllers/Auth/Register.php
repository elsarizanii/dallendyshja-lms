<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name'   => 'required|string|max:255',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|string|min:8|confirmed',
        ]);

        $fullName = trim(
            $validated['first_name'] . ' ' . 
            (!empty($validated['middle_name']) ? $validated['middle_name'] . ' ' : '') . 
            $validated['last_name']
        );

        $user = User::create([
            'first_name'  => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name'   => $validated['last_name'],
            'name'        => $validated['first_name'] . ' ' . $validated['last_name'],
            'email'       => $validated['email'],
            'password'    => Hash::make($validated['password']),

            'role'        => 'Student', 
            'status'      => 'active',
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Welcome to your new account!');
    }
}