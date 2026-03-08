<div>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Media</h1>
            <p class="text-gray-500 text-sm">Kelola aset visual fasilitas dan galeri sekolah.</p>
        </div>
        
        <a href="{{ route('admin.media.create') }}" 
           class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-100 text-xs">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Media
        </a>
    </div>

    <div class="flex items-center gap-2 mb-6 p-1 bg-gray-100 w-fit rounded-2xl">
        <button wire:click="$set('currentType', 'galeri')" 
            class="px-6 py-2.5 rounded-xl text-xs font-bold transition-all {{ $currentType === 'galeri' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
            Galeri Kegiatan
        </button>
        <button wire:click="$set('currentType', 'fasilitas')" 
            class="px-6 py-2.5 rounded-xl text-xs font-bold transition-all {{ $currentType === 'fasilitas' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
            Fasilitas
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($items as $item)
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300">
                <div class="relative aspect-video overflow-hidden">
                    {{-- FIX: Jalur asset disesuaikan dengan tipe --}}
                    <img src="{{ asset('storage/uploads/galeri/' . $item->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    
                    @if($item->type === 'fasilitas')
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 bg-blue-600/90 backdrop-blur text-[10px] font-bold text-white rounded-lg">
                                {{ $item->category }}
                            </span>
                        </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-between p-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.media.edit', $item->id) }}" class="p-2 bg-white/20 backdrop-blur hover:bg-white text-white hover:text-blue-600 rounded-lg transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <button wire:click="deleteMedia({{ $item->id }})" class="p-2 bg-white/20 backdrop-blur hover:bg-red-500 text-white rounded-lg transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="p-5">
                    <h3 class="font-bold text-gray-800 line-clamp-1 text-sm">{{ $item->title }}</h3>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-2">{{ $item->description ?? 'Tidak ada deskripsi.' }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200 flex flex-col items-center justify-center text-center px-4">
                <span class="text-gray-400 font-bold text-xs italic">Belum ada media untuk tipe ini.</span>
            </div>
        @endforelse
    </div>
</div>