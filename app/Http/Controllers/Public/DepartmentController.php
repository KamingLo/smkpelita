<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Data Kompetensi Keahlian SMK Pelita IV
     * Data dibuat mendetail untuk mendukung layout yang luas.
     */
    private function getVocationalData()
    {
        return [
            [
                'alias' => 'DKV',
                'slug' => 'desain-komunikasi-visual',
                'name' => 'Desain Komunikasi Visual',
                'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z',
                'image' => 'image/assets/majors/desain-komunikasi-visual.webp',
                'desc' => 'Program keahlian Desain Komunikasi Visual (DKV) di SMK Pelita IV merupakan pusat kreativitas yang memadukan seni visual dengan teknologi digital mutakhir. Kami membekali siswa dengan kemampuan untuk mengekspresikan ide, pesan, dan solusi melalui media visual yang inovatif. Kurikulum kami dirancang untuk menjawab tantangan industri kreatif global, mulai dari perancangan identitas visual, periklanan modern, hingga pengembangan konten multimedia yang interaktif dan edukatif.',
                'learning_focus' => 'Siswa akan mendalami penguasaan perangkat lunak desain standar industri seperti Adobe Photoshop, Illustrator, Premiere Pro, dan After Effects. Selain teknis, kami juga menekankan pada kekuatan konsep, estetika warna, tipografi, serta teknik pengambilan gambar (fotografi) dan video berkualitas sinematik yang siap bersaing di pasar kerja maupun dunia wirausaha.',
                'features' => [
                    'Studio Fotografi dengan Lighting System lengkap',
                    'Laboratorium Komputer spesifikasi High-End',
                    'Drawing Tablet & Pen Display untuk ilustrasi digital',
                    'Peralatan Cinema Camera & Drone untuk videografi',
                    'Ruang Pameran Karya Siswa (Gallery Room)'
                ],
                'career_paths' => [
                    'Graphic Designer & Illustrator',
                    'UI/UX Designer for Mobile & Web',
                    'Professional Photographer & Editor',
                    'Motion Graphic & Video Editor',
                    'Creative Content Manager'
                ],
                'stats' => [
                    'Siswa Aktif' => '320+',
                    'Mitra Industri' => '25+',
                    'Lulus Kerja' => '92%'
                ],
            ],
            [
                'alias' => 'MP',
                'slug' => 'manajemen-perkantoran',
                'name' => 'Manajemen Perkantoran',
                'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                'image' => 'image/assets/majors/manajemen-perkantoran.webp',
                'desc' => 'Jurusan Manajemen Perkantoran (MP) berfokus pada pengembangan kompetensi dalam pengelolaan administrasi bisnis secara profesional dan digital. Di era transformasi industri, kami memastikan siswa mampu menguasai tata kelola perkantoran modern yang efisien, mulai dari manajemen kearsipan elektronik, komunikasi bisnis lintas platform, hingga layanan pelanggan yang prima. Kedisiplinan, etika kerja, dan kemampuan manajerial menjadi pilar utama dalam proses pembelajaran kami.',
                'learning_focus' => 'Fokus pembelajaran mencakup otomatisasi perkantoran menggunakan teknologi cloud, pengelolaan keuangan administratif, teknik korespondensi bahasa Indonesia dan Inggris, serta penguasaan manajemen rapat dan keprotokolan. Kami juga melatih kemampuan soft-skills seperti public speaking dan negosiasi yang sangat dibutuhkan di lingkungan korporat.',
                'features' => [
                    'Laboratorium Simulasi Perkantoran Modern',
                    'Sistem Kearsipan Digital (E-Filing)',
                    'Ruang Praktik Pelayanan Prima (Front Office)',
                    'Peralatan Kantor Digital (Smart Board & VoIP)',
                    'Mini Hall untuk Simulasi Meeting & Event'
                ],
                'career_paths' => [
                    'Executive Administrative Assistant',
                    'Human Resource (HR) Staff',
                    'Customer Relation Officer',
                    'Digital Document Controller',
                    'Public Relations Junior'
                ],
                'stats' => [
                    'Siswa Aktif' => '280+',
                    'Instansi Mitra' => '18+',
                    'Lulus Kerja' => '88%'
                ],
            ],
            [
                'alias' => 'AKL',
                'slug' => 'akuntansi-keuangan',
                'name' => 'Akuntansi Keuangan Lembaga',
                'icon' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
                'image' => 'image/assets/majors/akuntansi.webp',
                'desc' => 'Program Akuntansi & Keuangan Lembaga (AKL) di SMK Pelita IV mempersiapkan siswa menjadi tenaga akuntan tingkat menengah yang teliti, jujur, dan kompeten. Kami mengajarkan sistem pencatatan keuangan yang komprehensif, mulai dari siklus akuntansi manual hingga penggunaan aplikasi keuangan berbasis komputer (fintech). Lulusan kami dibekali dengan kemampuan analisis keuangan yang tajam untuk mendukung kebutuhan perusahaan komersial maupun instansi pemerintah.',
                'learning_focus' => 'Kurikulum kami menitikberatkan pada penguasaan akuntansi perusahaan jasa, dagang, dan manufaktur. Siswa akan mahir menggunakan software akuntansi populer seperti MYOB, Accurate, dan Zahir. Selain itu, pemahaman mendalam mengenai perpajakan, audit dasar, dan pengelolaan kas perbankan menjadi standar kompetensi wajib bagi seluruh siswa AKL.',
                'features' => [
                    'Laboratorium Komputer Akuntansi Terintegrasi',
                    'Mini Bank untuk Praktik Perbankan Siswa',
                    'Software Akuntansi Berlisensi Industri',
                    'Unit Produksi Jasa Konsultasi Pajak',
                    'Sistem Perbankan Syariah & Konvensional'
                ],
                'career_paths' => [
                    'Accounting Staff & Bookkeeper',
                    'Junior Tax Consultant',
                    'Bank Teller & Back Office Staff',
                    'Internal Auditor Assistant',
                    'Finance Administrator'
                ],
                'stats' => [
                    'Siswa Aktif' => '250+',
                    'Bank Mitra' => '15+',
                    'Lulus Kerja' => '95%'
                ],
            ]
        ];
    }

    /**
     * Menampilkan Detail Jurusan
     */
    public function show($slug)
    {
        $major = collect($this->getVocationalData())->firstWhere('slug', $slug);

        if (!$major) {
            abort(404);
        }

        return view('public.department.show', compact('major'));
    }
}