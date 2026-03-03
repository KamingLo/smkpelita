<?php 
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class BlogController extends Controller
{
    /**
     * Helper untuk menentukan tipe berdasarkan URL saat ini.
     */
    private function getPostTypeFromUrl()
    {
        return match (true) {
            request()->is('berita*') => 'berita',
            request()->is('pengumuman*') => 'pengumuman',
            request()->is('prestasi*') => 'prestasi',
            default => 'berita', // Default fallback
        };
    }

    public function index()
    {
        $type = $this->getPostTypeFromUrl();

        $posts = Post::where('type', $type)
                    ->latest()
                    ->paginate(6);

        return view('public.blog.index', compact('posts', 'type'));
    }

    public function show($slug)
    {
        $type = $this->getPostTypeFromUrl();
        
        $post = Post::where('slug', $slug)
                    ->where('type', $type)
                    ->firstOrFail();

        $this->recordView($post);

        return view('public.blog.show', compact('post'));
    }

    private function recordView(Post $post)
    {
        $key = 'view_post:' . $post->id . ':' . request()->ip();

        RateLimiter::attempt(
            $key, 
            1, 
            function() use ($post) {
                $post->increment('view_count');

                PostView::create([
                    'post_id' => $post->id,
                    'ip_address' => request()->ip(),
                    'viewed_at' => now(),
                ]);
            }, 
            600 
        );
    }
}