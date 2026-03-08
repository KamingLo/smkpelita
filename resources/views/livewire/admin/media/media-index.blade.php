<div x-data="{ showDeleteModal: false, deleteId: null }" class="font-sans">
    <div class="flex flex-col md:flex-row justify-between gap-6 mb-10">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manajemen Media</h1>
            <p class="text-slate-500 text-sm">Kelola aset visual fasilitas dan galeri sekolah.</p>
        </div>
        <a href="{{ route('admin.media.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all text-xs shrink-0 h-fit">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Media
        </a>
    </div>

    <div class="inline-flex p-1 bg-slate-100 rounded-2xl mb-8">
        @foreach(['galeri' => 'Galeri Kegiatan', 'fasilitas' => 'Fasilitas'] as $type => $label)
            <button wire:click="$set('currentType', '{{ $type }}')" 
                class="px-6 py-2.5 rounded-xl text-xs font-bold transition-all {{ $currentType === $type ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($items as $item)
            <div class="group relative aspect-[4/3] overflow-hidden rounded-3xl bg-slate-200">
                <img src="{{ asset('storage/uploads/galeri/' . $item->image) }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent p-6 flex flex-col justify-end">
                    
                    <div class="flex gap-2 mb-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="{{ route('admin.media.edit', $item->id) }}" class="flex-1 py-2 bg-white/20 backdrop-blur-md hover:bg-white hover:text-blue-600 text-white text-[10px] font-bold rounded-lg text-center transition-colors">Edit Data</a>
                        <button @click="deleteId = {{ $item->id }}; showDeleteModal = true" class="px-3 py-2 bg-red-500/20 backdrop-blur-md hover:bg-red-500 text-white rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>

                    <div class="relative">
                        @if($item->type === 'fasilitas')
                            <span class="inline-block px-2 py-0.5 bg-blue-600 text-[7px] font-bold text-white rounded mb-2">{{ $item->category }}</span>
                        @endif
                        <h3 class="text-white font-bold text-sm line-clamp-1">{{ $item->title }}</h3>
                        <p class="text-white/60 text-[10px] line-clamp-1">{{ $item->description ?? 'No description' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200">
                <p class="text-slate-400 font-bold text-xs italic">Belum ada data media.</p>
            </div>
        @endforelse
    </div>

    <template x-if="showDeleteModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm">
            <div @click.away="showDeleteModal = false" class="bg-white p-8 rounded-[2.5rem] max-w-xs w-full text-center shadow-2xl transition-all">
                <div class="w-14 h-14 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900">Hapus Media?</h3>
                <div class="flex flex-col gap-2 mt-6">
                    <button @click="$wire.deleteMedia(deleteId); showDeleteModal = false" class="py-3.5 bg-red-500 text-white font-bold rounded-2xl hover:bg-red-600 text-[11px] transition-all">Konfirmasi Hapus</button>
                    <button @click="showDeleteModal = false" class="py-3 text-slate-400 font-bold text-[11px]">Batalkan</button>
                </div>
            </div>
        </div>
    </template>
</div>