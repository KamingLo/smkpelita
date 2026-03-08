<?php

namespace App\Livewire\Ui;

use Livewire\Component;
use App\Models\MediaContent;

class StudentGallery extends Component
{
    public function render()
    {
        // Mengambil data dengan tipe galeri dan mengurutkan dari yang terbaru
        $memories = MediaContent::where('type', 'galeri')
            ->latest()
            ->get()
            ->map(function ($item) {
                return [
                    'title' => $item->title,
                    'desc'  => $item->description,
                    'img'   => asset('storage/uploads/galeri/' . $item->image),
                ];
            });

        return view('livewire.ui.student-gallery', [
            'memories' => $memories
        ]);
    }
}