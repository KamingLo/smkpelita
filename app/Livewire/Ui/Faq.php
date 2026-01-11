<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class Faq extends Component
{
    public $faqs = [
        [
            'question' => 'Kapan waktu terbaik untuk mendaftarkan ananda?',
            'answer' => 'Pendaftaran kami dibuka sepanjang tahun, namun kami menyarankan orang tua untuk mendaftar di Gelombang 1 (Oktober-Desember) untuk memastikan ketersediaan kursi dan mendapatkan masa orientasi yang lebih panjang.',
            'open' => false
        ],
        [
            'question' => 'Apakah ada tes masuk untuk calon murid?',
            'answer' => 'Kami tidak menerapkan "tes" yang menegangkan. Kami menyebutnya "Hari Bermain & Observasi" di mana tim guru akan mengajak ananda berinteraksi untuk memahami kesiapan belajar dan kebutuhan khususnya.',
            'open' => false
        ],
        [
            'question' => 'Bagaimana jika ananda belum lancar membaca atau menulis?',
            'answer' => 'Jangan khawatir. Di Pelita IV, kami menghargai kecepatan belajar setiap anak yang berbeda-beda. Tugas kami adalah mendampingi mereka hingga mampu menguasai keterampilan tersebut dengan cara yang menyenangkan.',
            'open' => false
        ],
        [
            'question' => 'Apakah sekolah menyediakan layanan jemputan atau katering?',
            'answer' => 'Ya, kami bekerja sama dengan mitra terpercaya untuk menyediakan layanan jemputan yang aman dan katering sehat dengan menu yang disesuaikan untuk gizi pertumbuhan anak.',
            'open' => false
        ]
    ];

    // app/Livewire/Ui/Faq.php
    public function toggle($index)
    {
        // Opsional: Tutup FAQ lain saat satu dibuka (Mode Single Accordion)
        foreach ($this->faqs as $key => $faq) {
            if ($key !== $index) $this->faqs[$key]['open'] = false;
        }

        $this->faqs[$index]['open'] = !$this->faqs[$index]['open'];
    }
    
    public function render()
    {
        return view('livewire.ui.faq');
    }
}