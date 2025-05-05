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
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'mega' && $password === '123') {
        return redirect()->route('dashboard', ['username' => $username]);
    }
    return redirect()->route('login', ['error' => 'Username atau password salah.']);
    }
    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Guest');
        return view('dashboard', compact('username'));
    }
    public function profile(Request $request)
{
    $username = $request->query('username');
    return view('profile', [
        'username' => $username,
        'completedTasks' => 25,
        'pendingTasks' => 10,
        'priorityTasks' => 3,
    ]);
}
private static $schedule_items = [
    [
        'Activity' => 'Sylus Birthday',
        'Status' => 'Not started',
        'Waktu' => '18/04/2025',
        'Kategori' => 'Love'
    ],
    [
        'Activity' => 'Buy new plushie',
        'Status' => 'In progress',
        'Waktu' => '16/04/2025',
        'Kategori' => 'Accessories'
    ],
    [
        'Activity' => 'Daily Combat',
        'Status' => 'Completed',
        'Waktu' => '14/04/2025',
        'Kategori' => 'Routine'
    ]
];
private static $weekly_items = [
    ['Task' => 'Running'],
    ['Task' => 'Cleaning my room'],
    ['Task' => 'Read new chapter']
];

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');
        $schedule_items = self::$schedule_items;
        $weekly_items = self::$weekly_items;

        return view('pengelolaan', compact('username', 'schedule_items', 'weekly_items'));
    }
    public function addSchedule(Request $request)
    {
        $username = $request->query('username');
        $validated = $request->validate([
            'Activity' => 'required|string|max:255',
            'Status' => 'required|string|in:Not started,In progress,Completed',
            'Waktu' => 'required|date',
            'Kategori' => 'required|string|max:255',
        ]);
        self::$schedule_items[] = $validated;
        $schedule_items = self::$schedule_items;
        $weekly_items = self::$weekly_items;
        return view('pengelolaan', compact('username', 'schedule_items', 'weekly_items'));
    }
}
