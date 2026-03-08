<div x-data="{ showDeleteModal: false, deleteId: null }" class="font-sans">
    <div class="flex justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 uppercase">Postingan</h1>
            <p class="text-slate-500 text-sm">Kelola berita, pengumuman, dan prestasi.</p>
        </div>
        <a href="{{ route('posts.create') }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-xl text-[10px] uppercase shadow-lg shadow-blue-100 transition-all hover:bg-blue-700">
            Tambah Baru
        </a>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-xl text-xs font-bold">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-50">
            <input wire:model.live="search" type="text" placeholder="Cari judul..." 
                class="w-full max-w-sm px-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-blue-600 transition-all">
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50">
                    <tr class="text-[10px] font-bold text-slate-400 uppercase">
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4 text-center">Tipe</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @forelse($posts as $post)
                    <tr class="hover:bg-slate-50/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-800">{{ $post->title }}</div>
                            <div class="text-[10px] text-slate-400 uppercase mt-0.5">{{ $post->created_at->format('d M Y') }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 text-[9px] font-bold uppercase rounded-md 
                                {{ $post->type == 'berita' ? 'bg-blue-50 text-blue-600' : ($post->type == 'pengumuman' ? 'bg-amber-50 text-amber-600' : 'bg-emerald-50 text-emerald-600') }}">
                                {{ $post->type }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-3 text-slate-400">
                                <a href="{{ route('posts.edit', $post->id) }}" class="hover:text-blue-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                <button @click="deleteId = {{ $post->id }}; showDeleteModal = true" class="hover:text-red-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="px-6 py-12 text-center text-slate-400 italic">Data tidak ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="p-4 bg-slate-50/50 border-t border-slate-50">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

    <div x-show="showDeleteModal" x-transition.opacity class="fixed inset-0 z-[99] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm" style="display: none;">
        <div @click.away="showDeleteModal = false" class="bg-white p-6 rounded-[2rem] max-w-xs w-full text-center shadow-xl">
            <h3 class="text-lg font-bold text-slate-900">Hapus Data?</h3>
            <p class="text-slate-500 text-xs mt-2">Data yang dihapus tidak dapat dikembalikan.</p>
            
            <div class="mt-6 flex flex-col gap-2">
                <button @click="$wire.deletePost(deleteId); showDeleteModal = false" class="w-full py-3 bg-red-500 text-white font-bold rounded-xl text-xs uppercase shadow-lg shadow-red-100 hover:bg-red-600 transition-all">Hapus</button>
                <button @click="showDeleteModal = false" class="w-full py-3 text-slate-400 font-bold text-xs uppercase">Batal</button>
            </div>
        </div>
    </div>
</div>