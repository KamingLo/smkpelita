<?php
namespace App\Livewire\Ui;

use Livewire\Component;

class FacilityGallery extends Component
{
    public $activeCategory = 'Semua';

    public array $facilities = [
            ['title' => 'Smart Classroom A', 'cat' => 'Akademik', 'desc' => 'Ruang kelas dengan papan tulis interaktif.', 'img' => 'https://picsum.photos/800/600?random=1'],
            ['title' => 'Laboratorium Biologi', 'cat' => 'Akademik', 'desc' => 'Fasilitas penelitian mikroskopis modern.', 'img' => 'https://picsum.photos/800/600?random=2'],
            ['title' => 'Perpustakaan Digital', 'cat' => 'Akademik', 'desc' => 'Akses ke ribuan e-book dan jurnal internasional.', 'img' => 'https://picsum.photos/800/600?random=3'],
            ['title' => 'Lapangan Basket Indoor', 'cat' => 'Olahraga', 'desc' => 'Lapangan standar FIBA dengan lantai kayu.', 'img' => 'https://picsum.photos/800/600?random=4'],
            ['title' => 'Kolam Renang Olympic', 'cat' => 'Olahraga', 'desc' => 'Kolam renang air hangat untuk latihan rutin.', 'img' => 'https://picsum.photos/800/600?random=5'],
            ['title' => 'Gymnasium', 'cat' => 'Olahraga', 'desc' => 'Pusat kebugaran khusus siswa dan staf.', 'img' => 'https://picsum.photos/800/600?random=6'],
            ['title' => 'Studio Musik', 'cat' => 'Kreativitas', 'desc' => 'Peralatan musik lengkap dan peredam suara.', 'img' => 'https://picsum.photos/800/600?random=7'],
            ['title' => 'Ruang Seni Lukis', 'cat' => 'Kreativitas', 'desc' => 'Studio luas dengan pencahayaan alami maksimal.', 'img' => 'https://picsum.photos/800/600?random=8'],
            ['title' => 'Theater Hall', 'cat' => 'Kreativitas', 'desc' => 'Kapasitas 500 orang untuk pertunjukan seni.', 'img' => 'https://picsum.photos/800/600?random=9'],
            ['title' => 'Kantin Sehat', 'cat' => 'Fasilitas', 'desc' => 'Penyedia makanan bergizi tanpa MSG.', 'img' => 'https://picsum.photos/800/600?random=10'],
            ['title' => 'Area Bermain (Playground)', 'cat' => 'Fasilitas', 'desc' => 'Wahana bermain aman untuk motorik kasar.', 'img' => 'https://picsum.photos/800/600?random=11'],
            ['title' => 'Green Garden', 'cat' => 'Fasilitas', 'desc' => 'Area terbuka hijau untuk belajar outdoor.', 'img' => 'https://picsum.photos/800/600?random=12'],
    ];

    public function render()
    {
        return view('livewire.ui.facility-gallery');
    }
}