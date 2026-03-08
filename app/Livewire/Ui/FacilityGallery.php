<?php 

namespace App\Livewire\Ui;

use Livewire\Component;
use App\Models\MediaContent; // Pastikan model ini sudah dibuat

class FacilityGallery extends Component
{
    public $activeCategory = 'Semua';

    public function render()
    {
        // Mengambil data fasilitas dari database
        $facilities = MediaContent::where('type', 'fasilitas')
            ->get()
            ->map(function ($item) {
                return [
                    'title' => $item->title,
                    'cat'   => $item->category,
                    'desc'  => $item->description,
                    'img'   => asset('storage/uploads/galeri/' . $item->image),
                ];
            });

        // Mengambil daftar kategori unik untuk tombol filter
        $categories = $facilities->pluck('cat')->unique()->values()->all();
        array_unshift($categories, 'Semua');

        return view('livewire.ui.facility-gallery', [
            'facilities' => $facilities,
            'categories' => $categories
        ]);
    }
}