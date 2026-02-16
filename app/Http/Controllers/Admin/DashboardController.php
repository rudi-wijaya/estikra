<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Message;

class DashboardController extends Controller
{
    /**
     * Display dashboard with statistics and recent data
     */
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalMessages' => Message::count(),
            'unreadMessages' => Message::whereNull('read_at')->count(),
            'recentUsers' => User::latest()->take(5)->get(),
            'recentMessages' => Message::latest()->take(5)->get(),
        ]);
    }
}
