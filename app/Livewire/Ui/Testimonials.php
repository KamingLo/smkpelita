<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class Testimonials extends Component
{
    public int $active = 0;

    public array $testimonials = [
        [
            'name' => 'Budi Santoso',
            'role' => 'Orang Tua Murid Kelas 4',
            'quote' => 'Kurikulum di Pelita IV sangat membantu anak saya berkembang tidak hanya secara akademik, tapi juga karakter.',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1000'
        ],
        [
            'name' => 'Siti Aminah',
            'role' => 'Orang Tua Murid TK B',
            'quote' => 'Fasilitasnya sangat lengkap dan lingkungannya sangat aman. Guru-gurunya sangat sabar dalam mendampingi tumbuh kembang anak.',
            'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1000'
        ],
        [
            'name' => 'Andi Wijaya',
            'role' => 'Alumni Angkatan 2022',
            'quote' => 'Berkat bimbingan guru di sini, saya bisa masuk ke universitas impian saya dengan kesiapan mental yang sangat matang.',
            'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1000'
        ],
    ];

    public function next()
    {
        $this->active = ($this->active + 1) % count($this->testimonials);
    }

    public function setTab($index)
    {
        $this->active = $index;
    }

    public function render()
    {
        return view('livewire.ui.testimonials');
    }
}
