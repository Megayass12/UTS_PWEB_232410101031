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
        $username = $request->query('username');
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
        'id' => 1,
        'Activity' => 'Sylus Birthday',
        'Status' => 'Not started',
        'Waktu' => '18/04/2025',
        'Kategori' => 'Love',
        'Foto' => 'https://i.pinimg.com/736x/49/fb/dd/49fbdd1ac3cfa457fc1f59e4bf355eb8.jpg'
    ],
    [
        'id' => 2,
        'Activity' => 'Buy new plushie',
        'Status' => 'In progress',
        'Waktu' => '16/04/2025',
        'Kategori' => 'Accessories',
        'Foto' => 'https://i.pinimg.com/736x/a6/a7/f7/a6a7f77fe57db59b96775465b1a4c56e.jpg'
    ],
    [
        'id' => 3,
        'Activity' => 'Daily Combat',
        'Status' => 'Completed',
        'Waktu' => '14/04/2025',
        'Kategori' => 'Battle',
        'Foto' => 'https://i.pinimg.com/736x/c8/43/e4/c843e42a18487304e40c45fd7f21e4b1.jpg'
    ]
];
private static $weekly_items = [
    [
        'Task' => 'Running',
        'status' => 'Completed',
        'foto' => 'https://i.pinimg.com/736x/e4/11/69/e41169e32aeadec4e794ccff5f4a62dc.jpg'
    ],
    [
        'Task' => 'Cleaning my room',
        'status' => 'In Process',
        'foto' => 'https://i.pinimg.com/736x/7c/48/ed/7c48ed490e1135abdd112748954147ba.jpg'
    ],
    [
        'Task' => 'Read new chapter',
        'status' => 'In Process',
        'foto' => 'https://i.pinimg.com/736x/56/ff/ae/56ffaecbdc695f4ddd338395eab814eb.jpg'
    ]
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
            'Foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048'
        ]);
        if ($request->hasFile('Foto')) {
            $path = $request->file('Foto')->store('activities', 'public');
            $validated['Foto'] = asset('storage/' . $path);
        } else {
            $validated['Foto'] = null;
        }
        $lastItem = end(self::$schedule_items);
        $newId = $lastItem ? $lastItem['id'] + 1 : 1;
        $validated['id'] = $newId;
        $validated['Waktu'] = \Carbon\Carbon::parse($validated['Waktu'])->format('d/m/Y');

        self::$schedule_items[] = $validated;
        $schedule_items = self::$schedule_items;
        $weekly_items = self::$weekly_items;

        return view('pengelolaan', compact('username', 'schedule_items', 'weekly_items'));
    }
}
