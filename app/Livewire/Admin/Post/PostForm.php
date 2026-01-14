<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class PostForm extends Component
{
    use WithFileUploads;

    // Properti Model
    public $postId;
    public $title;
    public $slug; // WAJIB ada agar muncul di view
    public $type = 'berita';
    public $content;
    public $thumbnail;
    public $existingThumbnail;
    
    // Properti SEO
    public $meta_description;
    public $meta_keywords;
    
    public $isEdit = false;

    #[Layout('components.layouts.admin')]
    public function mount($id = null)
    {
        if ($id) {
            $this->isEdit = true;
            $post = Post::findOrFail($id);
            
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->slug = $post->slug; // Data lama dimasukkan ke properti
            $this->type = $post->type;
            $this->content = $post->content;
            $this->existingThumbnail = $post->thumbnail;
            $this->meta_description = $post->meta_description;
            $this->meta_keywords = $post->meta_keywords;
        }
    }

    // Fungsi otomatis update slug saat judul diketik (hanya jika user belum mengisi slug manual)
    public function updatedTitle($value)
    {
        if (!$this->isEdit) {
            $this->slug = Str::slug($value);
        }
    }

    public function save()
    {
        $rules = [
            'title' => 'required|min:5',
            'slug'  => 'required|unique:posts,slug,' . ($this->postId ?? 'NULL'),
            'type'  => 'required|in:berita,pengumuman',
            'content' => 'required',
            'thumbnail' => $this->isEdit ? 'nullable|mimetypes:image/webp|max:2048' : 'required|mimetypes:image/webp|max:2048',
        ];

        $this->validate($rules);

        $data = [
            'title'   => $this->title,
            'slug'    => Str::slug($this->slug), // Memastikan format slug tetap benar
            'type'    => $this->type,
            'content' => $this->content,
            'meta_description' => $this->meta_description,
            'meta_keywords'    => $this->meta_keywords,
        ];

        if ($this->thumbnail) {
            // Hapus foto lama jika ada
            if ($this->isEdit && $this->existingThumbnail) {
                Storage::disk('public')->delete($this->existingThumbnail);
            }
            $data['thumbnail'] = $this->thumbnail->store('thumbnails', 'public');
        }

        if ($this->isEdit) {
            Post::find($this->postId)->update($data);
            session()->flash('message', 'Postingan berhasil diperbarui!');
        } else {
            Post::create($data);
            session()->flash('message', 'Postingan berhasil dibuat!');
        }

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.admin.post.post-form');
    }
}