<?php

namespace App\Livewire\Admin\Media;

use App\Models\MediaContent;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class MediaIndex extends Component
{
    use WithPagination;

    // Default tab yang aktif saat halaman dibuka
    public $currentType = 'galeri';
    public $search = '';

    // Reset halaman paginasi jika pencarian atau tipe berubah
    public function updatedSearch() { $this->resetPage(); }
    public function updatedCurrentType() { $this->resetPage(); }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $items = MediaContent::where('type', $this->currentType)
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('order', 'asc')
            ->latest()
            ->paginate(12);

        return view('livewire.admin.media.media-index', [
            'items' => $items
        ]);
    }

    public function deleteMedia($id)
    {
        $media = MediaContent::find($id);

        if ($media) {
            // 1. Tentukan path lengkap sesuai lokasi penyimpanan di MediaForm
            // Sesuaikan folder 'uploads/galeri/' dengan apa yang Anda gunakan saat upload
            $filePath = 'uploads/galeri/' . $media->image;

            // 2. Cek apakah file ada, lalu hapus
            if ($media->image && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            // 3. Hapus data dari database
            $media->delete();

            session()->flash('message', 'Media dan file fisik berhasil dihapus.');
        }
    }
}