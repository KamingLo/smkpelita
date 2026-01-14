<x-layouts.app>
    <x-slot:title>{{ $post->title }} | SMK Pelita IV</x-slot:title>
    <x-slot:description>{{ $post->meta_description ?? Str::limit(strip_tags($post->content), 150) }}</x-slot:description>

    {{-- Hero Banner: Menunjukkan Identitas Halaman --}}
    <x-ui.hero-banner
        img="{{ asset('image/assets/default_bg.jpg') }}" 
        title="Detail {{ ucfirst($post->type) }}"
        desc="Eksplorasi informasi mendalam mengenai agenda dan warta terkini di lingkungan pendidikan SMK Pelita IV."
    />

    <article class="bg-white py-20">
        <div class="max-w-screen-md mx-auto px-6">
            
            {{-- 1. FOTO UTAMA --}}
            <div class="mb-10" data-aos="fade-up">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                     class="w-full h-[300px] md:h-[480px] object-cover rounded-[2.5rem] shadow-xl"
                     alt="{{ $post->title }}">
            </div>

            {{-- 2. JUDUL BERITA (DI BAWAH FOTO) --}}
            <div class="mb-12" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-3 mb-6">
                    <span class="px-4 py-1.5 bg-blue-50 text-blue-600 rounded-full text-[10px] font-bold uppercase tracking-[0.2em]">
                        {{ $post->type }}
                    </span>
                    <span class="text-[10px] font-medium text-gray-400 uppercase tracking-widest">
                        {{ $post->created_at->format('d F Y') }} • {{ $post->view_count }} Views
                    </span>
                </div>

                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight tracking-tight">
                    {{ $post->title }}
                </h1>
                
                <div class="mt-8 h-px w-full bg-gray-100"></div>
            </div>

            {{-- 3. ISI KONTEN --}}
            <div class="prose prose-blue prose-lg md:prose-xl max-w-none 
                        prose-p:text-gray-700 prose-p:leading-relaxed prose-p:font-light
                        prose-headings:text-gray-900 prose-headings:font-bold
                        trix-content" 
                 data-aos="fade-up" 
                 data-aos-delay="200">
                
                {!! $post->content !!}

            </div>

            {{-- 4. FOOTER & NAVIGASI --}}
            <div class="mt-20 pt-10 border-t border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex flex-wrap gap-2">
                    @if($post->meta_keywords)
                        @foreach(explode(',', $post->meta_keywords) as $tag)
                            <span class="text-[11px] font-medium text-gray-400 uppercase tracking-wider">#{{ trim($tag) }}</span>
                        @endforeach
                    @endif
                </div>

                <a href="{{ route($post->type == 'berita' ? 'public.berita.index' : 'public.pengumuman.index') }}" 
                   class="group inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.2em] text-blue-600 transition-all">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                    </svg>
                    Kembali ke Index
                </a>
            </div>
        </div>
    </article>
</x-layouts.app>