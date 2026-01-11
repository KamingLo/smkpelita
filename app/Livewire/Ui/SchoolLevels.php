<?php
namespace App\Livewire\Ui;

use Livewire\Component;

class SchoolLevels extends Component
{
    public int $activeTab = 0;

    public array $levels = [
        [ 
            'name' => 'Taman Kanak-Kanak', 
            'alias' => 'TK Pelita',
            'desc' => 'Kami memahami bahwa usia dini adalah masa emas pertumbuhan. Di TK Pelita, anak-anak diajak bereksplorasi melalui kurikulum berbasis bermain yang dirancang secara saintifik.',
            'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=1200',
            'url' => '/jenjang/tk'
        ],
        [ 
            'name' => 'Sekolah Dasar', 
            'alias' => 'SD Pelita',
            'desc' => 'Pendidikan dasar di SD Pelita berfokus pada keseimbangan antara kompetensi akademik dan pengembangan bakat alami siswa dengan pendekatan active learning.',
            'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200',
            'url' => '/jenjang/sd'
        ],
        [ 
            'name' => 'Sekolah Menengah Pertama', 
            'alias' => 'SMP Pelita',
            'desc' => 'Memasuki masa remaja adalah fase pencarian jati diri yang krusial. SMP Pelita hadir sebagai navigator bagi siswa untuk menemukan minat dan bakat mereka.',
            'image' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?q=80&w=1200',
            'url' => '/jenjang/smp'
        ],
        [ 
            'name' => 'Sekolah Menengah Atas', 
            'alias' => 'SMA Pelita',
            'desc' => 'Jenjang SMA adalah gerbang menuju masa depan global dengan kurikulum menantang untuk menembus perguruan tinggi negeri maupun internasional.',
            'image' => 'image/assets/dkv.jpg',
            'url' => '/jenjang/sma'
        ],
        [ 
            'name' => 'Sekolah Menengah Kejuruan', 
            'alias' => 'SMK Pelita',
            'desc' => 'SMK Pelita dirancang khusus untuk mencetak tenaga profesional yang siap terjun langsung ke industri melalui kerja sama perusahaan multinasional.',
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?q=80&w=1200',
            'url' => '/jenjang/smk'
        ]
    ];

    public function setTab($index)
    {
        $this->activeTab = $index;
    }

    public function render()
    {
        return view('livewire.ui.school-levels');
    }
}