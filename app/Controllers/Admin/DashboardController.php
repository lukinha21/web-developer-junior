<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\User;
use CodeIgniter\I18n\Time;

class Dashboard extends BaseController
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalUsers = User::count();

        // Calcula posts da semana (últimos 7 dias)
        $oneWeekAgo = Time::now()->subDays(7)->toDateTimeString();
        $postsThisWeek = Post::where('created_at >=', $oneWeekAgo)->count();

        // Mock de ganhos fictício
        $earnings = $totalPosts * 123.45;

        $recentPosts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('admin/dashboard', [
            'totalUsers' => $totalUsers,
            'totalPosts' => $totalPosts,
            'postsThisWeek' => $postsThisWeek,
            'earnings' => $earnings,
            'recentPosts' => $recentPosts
        ]);
    }
}
