<?php

namespace App\Livewire;

use Livewire\Component;

class HeroCarousel extends Component
{
    public array $slides = [];
    public $activeSlide = 0;

    public function mount()
    {
        // Data ini nantinya bisa Anda ambil dari Database (misal: Slide::all())
        $this->slides = [
            [
                'id' => 1,
                'title' => 'Excellence in Education',
                'desc' => 'Membentuk pemimpin masa depan melalui standar akademik global terbaik.',
                'img' => 'image/assets/kurikulum.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Holistic Development',
                'desc' => 'Fokus pada pembentukan karakter, kreativitas, dan empati sosial.',
                'img' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2070'
            ],
            [
                'id' => 3,
                'title' => 'Modern Learning Space',
                'desc' => 'Fasilitas mutakhir untuk mendukung teknologi dan seni.',
                'img' => 'image/assets/dkv.jpg'
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