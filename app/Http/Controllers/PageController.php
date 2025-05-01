<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
       // Ambil input dari form
    $username = $request->input('username');
    $password = $request->input('password');

    // Validasi username dan password
    if ($username === 'mega' && $password === '123') {
        // Jika valid, redirect ke dashboard dengan parameter username
        return redirect()->route('dashboard', ['username' => $username]);
    }

    // Jika tidak valid, redirect kembali ke halaman login dengan error message
    return redirect()->route('login')->with('error', 'Username atau password salah.');
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Guest'); // Default "Guest" jika username tidak ada
        return view('dashboard', compact('username'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');
        return view('profile', compact('username'));
    }

    public function pengelolaan()
    {
        $tasks = [
            ['title' => 'Task 1', 'status' => 'Completed'],
            ['title' => 'Task 2', 'status' => 'Pending'],
            ['title' => 'Task 3', 'status' => 'In Progress']
        ];
        return view('pengelolaan', compact('tasks'));
    }
}
