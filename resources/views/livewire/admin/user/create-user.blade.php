<div class="max-w-7xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-900 leading-tight">Manajemen User</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola akses admin dan petugas dalam satu panel kontrol.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <div class="lg:col-span-4">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6">
                    <h3 class="text-sm font-semibold text-gray-900 mb-5 text-blue-600">Tambah Akun Baru</h3>
                    
                    <form wire:submit="save" class="space-y-4">
                        @if (session()->has('success'))
                            <div class="p-3 bg-green-50 border border-green-100 text-green-700 text-xs font-medium rounded-lg mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                {{ session('success') }}
                            </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input wire:model="name" type="text" placeholder="Contoh: Budi Santoso"
                                class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm transition-all text-gray-800">
                            @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                            <input wire:model="email" type="email" placeholder="admin@sekolah.com"
                                class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm transition-all text-gray-800">
                            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-4 pt-1">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input wire:model="password" type="password" placeholder="Minimal 8 karakter"
                                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm transition-all text-gray-800">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                                <input wire:model="password_confirmation" type="password" placeholder="Ulangi password"
                                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm transition-all text-gray-800">
                            </div>
                        </div>
                        @error('password') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror

                        <button type="submit" 
                            wire:loading.attr="disabled"
                            class="w-full mt-2 py-2.5 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white text-sm font-semibold rounded-lg transition-all shadow-sm flex items-center justify-center relative overflow-hidden">
                            
                            <div wire:loading wire:target="save" class="items-center justify-center space-x-2">
                                <span>Menyimpan...</span>
                            </div>

                            <span wire:loading.remove wire:target="save">
                                Daftarkan User
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lg:col-span-8 space-y-4">
            <div class="relative group">
                <input wire:model.live="search" type="text" placeholder="Cari berdasarkan nama atau email..." 
                    class="w-full pl-11 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm">
                <div class="absolute left-4 top-3 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round"></path></svg>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-4 text-xs font-semibold uppercase text-gray-500 tracking-wider">Identitas User</th>
                                <th class="px-6 py-4 text-xs font-semibold uppercase text-gray-500 tracking-wider text-right">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($users as $user)
                            <tr wire:key="{{ $user->id }}" class="hover:bg-gray-50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-semibold text-sm mr-4 border border-blue-100">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900 leading-none">{{ $user->name }}</p>
                                            <p class="text-xs text-gray-500 mt-1">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button 
                                        wire:click="delete({{ $user->id }})" 
                                        wire:confirm="Apakah Anda yakin ingin menghapus user ini?"
                                        class="inline-flex items-center p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all"
                                        title="Hapus User"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-200 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        <p class="text-sm text-gray-400 font-medium italic">Tidak ada user yang cocok dengan pencarian.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>
</div>