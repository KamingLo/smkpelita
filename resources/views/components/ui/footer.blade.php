<footer class="bg-blue-950 text-white font-light tracking-widest border-t border-white/10 relative overflow-hidden">
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-[120px]"></div>

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-10">
            
            <div class="space-y-8 transition-all duration-700">
                <a href="/" class="flex items-center gap-5 group">
                    <img src="{{ asset('image/logo/logo_pelita.png') }}" alt="Logo" 
                         class="h-12 w-auto transition-transform duration-500 group-hover:scale-105">
                    <div class="flex flex-col border-l border-white/20 pl-5">
                        <span class="text-2xl font-medium tracking-[0.2em] leading-none group-hover:text-blue-300 transition-colors">PELITA</span>
                        <span class="text-[10px] font-extralight tracking-[0.5em] text-blue-400 opacity-80 uppercase mt-1">Jakarta Barat</span>
                    </div>
                </a>
                <p class="text-lg leading-relaxed opacity-60 tracking-normal italic max-w-sm">
                    "Membentuk generasi cerdas, berkarakter, dan siap menghadapi tantangan masa depan dengan integritas tinggi."
                </p>
                <div class="space-y-4 text-[15px] tracking-normal">
                    <a href="tel:+622112345678" class="flex items-center gap-4 opacity-70 hover:opacity-100 hover:text-blue-300 transition-all group">
                        <div class="p-2.5 rounded-xl bg-white/5 group-hover:bg-blue-500/20 transition-all">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <span>+62 21 1234 5678</span>
                    </a>
                    <a href="mailto:info@pelita.sch.id" class="flex items-center gap-4 opacity-70 hover:opacity-100 hover:text-blue-300 transition-all group">
                        <div class="p-2.5 rounded-xl bg-white/5 group-hover:bg-blue-500/20 transition-all">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <span>info@pelitajakarta.sch.id</span>
                    </a>
                </div>
            </div>

            <div class="lg:pl-10">
                <h4 class="text-sm font-semibold uppercase tracking-[0.4em] mb-10 text-blue-400">Navigasi</h4>
                <ul class="space-y-5">
                    @foreach(['Beranda' => '/', 'Profil' => '/profil', 'Sarana' => '/sarana', 'Admisi' => '/admisi'] as $label => $url)
                    <li class="group">
                        <a href="{{ $url }}" class="text-md opacity-60 group-hover:opacity-100 group-hover:text-blue-300 transition-all duration-300 flex items-center gap-4">
                            <span class="w-0 group-hover:w-5 h-[1.5px] bg-blue-400 transition-all duration-500"></span>
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold uppercase tracking-[0.4em] mb-10 text-blue-400">Jurusan</h4>
                <ul class="space-y-5">
                    @foreach(['DKV', 'MP', 'AK'] as $item)
                    <li class="group">
                        <a href="/jurusan" class="text-md opacity-60 group-hover:opacity-100 group-hover:text-blue-300 transition-all duration-300 flex items-center gap-4">
                            <span class="w-0 group-hover:w-5 h-[1.5px] bg-blue-400 transition-all duration-500"></span>
                            {{ $item }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-8">
                <h4 class="text-sm font-semibold uppercase tracking-[0.4em] mb-10 text-blue-400">Lokasi Kami</h4>
                
                <div class="relative group rounded-2xl overflow-hidden border border-white/10 h-56 shadow-2xl">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.810950122615!2d106.80193519999996!3d-6.156069000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f61339e8c7b1%3A0x6bcd4563d7826413!2sPelita%20School!5e0!3m2!1sen!2sid!4v1766736970433!5m2!1sen!2sid" 
                        class="absolute inset-0 w-full h-full grayscale-[0.6] group-hover:grayscale-0 transition-all duration-1000 scale-110 group-hover:scale-100"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    
                    <div class="absolute inset-0 pointer-events-none border border-white/10 rounded-2xl"></div>
                </div>

                <p class="text-[14px] leading-relaxed opacity-60 tracking-normal group-hover:opacity-90 transition-opacity">
                    7, Jl. Duri Utara No.22, RT.2/RW.6, Duri Utara, Kec. Tambora, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11270
                </p>
            </div>
        </div>

        <div class="mt-20 pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-xs opacity-40 uppercase tracking-[0.3em]">
            <p>© {{ date('Y') }} Yayasan Pendidikan Pelita. All rights reserved.</p>
            <div class="flex gap-10">
                <a href="#" class="hover:text-blue-300 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-blue-300 transition-colors">Terms</a>
            </div>
        </div>
    </div>
</footer>