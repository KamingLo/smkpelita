<?php

namespace App\Livewire\Admin\Media;

use App\Models\MediaContent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaForm extends Component
{
    use WithFileUploads;

    public $mediaId;
    public $type = 'galeri';
    public $category = 'Fasilitas';
    public $title;
    public $description;
    public $image;
    public $existingImage;
    public $isEdit = false;

    #[Layout('components.layouts.admin')]
    public function mount($id = null)
    {
        if ($id) {
            $this->isEdit = true;
            $media = MediaContent::findOrFail($id);
            
            $this->mediaId = $media->id;
            $this->type = $media->type;
            $this->category = $media->category;
            $this->title = $media->title;
            $this->description = $media->description;
            $this->existingImage = $media->image;
        }
    }

    public function save()
    {
        $rules = [
            'title' => 'required|min:3',
            'type' => 'required|in:fasilitas,galeri',
            'category' => $this->type === 'fasilitas' ? 'required' : 'nullable',
            'image' => $this->isEdit ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ];

        $this->validate($rules);

        $data = [
            'type' => $this->type,
            'category' => $this->type === 'fasilitas' ? $this->category : null,
            'title' => $this->title,
            'description' => $this->description,
        ];

        if ($this->image) {
            // 1. Hapus file lama jika ada
            if ($this->isEdit && $this->existingImage) {
                // Gunakan path yang konsisten (tanpa slash di depan untuk Storage::disk)
                $oldPath = 'uploads/galeri/' . $this->existingImage;
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            // 2. Buat nama file baru yang unik (tambahkan timestamp agar tidak konflik)
            $extension = $this->image->getClientOriginalExtension();
            $filename = Str::slug($this->title) . '-' . time() . '.' . $extension;
            
            // 3. Simpan file (Perbaikan parameter storeAs)
            // Format: storeAs($path, $filename, $disk)
            $this->image->storeAs('uploads/galeri', $filename, 'public');
            
            // 4. Masukkan nama file ke array data
            $data['image'] = $filename;
        }

        if ($this->isEdit) {
            MediaContent::find($this->mediaId)->update($data);
            session()->flash('message', 'Media berhasil diperbarui!');
        } else {
            MediaContent::create($data);
            session()->flash('message', 'Media berhasil ditambahkan!');
        }

        return redirect()->route('admin.media.index');
    }

    public function render()
    {
        return view('livewire.admin.media.media-form');
    }
}