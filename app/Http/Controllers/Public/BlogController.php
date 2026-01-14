<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Deteksi tipe berdasarkan URL
        $type = request()->is('berita*') ? 'berita' : 'pengumuman';

        $posts = Post::where('type', $type)
                    ->latest()
                    ->paginate(9);

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

        // Increment view count sederhana
        $post->increment('view_count');

        return view('public.blog.show', compact('post'));
    }

    private function recordView(Post $post)
    {
        // 1. Tambahkan count secara global di tabel posts
        $post->increment('view_count');

        // 2. Catat detail kunjungan untuk statistik mingguan
        PostView::create([
            'post_id' => $post->id,
            'ip_address' => request()->ip(),
            'viewed_at' => now(),
        ]);
    }
}