<x-layouts.app>
    <x-slot:title>
        {{ $type == 'berita' ? 'Berita & Kegiatan' : 'Pengumuman Resmi' }} | SMK Pelita IV
    </x-slot:title>
    <x-slot:description>
        Kumpulan {{ $type }} terbaru dari SMK Pelita IV Jakarta Barat. Informasi akurat mengenai agenda dan prestasi sekolah.
    </x-slot:description>

    {{-- Hero Banner agar UI tidak nabrak Navbar --}}
    <x-ui.hero-banner
        img="{{ asset('image/assets/blog_hero.jpg') }}"
        title="{{ $type == 'berita' ? 'Warta Pelita' : 'Pusat Informasi' }}"
        desc="Ikuti terus perkembangan, prestasi, dan agenda terbaru di lingkungan SMK Pelita IV."
    />

    <section class="py-24 bg-white">
        <div class="max-w-[1400px] mx-auto px-8 lg:px-16">
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach($posts as $post)
                        @php $route = $post->type == 'berita' ? 'public.berita.show' : 'public.pengumuman.show'; @endphp
                        
                        <article class="group cursor-pointer">
                            <a href="{{ route($route, $post->slug) }}" class="block space-y-6">
                                {{-- Thumbnail dengan Efek Zoom --}}
                                <div class="relative aspect-[16/10] overflow-hidden rounded-3xl bg-gray-100">
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                         alt="{{ $post->title }}">
                                    <div class="absolute top-6 left-6">
                                        <span class="px-5 py-2 bg-white/90 backdrop-blur-xl rounded-full text-[10px] font-bold uppercase tracking-[0.2em] {{ $post->type == 'berita' ? 'text-blue-600' : 'text-orange-600' }}">
                                            {{ $post->type }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Meta & Title --}}
                                <div class="space-y-3">
                                    <p class="text-[10px] font-bold text-blue-500 uppercase tracking-[0.2em]">
                                        {{ $post->created_at->format('d M, Y') }} — {{ $post->view_count }} Views
                                    </p>
                                    <h2 class="text-2xl font-medium tracking-tight text-gray-900 leading-tight group-hover:text-blue-600 transition-colors">
                                        {{ $post->title }}
                                    </h2>
                                    <p class="text-gray-500 line-clamp-2 text-sm leading-relaxed font-light">
                                        {{ $post->meta_description }}
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <div class="mt-20">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="py-20 text-center border-2 border-dashed border-gray-100 rounded-3xl">
                    <p class="text-gray-400 tracking-widest uppercase text-xs">Belum ada data {{ $type }}</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>