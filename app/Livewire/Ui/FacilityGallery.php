<?php
namespace App\Livewire\Ui;

use Livewire\Component;

class FacilityGallery extends Component
{
    public $activeCategory = 'Semua';

    public array $facilities = [
        ['title' => 'Tempat Pendaftaran', 'cat' => 'Akademik', 'desc' => 'Ruang pendaftaran untuk calon siswa baru.', 'img' => 'image/assets/facility/admisi.webp'],
        ['title' => 'Laboratorium Komputer', 'cat' => 'Fasilitas', 'desc' => 'Laboratorium dengan komputer modern dan software terkini.', 'img' => 'image/assets/facility/laboratorium-komputer.webp'],
        ['title' => 'Perpustakaan 1', 'cat' => 'Akademik', 'desc' => 'Koleksi buku lengkap dengan akses digital.', 'img' => 'image/assets/facility/rak-buku.webp'],
        ['title' => 'Perpustakaan 2', 'cat' => 'Akademik', 'desc' => 'Ruang baca nyaman untuk studi mandiri.', 'img' => 'image/assets/facility/pendaftaran-perpustakaan.webp'],
        ['title' => 'Koperasi', 'cat' => 'Fasilitas', 'desc' => 'Koperasi sekolah menyediakan kebutuhan siswa.', 'img' => 'image/assets/facility/koperasi.webp'],
        ['title' => 'Lapangan Olahraga', 'cat' => 'Olahraga', 'desc' => 'Lapangan multi-fungsi untuk berbagai cabang olahraga.', 'img' => 'image/assets/facility/lapangan-olahraga.webp'],
        ['title' => 'Lapangan Voli', 'cat' => 'Olahraga', 'desc' => 'Lapangan voli standar dengan net dan peralatan lengkap.', 'img' => 'image/assets/facility/lapangan-voli.webp'],
        ['title' => 'Theater Hall', 'cat' => 'Kreativitas', 'desc' => 'Aula teater kapasitas 500 orang untuk pertunjukan seni.', 'img' => 'https://picsum.photos/800/600?random=9'],
        ['title' => 'Kantin', 'cat' => 'Fasilitas', 'desc' => 'Kantin menyediakan makanan bergizi tanpa MSG.', 'img' => 'https://picsum.photos/800/600?random=10'],
        ['title' => 'Tempat Parkir', 'cat' => 'Fasilitas', 'desc' => 'Area parkir luas dan aman untuk kendaraan siswa dan guru.', 'img' => 'image/assets/facility/tempat-parkir.webp'],
        ['title' => 'Ruangan Kelas', 'cat' => 'Fasilitas', 'desc' => 'Area parkir luas dan aman untuk kendaraan siswa dan guru.', 'img' => 'image/assets/facility/ruangan-kelas.webp'],
        ['title' => 'Konseling', 'cat' => 'Fasilitas', 'desc' => 'Area parkir luas dan aman untuk kendaraan siswa dan guru.', 'img' => 'image/assets/facility/konseling.webp'],
    ];

    public function render()
    {
        return view('livewire.ui.facility-gallery');
    }
}