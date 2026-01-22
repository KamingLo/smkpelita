<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class VocationalsMajor extends Component
{
    public int $activeTab = 0;

    public $vocationalMajors = [
        [
            'alias' => 'DKV',
            'name' => 'Desain Komunikasi Visual',
            'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z',
            'image' => 'image/assets/dkv.jpg',
            'desc' => 'Ekspresikan kreativitasmu melalui desain grafis, fotografi, dan sinematografi digital dengan standar industri kreatif global.',
            'features' => ['Studio Foto', 'Lab Komputer High-End', 'Sertifikasi Adobe'],
            'career_paths' => ['Graphic Designer', 'UI/UX Designer', 'Photographer'],
            'stats' => ['Siswa' => '320+', 'Mitra' => '25+', 'Lulus Kerja' => '92%'],
            'url' => '/jurusan/desain-komunikasi-visual'
        ],
        [
            'alias' => 'MP',
            'name' => 'Manajemen Perkantoran',
            'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
            'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=800&auto=format&fit=crop',
            'desc' => 'Kuasai tata kelola bisnis modern, layanan administrasi profesional, dan komunikasi korporat berbasis digital.',
            'features' => ['Lab Perkantoran', 'Simulasi Bisnis', 'Public Speaking'],
            'career_paths' => ['Administrative Assistant', 'HR Staff', 'Secretary'],
            'stats' => ['Siswa' => '280+', 'Mitra' => '18+', 'Lulus Kerja' => '88%'],
            'url' => '/jurusan/manajemen-perkantoran'
        ],
        [
            'alias' => 'AKL',
            'name' => 'Akuntansi Keuangan',
            'icon' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
            'image' => 'https://plus.unsplash.com/premium_photo-1678567671940-64eeefe22e5b?q=80&w=1170&auto=format&fit=crop',
            'desc' => 'Bangun ketelitian dalam mengelola keuangan lembaga dengan sistem akuntansi terkomputerisasi dan audit profesional.',
            'features' => ['Software MYOB/Zahir', 'Bank Mini', 'Audit Keuangan'],
            'career_paths' => ['Accountant', 'Tax Consultant', 'Bank Teller'],
            'stats' => ['Siswa' => '250+', 'Mitra' => '15+', 'Lulus Kerja' => '95%'],
            'url' => '/jurusan/akuntansi-keuangan'
        ]
    ];

    public function setTab($index)
    {
        $this->activeTab = $index;
    }

    public function render()
    {
        return view('livewire.ui.vocationals-major');
    }
}