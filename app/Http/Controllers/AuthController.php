<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    // Signup sirf Patients ke liye
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        // RESTRICTION: Email mein "admin" word check karna
        if (str_contains(strtolower($request->email), 'admin')) {
            return back()->with('error', 'Registration with "admin" in email is NOT allowed!');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient', // Default role hamesha patient
        ]);

        return redirect('/login')->with('success', 'Account created! Please login.');
    }

    public function showLogin() {
        return view('auth.login');
    }

    // Login logic with Admin & Patient redirection
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        // 1. Check if it's the specific Admin
        if ($request->email == 'admin@gmail.com' && $request->password == 'admin123') {
            // Hum farz kar rahe hain ke Admin database mein manually add kiya gaya hai
            if (Auth::attempt($credentials)) {
                return redirect('/admin/dashboard');
            }
        }

        // 2. Normal User (Patient) Login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Extra security check for role
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            }
            
            return redirect('/patient/dashboard');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}