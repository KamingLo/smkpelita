<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter; // Tambahkan import ini

class BlogController extends Controller
{
    public function index()
    {
        // Deteksi tipe berdasarkan URL
        $type = request()->is('berita*') ? 'berita' : 'pengumuman';

        $posts = Post::where('type', $type)
                    ->latest()
                    ->paginate(6);

        // Kirim data posts dan type ke view
        return view('public.blog.index', compact('posts', 'type'));
    }

    public function show($slug)
    {
        // Cari postingan berdasarkan slug DAN tipe (untuk keamanan URL)
        $type = request()->is('berita*') ? 'berita' : 'pengumuman';
        
        $post = Post::where('slug', $slug)
                    ->where('type', $type)
                    ->firstOrFail();

        $this->recordView($post);

        return view('public.blog.show', compact('post'));
    }

    private function recordView(Post $post)
    {
        // Buat key unik: post_id + IP Address
        $key = 'view_post:' . $post->id . ':' . request()->ip();

        // RateLimiter::attempt(key, max_attempts, callback, decay_seconds)
        RateLimiter::attempt(
            $key, 
            1, // Maksimal 1 kali eksekusi
            function() use ($post) {
                // Kode di dalam ini hanya jalan jika belum mencapai limit (10 menit)
                
                // 1. Tambahkan count secara global di tabel posts
                $post->increment('view_count');

                // 2. Catat detail kunjungan untuk statistik mingguan
                PostView::create([
                    'post_id' => $post->id,
                    'ip_address' => request()->ip(),
                    'viewed_at' => now(),
                ]);
            }, 
            600 // 10 menit dalam detik (60 detik * 10)
        );
    }
}