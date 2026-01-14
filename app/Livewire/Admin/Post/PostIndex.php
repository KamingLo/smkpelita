<?php
namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class PostIndex extends Component
{
    use WithPagination;

    public $search = '';

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.post.post-index', [
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')
                        ->latest()
                        ->paginate(10)
        ]);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post) {
            // Hapus file thumbnail jika ada
            if ($post->thumbnail) {
                \Storage::disk('public')->delete($post->thumbnail);
            }
            $post->delete();
            session()->flash('message', 'Postingan berhasil dihapus.');
        }
    }
}