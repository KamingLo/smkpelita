<?php

namespace App\Livewire;

use Livewire\Component;

class HeroCarousel extends Component
{
    public array $slides = [];
    public $activeSlide = 0;

    public function mount()
    {
        $this->slides = [
            [
                'id' => 1,
                'title' => 'Pengembangan Karakter Siswa',
                'desc' => 'Membentuk pribadi yang disiplin, berintegritas, dan siap menjadi pemimpin di lingkungan profesional.',
                'img' => 'image/assets/students/pelita-student-1.webp'
            ],
            [
                'id' => 2,
                'title' => 'Penguasaan Teknologi Mutakhir',
                'desc' => 'Implementasi kurikulum berbasis industri untuk memastikan kesiapan siswa menghadapi tantangan digital global.',
                'img' => 'image/assets/students/pelita-student-2.webp'
            ],
            [
                'id' => 3,
                'title' => 'Pusat Literasi dan Riset',
                'desc' => 'Menyediakan akses informasi komprehensif untuk mendukung pencapaian akademik dan perluasan wawasan intelektual siswa.',
                'img' => 'image/assets/students/pelita-student-3.webp'
            ]
        ];
    }

    public function setSlide($index)
    {
        $this->activeSlide = $index;
        $this->dispatch('scroll-to-slide', id: 'slide-' . $index);
    }

    // Fungsi untuk Autoplay (dipicu oleh wire:poll)
    public function nextSlide()
    {
        $this->activeSlide = ($this->activeSlide + 1) % count($this->slides);
    }

    public function render()
    {
        return view('livewire.hero-carousel');
    }
}