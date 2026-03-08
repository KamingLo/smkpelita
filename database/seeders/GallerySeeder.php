<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            ['title' => 'Tempat Pendaftaran', 'category' => 'Akademik', 'description' => 'Ruang pendaftaran untuk calon siswa baru.', 'image' => 'admisi.webp'],
            ['title' => 'Laboratorium Komputer', 'category' => 'Fasilitas', 'description' => 'Laboratorium dengan komputer modern dan software terkini.', 'image' => 'laboratorium-komputer.webp'],
            ['title' => 'Perpustakaan 1', 'category' => 'Akademik', 'description' => 'Koleksi buku lengkap dengan akses digital.', 'image' => 'rak-buku.webp'],
            ['title' => 'Perpustakaan 2', 'category' => 'Akademik', 'description' => 'Ruang baca nyaman untuk studi mandiri.', 'image' => 'pendaftaran-perpustakaan.webp'],
            ['title' => 'Koperasi', 'category' => 'Fasilitas', 'description' => 'Koperasi sekolah menyediakan kebutuhan siswa.', 'image' => 'koperasi.webp'],
            ['title' => 'Lapangan Olahraga', 'category' => 'Olahraga', 'description' => 'Lapangan multi-fungsi untuk berbagai cabang olahraga.', 'image' => 'lapangan-olahraga.webp'],
            ['title' => 'Lapangan Voli', 'category' => 'Olahraga', 'description' => 'Lapangan voli standar dengan net dan peralatan lengkap.', 'image' => 'lapangan-voli.webp'],
            ['title' => 'Aula Teater', 'category' => 'Kreativitas', 'description' => 'Aula teater kapasitas 500 orang untuk pertunjukan seni.', 'image' => 'aula-teater.webp'],
            ['title' => 'Kantin', 'category' => 'Fasilitas', 'description' => 'Kantin menyediakan makanan bergizi tanpa MSG.', 'image' => 'kantin.webp'],
            ['title' => 'Tempat Parkir', 'category' => 'Fasilitas', 'description' => 'Area parkir luas dan aman untuk kendaraan siswa dan guru.', 'image' => 'tempat-parkir.webp'],
            ['title' => 'Ruangan Kelas', 'category' => 'Fasilitas', 'description' => 'Ruang kelas bersih dan nyaman dilengkapi AC.', 'image' => 'ruangan-kelas.webp'],
            ['title' => 'Konseling', 'category' => 'Fasilitas', 'description' => 'Layanan bimbingan dan konseling untuk siswa.', 'image' => 'konseling.webp'],
        ];

        foreach ($facilities as $facility) {
            DB::table('media_contents')->insert([
                'type' => 'fasilitas',
                'category' => $facility['category'],
                'title' => $facility['title'],
                'image' => $facility['image'],
                'description' => $facility['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}