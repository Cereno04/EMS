<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() { 
        return view('auth.login'); 
    }

    public function handleRegister(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|numeric|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'id_number' => $request->id_number,
            'password' => Hash::make($request->password), // Use Hash::make
        ]);

        return redirect('/')->with('success', 'Account created! Please login.');
    }

    public function handleLogin(Request $request) {
        $credentials = $request->validate([
            'id_number' => 'required|numeric',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['id_number' => 'Invalid ID number or password.']);
    }
}