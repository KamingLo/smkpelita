<x-layouts.app>
    <x-slot:title>Galeri Kenangan - SMK Pelita IV</x-slot:title>
    <x-slot:description>Kumpulan momen berharga dan jejak langkah siswa selama menempuh pendidikan di SMK Pelita IV.</x-slot:description>

    <x-ui.hero-banner
        img="image/assets/gallery-hero.jpg"
        title="Lembaran Kenangan" 
        desc="Mengenang setiap jejak, tawa, dan perjuangan yang membentuk kita hari ini."    
    />
    
    <x-sections.gallery.explanation />
    
    <livewire:ui.student-gallery />
    
    <section class="w-full py-20 bg-[#fafafa] font-sans">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-blue-600 p-12 md:p-20 rounded-[3rem] text-center text-white">
                <h3 class="text-3xl md:text-4xl font-bold mb-6">Punya Momen Menarik?</h3>
                <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">
                    Bagikan foto kegiatan atau kebersamaan kalian di sekolah untuk masuk ke dalam galeri kenangan resmi SMK Pelita IV.
                </p>
                <a href="#" class="inline-block px-10 py-4 bg-white text-blue-600 font-bold rounded-2xl hover:bg-blue-50 transition-all">
                    Kirim Foto Momenmu
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>