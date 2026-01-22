<x-layouts.app>
    <x-slot:title>Jurusan {{ $major['name'] }} | SMK Pelita IV</x-slot:title>
    <x-slot:description>{{ Str::limit($major['desc'], 160) }}</x-slot:description>

    {{-- Hero Banner --}}
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

            {{-- 2. Foto Utama --}}
            <div class="mb-20" data-aos="fade-up">
                <div class="overflow-hidden rounded-3xl shadow-sm border border-slate-100">
                    <img src="{{ asset($major['image']) }}" 
                         class="w-full h-[350px] md:h-[600px] object-cover"
                         alt="{{ $major['name'] }}">
                </div>
            </div>

            {{-- 3. Statistik (Lebih Proporsional) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-24" data-aos="fade-up">
                @foreach($major['stats'] as $label => $value)
                <div class="flex flex-col gap-1 border-l-4 border-blue-500 pl-6">
                    <div class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">{{ $value }}</div>
                    <div class="text-base text-slate-500 font-medium">{{ $label }}</div>
                </div>
                @endforeach
            </div>

            {{-- 4. Konten Terintegrasi --}}
            <div class="space-y-24">
                
                {{-- Section: Deskripsi --}}
                <div class="grid lg:grid-cols-12 gap-10 items-start" data-aos="fade-up">
                    <div class="lg:col-span-4">
                        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Profil Program</h2>
                    </div>
                    <div class="lg:col-span-8">
                        <div class="space-y-6 text-lg text-slate-600 font-light leading-relaxed">
                            <p>{{ $major['desc'] }}</p>
                            <p>{{ $major['learning_focus'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Section: Fasilitas & Karir --}}
                <div class="grid lg:grid-cols-12 gap-16" data-aos="fade-up">
                    {{-- Fasilitas --}}
                    <div class="lg:col-span-7">
                        <h2 class="text-2xl font-bold text-slate-900 mb-8 tracking-tight">Fasilitas Laboratorium</h2>
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach($major['features'] as $feature)
                            <div class="flex items-center gap-4 p-5 bg-slate-50 rounded-2xl border border-slate-100">
                                <div class="flex-shrink-0 w-8 h-8 text-blue-500">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-slate-700">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Karir --}}
                    <div class="lg:col-span-5">
                        <h2 class="text-2xl font-bold text-slate-900 mb-8 tracking-tight">Prospek Karir</h2>
                        <div class="space-y-1">
                            @foreach($major['career_paths'] as $career)
                            <div class="group flex items-center justify-between py-4 border-b border-slate-100 transition-colors hover:border-blue-500">
                                <span class="text-lg font-medium text-slate-600 group-hover:text-blue-500 transition-colors">{{ $career }}</span>
                                <svg class="w-5 h-5 text-blue-500 transform translate-x-[-10px] opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-12">
                            <a href="/kontak" class="inline-flex items-center gap-3 px-8 py-4 bg-blue-500 text-white rounded-xl font-bold transition-all hover:bg-blue-600 shadow-lg shadow-blue-500/10">
                                Konsultasi Jurusan
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 5. Footer Navigation --}}
            <div class="mt-32 pt-12 border-t border-slate-100">
                <a href="{{ url('/jurusan') }}" class="inline-flex items-center gap-3 text-slate-400 hover:text-blue-500 font-semibold transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Jurusan
                </a>
            </div>
        </div>
    </article>
</x-layouts.app>