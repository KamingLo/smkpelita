<div class="flex min-h-screen bg-gray-50" x-data="{ showForgot: false }">
    <div class="flex flex-col justify-center flex-1 px-8 py-12 sm:px-12 lg:flex-none lg:w-1/2 xl:w-5/12 bg-white">
        <div class="w-full max-w-md mx-auto">
            <div class="p-8 bg-white border border-gray-100 shadow-xl rounded-2xl">
                
                <div class="mb-10 text-center lg:text-left">
                    <img class="w-auto h-11 mx-auto lg:mx-0 mb-6" src="{{ asset('image/logo/logo_pelita_project.png') }}" alt="Logo SMK Pelita">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900" x-text="showForgot ? 'Reset Password' : 'Selamat Datang Kembali'"></h2>
                    <p class="mt-2 text-sm text-gray-500" x-text="showForgot ? 'Masukkan email Anda untuk menerima link reset password.' : 'Silakan masuk untuk mengelola Dashboard SMK Pelita'"></p>
                </div>

                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                        class="mb-6 p-4 text-sm text-green-700 bg-green-50 rounded-xl border border-green-100 flex items-center shadow-sm">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form x-show="!showForgot" wire:submit.prevent="authenticate" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Email</label>
                        <input wire:model="email" type="email" required 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 placeholder-gray-400"
                            placeholder="nama@email.com">
                        @error('email') <span class="text-xs font-medium text-red-600 mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                        <input wire:model="password" type="password" required 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                            placeholder="••••••••">
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center group cursor-pointer">
                            <input wire:model="remember" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600 group-hover:text-blue-600 transition-colors">Ingat saya</span>
                        </label>
                        <button type="button" @click="showForgot = true" class="text-sm font-semibold text-blue-600 hover:text-blue-700">
                            Lupa Password?
                        </button>
                    </div>

                    <button type="submit" 
                        wire:loading.attr="disabled"
                        wire:target="authenticate"
                        class="w-full inline-flex items-center justify-center px-6 py-3 font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 rounded-xl transition-all duration-300 transform active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed">
                        
                        <span wire:loading.remove wire:target="authenticate">Masuk Ke Dashboard</span>
                        
                        <span wire:loading wire:target="authenticate" class="inline-flex items-center">
                            Memproses...
                        </span>
                    </button>
                </form>

                <form x-show="showForgot" x-cloak wire:submit.prevent="sendResetLink" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email Pemulihan</label>
                        <input wire:model="email_reset" type="email" required 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                            placeholder="nama@email.com">
                        @error('email_reset') <span class="text-xs font-medium text-red-600 mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col space-y-3">
                        <button type="submit" 
                            wire:loading.attr="disabled"
                            wire:target="sendResetLink"
                            class="w-full inline-flex items-center justify-center px-6 py-3 font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl transition-all duration-300 disabled:opacity-70 disabled:cursor-not-allowed">
                            
                            <span wire:loading.remove wire:target="sendResetLink">Kirim Link Reset</span>
                            
                            <span wire:loading wire:target="sendResetLink" class="inline-flex items-center">
                                Mengirim...
                            </span>
                        </button>
                        <button type="button" @click="showForgot = false" class="text-sm font-semibold text-gray-500 hover:text-gray-700 text-center">
                            Kembali ke Login
                        </button>
                    </div>
                </form>

            </div>

            <p class="mt-10 text-center text-xs text-gray-400 font-medium uppercase tracking-widest">
                &copy; {{ date('Y') }} SMK PELITA IV JAKARTA
            </p>
        </div>
    </div>

    <div class="relative flex-1 hidden w-0 lg:block">
        <img class="absolute inset-0 object-cover w-full h-full" src="{{ asset('image/assets/mp.jpg') }}" alt="SMK Pelita School">
        <div class="absolute inset-0 bg-blue-700 mix-blend-multiply opacity-30"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-900 via-transparent to-transparent opacity-80"></div>
        <div class="absolute bottom-16 left-16 right-16">
            <h3 class="text-4xl font-bold text-white mb-4 leading-tight">Membangun Masa Depan <br> Lewat Teknologi digital.</h3>
            <div class="w-20 h-1 bg-blue-500"></div>
        </div>
    </div>
</div>