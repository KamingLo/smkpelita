<x-layouts.app>
    <x-slot:title>{{ $major['name'] }} di SMK Pelita IV</x-slot:title>
    <x-slot:description>{{ Str::limit($major['desc'], 160) }}</x-slot:description>

    <x-ui.hero-banner
        img="{{ asset('image/assets/default_bg.jpg') }}" 
        title="Detail Jurusan"
        desc="Mengenal lebih dekat kompetensi dan prospek karir {{ $major['name'] }}."
    />

    <article class="bg-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-6">
            
            {{-- 1. Header Section --}}
            <div class="mb-16" data-aos="fade-up">
                <nav class="flex items-center gap-2 mb-6 text-sm">
                    <span class="text-blue-500 font-medium">Program Keahlian</span>
                    <span class="text-slate-300">/</span>
                    <span class="text-slate-500">{{ $major['alias'] }}</span>
                </nav>

                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight tracking-tight mb-8">
                    {{ $major['name'] }}
                </h1>
                
                <div class="h-1.5 w-20 bg-blue-500 rounded-full"></div>
            </div>

            {{-- 2. & 3. Grid Utama: Foto & Prospek Karir --}}
            <div class="grid lg:grid-cols-12 gap-8 mb-20" data-aos="fade-up">
                
                {{-- Sisi Kiri: Foto Utama (Rasio 3:2) --}}
                <div class="lg:col-span-8">
                    <div class="overflow-hidden rounded-3xl shadow-sm border border-slate-100 h-full">
                        <img src="{{ asset($major['image']) }}" 
                             class="w-full h-full aspect-[3/2] lg:aspect-auto object-cover transition-transform duration-700 hover:scale-105"
                             alt="{{ $major['name'] }}">
                    </div>
                </div>

                {{-- Sisi Kanan: Prospek Karir (Sidebar Style) --}}
                <div class="lg:col-span-4">
                    <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 h-full flex flex-col">
                        <h2 class="text-2xl font-medium text-slate-900 mb-6 tracking-tight flex items-center gap-3">
                            <span class="w-8 h-1 bg-blue-500 rounded-full"></span>
                            Prospek Karir
                        </h2>
                        
                        <div class="flex-grow space-y-2">
                            @foreach($major['career_paths'] as $career)
                            <div class="group flex items-center justify-between py-3.5 border-b border-slate-200 last:border-0">
                                <span class="text-base font-semibold text-slate-600 group-hover:text-blue-600 transition-colors">
                                    {{ $career }}
                                </span>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-8 pt-6 border-t border-slate-200">
                            <a href="/admisi" class="flex items-center justify-center gap-3 px-6 py-4 bg-blue-500 text-white rounded-2xl font-bold transition-all hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-200">
                                Daftar Sekarang
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. Statistik Singkat --}}
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-10 mb-24" data-aos="fade-up">
                @foreach($major['stats'] as $label => $value)
                <div class="flex flex-col gap-1 border-l-4 border-blue-500 pl-6 py-2">
                    <div class="text-3xl md:text-4xl font-medium text-slate-900 tracking-tight">{{ $value }}</div>
                    <div class="text-sm md:text-base text-slate-500 font-medium">{{ $label }}</div>
                </div>
                @endforeach
            </div>

            {{-- 5. Konten Detail (Deskripsi & Fasilitas) --}}
            <div class="space-y-24">
                
                {{-- Deskripsi Program --}}
                <div class="grid lg:grid-cols-12 gap-10 items-start" data-aos="fade-up">
                    <div class="lg:col-span-4">
                        <h2 class="text-2xl font-medium text-slate-900 tracking-tight">Profil Program</h2>
                        <p class="text-slate-500 mt-2">Visi dan fokus pembelajaran siswa.</p>
                    </div>
                    <div class="lg:col-span-8">
                        <div class="space-y-6 text-lg text-slate-600 font-light leading-relaxed">
                            <p>{{ $major['desc'] }}</p>
                            <p>{{ $major['learning_focus'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Fasilitas Laboratorium --}}
                <div class="grid lg:grid-cols-12 gap-10 items-start" data-aos="fade-up">
                    <div class="lg:col-span-4">
                        <h2 class="text-2xl font-medium text-slate-900 tracking-tight">Fasilitas Laboratorium</h2>
                        <p class="text-slate-500 mt-2">Sarana penunjang praktik kompetensi.</p>
                    </div>
                    <div class="lg:col-span-8">
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach($major['features'] as $feature)
                            <div class="flex items-center gap-4 p-5 bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-100 transition-all">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="font-medium text-slate-700">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer Navigation --}}
            <div class="mt-32 pt-12 border-t border-slate-100">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 text-slate-400 hover:text-blue-500 font-semibold transition-colors group">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </article>
</x-layouts.app>