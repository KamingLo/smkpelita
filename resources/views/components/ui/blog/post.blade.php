@props(['posts', 'type' => 'all'])

<section class="py-24 bg-white">
    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">
        
        <div class="mb-16">
            <p class="text-blue-600 font-bold uppercase tracking-[0.2em] text-xs mb-3">
                @if($type == 'berita') Update Terkini 
                @elseif($type == 'pengumuman') Informasi Penting 
                @else Warta Terupdate @endif
            </p>
            <h3 class="text-4xl font-medium tracking-tight text-gray-900">
                @if($type == 'berita') Warta & Kegiatan Sekolah 
                @elseif($type == 'pengumuman') Pusat Pengumuman Resmi 
                @else Berita & Pengumuman Terbaru @endif
            </h3>
            <div class="mt-4 w-20 h-1.5 bg-blue-600 rounded-full"></div>
        </div>

        @if($posts && $posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($posts as $post)
                    <article class="group cursor-pointer">
                        {{-- Pastikan Accessor getUrlAttribute() sudah ada di Model Post --}}
                        <a href="{{ $post->url }}" class="block space-y-6">
                            <div class="relative aspect-[16/10] overflow-hidden rounded-3xl bg-gray-100 shadow-sm group-hover:shadow-xl transition-shadow duration-500">
                                @if($post->thumbnail)
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                         alt="{{ $post->title }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                        <span class="text-gray-400">No Image</span>
                                    </div>
                                @endif
                                
                                <div class="absolute top-6 left-6">
                                    <span class="px-5 py-2 bg-white/90 backdrop-blur-xl rounded-full text-[10px] font-bold uppercase tracking-[0.2em] {{ $post->type == 'berita' ? 'text-blue-600' : 'text-orange-600' }}">
                                        {{ $post->type }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <p class="text-[10px] font-bold text-blue-500 uppercase tracking-[0.2em]">
                                    {{ $post->created_at->format('d M, Y') }} — {{ number_format($post->view_count) }} Views
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

            {{-- Cek apakah $posts bisa dipaginasi sebelum panggil links() --}}
            @if(method_exists($posts, 'links'))
                <div class="mt-20">
                    {{ $posts->links() }}
                </div>
            @endif
        @else
            <div class="py-20 text-center border-2 border-dashed border-gray-100 rounded-3xl">
                <p class="text-gray-400 tracking-widest uppercase text-xs">Belum ada data {{ $type != 'all' ? $type : '' }} yang diterbitkan</p>
            </div>
        @endif
    </div>
</section>