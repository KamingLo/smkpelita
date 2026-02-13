<x-layouts.app>
    <x-slot:title>Pelita IV School | Halaman Tidak Ditemukan</x-slot:title>
    <x-slot:description>Halaman 404 - Pelita School</x-slot:description>
    
        <x-ui.hero-banner
            img="image/assets/school.jpg"
            title="Halaman tidak ada :(" 
            desc="Sepertinya Anda tersesat. Rute yang Anda tuju tidak terdaftar di sistem kami."    
        >
        {{-- Menambahkan Button di bawah Deskripsi --}}
        <div class="mt-8">
            <a href="{{ url('/') }}" 
               class="inline-flex items-center px-6 py-3 bg-white text-blue-600 hover:bg-blue-50 text-sm font-semibold rounded-xl transition-all shadow-lg group">
                <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </x-ui.hero-banner>
</x-layouts.app>