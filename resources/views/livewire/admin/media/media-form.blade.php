<div class="max-w-3xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                {{ $isEdit ? 'Edit Media' : 'Tambah Media Baru' }}
            </h1>
            <p class="text-sm text-gray-500">Kelola visual fasilitas atau dokumentasi galeri sekolah.</p>
        </div>
        <a href="{{ route('admin.media.index') }}" class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors">Batal</a>
    </div>

    <form wire:submit="save" class="space-y-6">
        <div class="bg-white p-6 rounded-[2.5rem] border border-gray-100 shadow-sm">
            <label class="block text-xs font-bold text-gray-400 mb-4 px-2">File Media (WebP Disarankan)</label>
            
            <div class="flex flex-col md:flex-row gap-6 items-start px-2">
                <div class="w-full md:w-64 h-40 rounded-3xl bg-gray-50 border-2 border-dashed border-gray-200 overflow-hidden relative">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                    @elseif ($existingImage)
                        {{-- FIX: Jalur asset disesuaikan dengan tipe --}}
                        <img src="{{ asset('storage/uploads/galeri/' . $existingImage) }}" class="w-full h-full object-cover">
                    @else
                        <div class="flex flex-col items-center justify-center h-full text-gray-300">
                            <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            <span class="text-[10px] font-bold italic">Belum ada media</span>
                        </div>
                    @endif
                </div>

                <div class="flex-1 space-y-2">
                    <input type="file" wire:model="image" id="media-image" class="hidden" accept="image/*">
                    <label for="media-image" class="inline-block px-6 py-2 bg-gray-900 text-white text-[10px] font-bold rounded-xl cursor-pointer hover:bg-gray-700 transition-colors">
                        Pilih Gambar
                    </label>
                    <p class="text-xs text-gray-400">Pilih foto berkualitas tinggi. Maksimal 2MB.</p>
                    @error('image') <span class="text-red-500 text-xs block font-bold mt-1">{{ $message }}</span> @enderror
                    
                    <div wire:loading wire:target="image" class="text-xs text-blue-600 font-bold italic">
                        Memproses file...
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-2">Tipe Konten</label>
                    <select wire:model.live="type" class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl text-sm font-bold text-gray-600 focus:ring-2 focus:ring-blue-600">
                        <option value="galeri">Galeri Kegiatan</option>
                        <option value="fasilitas">Fasilitas Sekolah</option>
                    </select>
                </div>

                @if($type === 'fasilitas')
                <div wire:transition>
                    <label class="block text-xs font-bold text-gray-400 mb-2">Kategori Fasilitas</label>
                    <select wire:model="category" class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl text-sm font-bold text-gray-600 focus:ring-2 focus:ring-blue-600">
                        <option value="Fasilitas">Umum</option>
                        <option value="Akademik">Akademik</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Kreativitas">Kreativitas</option>
                    </select>
                </div>
                @endif
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-2">Judul Media</label>
                <input wire:model="title" type="text" placeholder="Masukkan judul media..." 
                    class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl text-sm font-bold text-gray-700 focus:ring-2 focus:ring-blue-600 outline-none transition-all">
                @error('title') <span class="text-red-500 text-xs font-bold mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-2">Deskripsi Singkat</label>
                <textarea wire:model="description" rows="3" placeholder="Tambahkan deskripsi jika diperlukan..."
                    class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl text-sm font-medium text-gray-600 focus:ring-2 focus:ring-blue-600 outline-none transition-all"></textarea>
            </div>
        </div>

        <button type="submit" class="w-full py-4 bg-blue-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all text-sm flex items-center justify-center">
            <span wire:loading.remove wire:target="save">
                {{ $isEdit ? 'Simpan Perubahan' : 'Tambahkan Media' }}
            </span>
            <span wire:loading wire:target="save">
                Sedang Menyimpan...
            </span>
        </button>
    </form>
</div>