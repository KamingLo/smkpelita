<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['berita', 'pengumuman', 'prestasi'];
        $imagePath = 'thumbnails/student-smiling.png';

        foreach ($types as $type) {
            for ($i = 1; $i <= 6; $i++) {
                $title = ucfirst($type) . " Terkini Bagian ke-" . $i;
                
                Post::create([
                    'type' => $type,
                    'thumbnail' => $imagePath,
                    'title' => $title,
                    'slug' => Str::slug($title) . '-' . uniqid(),
                    'content' => "<p>Ini adalah konten untuk {$type} ke-{$i}. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>",
                    'view_count' => rand(10, 100),
                    'meta_description' => "Deskripsi meta untuk {$title}",
                    'meta_keywords' => "sekolah, {$type}, pendidikan",
                ]);
            }
        }
    }
}