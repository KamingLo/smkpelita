<div class="flex min-h-screen bg-gray-50">
    <div class="flex flex-col justify-center flex-1 px-8 py-12 sm:px-12 lg:flex-none lg:w-1/2 xl:w-5/12 bg-white">
        <div class="w-full max-w-md mx-auto">
            <div class="p-8 bg-white border border-gray-100 shadow-xl rounded-2xl">
                <div class="mb-10 text-center lg:text-left">
                    <img class="w-auto h-11 mx-auto lg:mx-0 mb-6" src="{{ asset('image/logo/logo_pelita_project.png') }}" alt="Logo SMK Pelita">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                        Selamat Datang Kembali
                    </h2>
                    <p class="mt-2 text-sm text-gray-500">Silakan masuk untuk mengelola Dashboard SMK Pelita</p>
                </div>

                <form wire:submit.prevent="authenticate" class="space-y-6">
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
                    </div>

                    <button type="submit" 
                        class="w-full inline-flex items-center justify-center px-6 py-3 font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 rounded-xl transition-all duration-300 transform active:scale-[0.98]">
                        <span wire:loading.remove class="flex items-center">
                            Masuk Ke Dashboard
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                        <span wire:loading class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        </span>
                    </button>
                </form>
            </div>

            <p class="mt-10 text-center text-xs text-gray-400 font-medium uppercase tracking-widest">
                &copy; {{ date('Y') }} SMK PELITA IV JAKARTA
            </p>
        </div>
    </div>

    <div class="relative flex-1 hidden w-0 lg:block">
        <img class="absolute inset-0 object-cover w-full h-full" 
            src="{{ asset('image/assets/mp.jpg') }}" 
            alt="SMK Pelita School">
        
        <div class="absolute inset-0 bg-blue-700 mix-blend-multiply opacity-30"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-900 via-transparent to-transparent opacity-80"></div>
        
        <div class="absolute bottom-16 left-16 right-16">
            <h3 class="text-4xl font-bold text-white mb-4 leading-tight">Membangun Masa Depan <br> Lewat Teknologi digital.</h3>
            <div class="w-20 h-1 bg-blue-500"></div>
        </div>
    </div>
</div>