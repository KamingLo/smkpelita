<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class Testimonials extends Component
{
    public int $active = 0;

    public $testimonials = [
        [
            'name' => 'Jason Angelo',
            'role' => 'Alumni SMK Pelita IV',
            'quote' => 'Kurikulum di Pelita IV sangat membantu saya berkembang dalam berbagai aspek, termasuk akademik dan non-akademis.',
            'image' => 'image/assets/testimonials/Jason.webp'
        ],
        [
            'name' => 'Vanessia',
            'role' => 'Murid SMK Pelita IV',
            'quote' => 'Fasilitas yang lengkap menjadikan pelajaran menjadi lebih menyenangkan dan saya merasa aman untuk berinteraksi dengan guru-guru.',
            'image' => 'image/assets/testimonials/Vanessia.webp'
        ],
        [
            'name' => 'Maria Fransisca',
            'role' => 'Orang Tua Murid',
            'quote' => 'Berdasarkan pengalaman saya, bimbingan guru di Pelita IV sangat membantu saya mengarahkan anak saya untuk mencapai tujuan akademiknya.',
            'image' => 'image/assets/testimonials/Fransisca.webp'
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
