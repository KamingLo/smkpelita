<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostView;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $popularPost = Post::orderByDesc('view_count')->first();

        // Ambil data 7 hari terakhir
        $startDate = now()->subDays(6)->startOfDay();
        $lastSevenDaysViews = PostView::where('viewed_at', '>=', $startDate)->get();
        
        $weeklyViewsCount = $lastSevenDaysViews->count();

        // Olah data untuk Chart.js menggunakan Collection
        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $currentDate = now()->subDays($i);
            $labels[] = $currentDate->format('d M');

            // Filter data dari collection berdasarkan hari yang sama
            $count = $lastSevenDaysViews->filter(function ($view) use ($currentDate) {
                return $view->viewed_at->isSameDay($currentDate);
            })->count();

            $data[] = $count;
        }

        return view('admin.dashboard', compact(
            'totalPosts', 
            'weeklyViewsCount', 
            'popularPost', 
            'labels', 
            'data'
        ));
    }
}