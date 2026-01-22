<x-layouts.app>
    <x-slot:title>
        {{ $type == 'berita' ? 'Berita & Kegiatan' : 'Pengumuman Resmi' }} | SMK Pelita IV
    </x-slot:title>
    
    <x-slot:description>
        Kumpulan {{ $type }} terbaru dari SMK Pelita IV Jakarta Barat.
    </x-slot:description>

    <x-ui.hero-banner
        img="{{ asset('image/assets/students/student-smiling.png') }}"
        title="{{ $type == 'berita' ? 'Warta Pelita' : 'Pusat Informasi' }}"
        desc="Ikuti terus perkembangan, prestasi, dan agenda terbaru di lingkungan SMK Pelita IV."
    />

    <x-ui.blog.post 
        :posts="$posts" 
        :title="$type == 'berita' ? 'Warta & Kegiatan Sekolah' : 'Pusat Pengumuman Resmi'" 
        :subtitle="$type == 'berita' ? 'Update Terkini' : 'Informasi Penting'" 
    />
</x-layouts.app>