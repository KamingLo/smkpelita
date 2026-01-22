<x-layouts.auth>
    <x-slot:title>Reset Password</x-slot:title>

    <div class="flex min-h-screen bg-gray-50">
        <div class="flex flex-col justify-center flex-1 px-8 py-12 sm:px-12 lg:flex-none lg:w-1/2 xl:w-5/12 bg-white">
            <div class="w-full max-w-md mx-auto">
                <div class="p-8 bg-white border border-gray-100 shadow-xl rounded-2xl">
                    
                    <div class="mb-10 text-center lg:text-left">
                        <div class="flex items-center justify-center lg:justify-start gap-4 mb-6">
                            <img class="w-auto h-11" src="{{ asset('image/logo/logo_pelita_project.png') }}" alt="Logo SMK Pelita">
                        </div>
                        
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Reset Password</h2>
                        <p class="mt-2 text-sm text-gray-500">
                            Silakan buat kata sandi baru untuk akun <br>
                            <span class="font-semibold text-blue-600">{{ $email }}</span>
                        </p>
                    </div>

                    {{-- Tambahkan ID pada form --}}
                    <form id="resetForm" action="{{ route('password.update.process') }}" method="POST" class="space-y-6" onsubmit="submitForm()">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Password Baru</label>
                            <input type="password" name="password" required autofocus
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 placeholder-gray-400"
                                placeholder="Min. 8 karakter">
                            @error('password') 
                                <span class="text-xs font-medium text-red-600 mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" required 
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 placeholder-gray-400"
                                placeholder="Ulangi password baru">
                        </div>

                        <div class="pt-2">
                            {{-- Tambahkan ID pada button --}}
                            <button type="submit" id="submitBtn"
                                class="w-full inline-flex items-center justify-center px-6 py-3 font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 rounded-xl transition-all duration-300 transform active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed">
                                <span id="btnText" class="flex items-center">
                                    Simpan Password Baru
                                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>

                    <div class="mt-8 text-center">
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            Kembali ke Halaman Login
                        </a>
                    </div>
                </div>

                <p class="mt-10 text-center text-xs text-gray-400 font-medium uppercase tracking-widest">
                    &copy; {{ date('Y') }} SMK PELITA IV JAKARTA
                </p>
            </div>
        </div>

        {{-- Bagian Gambar Tetap Sama --}}
        <div class="relative flex-1 hidden w-0 lg:block">
            <img class="absolute inset-0 object-cover w-full h-full" src="{{ asset('image/assets/mp.jpg') }}" alt="SMK Pelita School">
            <div class="absolute inset-0 bg-blue-700 mix-blend-multiply opacity-30"></div>
            <div class="absolute inset-0 bg-gradient-to-tr from-blue-900 via-transparent to-transparent opacity-80"></div>
            <div class="absolute bottom-16 left-16 right-16">
                <h3 class="text-4xl font-bold text-white mb-4 leading-tight">Keamanan Akun <br> Adalah Prioritas Kami.</h3>
                <div class="w-20 h-1 bg-blue-500"></div>
                <p class="mt-4 text-blue-100 text-lg">Pastikan gunakan kombinasi password yang kuat untuk melindungi data Anda.</p>
            </div>
        </div>
    </div>

    {{-- Script JavaScript untuk mengubah status tombol --}}
    <script>
        function submitForm() {
            const btn = document.getElementById('submitBtn');
            const text = document.getElementById('btnText');
            
            // Menonaktifkan tombol agar tidak diklik dua kali
            btn.disabled = true;
            
            // Mengubah teks menjadi memproses dengan icon spinner sederhana
            text.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses...
            `;
        }
    </script>
</x-layouts.auth>