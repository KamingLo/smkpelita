<x-layouts.app>
    <x-slot:title>SMK Pelita IV | Sekolah Menengah Kejuruan di Jakarta Barat</x-slot:title>
    <x-slot:description>Sekolah menengah kejuruan di Jakarta Barat dengan program unggulan dan fasilitas modern.</x-slot:description>

    <x-sections.hero />
    <x-sections.philosophy />
    <x-ui.blog.post 
        :posts="$posts" 
        title="Berita & Pengumuman Terbaru" 
        subtitle="Update Pelita IV" 
    />
    <livewire:ui.testimonials  />
    <x-sections.cta-admisi />


</x-layouts.app>