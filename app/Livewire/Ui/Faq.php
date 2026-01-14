<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class Faq extends Component
{
    public $faqs = [
        [
            'question' => 'Apa saja program keahlian (jurusan) yang tersedia di SMK Pelita IV?',
            'answer' => 'Kami memiliki program keahlian unggulan yang dirancang sesuai kebutuhan industri saat ini. Untuk detail jurusan yang tersedia dan kurikulumnya, Anda dapat mengunduh katalog jurusan atau berkonsultasi langsung dengan tim PPDB kami.',
            'open' => false
        ],
        [
            'question' => 'Bagaimana penerapan konsep "Sekolah Ramah Anak" di tingkat SMK?',
            'answer' => 'Di SMK Pelita IV, kami mengedepankan disiplin positif tanpa kekerasan fisik maupun mental. Kami menciptakan lingkungan bebas perundungan (zero bullying) di mana hubungan antara guru (sebagai mentor) dan siswa dibangun di atas rasa saling menghargai untuk mendukung kesehatan mental siswa selama belajar.',
            'open' => false
        ],
        [
            'question' => 'Apakah lulusan SMK Pelita IV langsung disalurkan bekerja?',
            'answer' => 'Ya, kami memiliki unit BKK (Bursa Kerja Khusus) yang bekerja sama dengan berbagai mitra industri. Siswa diberikan pelatihan persiapan kerja, info lowongan eksklusif, serta pendampingan bagi yang ingin berwirausaha atau melanjutkan ke perguruan tinggi.',
            'open' => false
        ],
        [
            'question' => 'Bagaimana dengan kegiatan Praktik Kerja Lapangan (PKL)?',
            'answer' => 'Kegiatan PKL dilakukan di perusahaan mitra yang telah terverifikasi keamanannya. Kami memastikan tempat praktik tidak hanya memberikan ilmu teknis, tetapi juga lingkungan kerja yang sehat dan melindungi hak-hak siswa sebagai peserta didik.',
            'open' => false
        ],
        [
            'question' => 'Apakah siswa diperbolehkan mengikuti ekstrakurikuler di luar jam praktik?',
            'answer' => 'Tentu. Kami sangat mendukung pengembangan potensi non-akademik. Tersedia berbagai ekstrakurikuler mulai dari olahraga, seni, hingga komunitas teknologi untuk menyeimbangkan antara keterampilan teknis dan kebahagiaan sosial siswa.',
            'open' => false
        ]
    ];

    public function toggle($index)
    {
        // Menutup FAQ lain saat satu dibuka (Mode Single Accordion)
        foreach ($this->faqs as $key => $faq) {
            if ($key !== $index) {
                $this->faqs[$key]['open'] = false;
            }
        }

        $this->faqs[$index]['open'] = !$this->faqs[$index]['open'];
    }
    
    public function render()
    {
        return view('livewire.ui.faq');
    }
}