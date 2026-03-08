<x-layouts.app>
    <x-slot:title>
        {{ $type == 'berita' ? 'Berita & Kegiatan' : ($type == 'prestasi' ? 'Prestasi Siswa' : 'Pengumuman Resmi') }} | SMK Pelita IV
    </x-slot:title>
    
    <x-slot:description>
        Kumpulan {{ $type }} terbaru dari SMK Pelita IV Jakarta Barat.
    </x-slot:description>

    <x-ui.hero-banner
        img="{{ asset('image/assets/students/student-smiling.png') }}"
        title="{{ $type == 'berita' ? 'Warta Pelita' : ($type == 'prestasi' ? 'Prestasi Kami' : 'Pusat Informasi') }}"
        desc="Ikuti terus perkembangan, prestasi, dan agenda terbaru di lingkungan SMK Pelita IV."
    />

    <x-ui.blog.post 
        :posts="$posts" 
        :title="$type == 'berita' ? 'Warta & Kegiatan Sekolah' : ($type == 'prestasi' ? 'Capaian & Prestasi Siswa' : 'Pusat Pengumuman Resmi')" 
        :subtitle="$type == 'berita' ? 'Update Terkini' : ($type == 'prestasi' ? 'Bangga Menjadi Pelita' : 'Informasi Penting')" 
    />
</x-layouts.app>