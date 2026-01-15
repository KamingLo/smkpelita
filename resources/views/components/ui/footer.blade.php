<footer class="relative overflow-hidden border-t border-white/10 bg-blue-600/90 font-light text-white backdrop-blur-2xl">
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-blue-400/20 blur-[120px]"></div>

    <div class="relative z-10 mx-auto max-w-[1500px] px-6 py-20 lg:px-10">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4 lg:gap-10">
            
            <div class="space-y-8">
                <a href="/" wire:navigate class="flex items-center gap-5 group">
                    <img src="{{ asset('image/logo/logo_pelita.png') }}" 
                         class="h-14 lg:h-16 w-auto transition-transform duration-700 group-hover:scale-105">
                    
                    <div class="flex flex-col border-l-2 border-white/20 pl-5 space-y-0.5">
                        <span class="text-xl font-bold tracking-[0.2em] leading-none uppercase">PELITA</span>
                        <span class="text-[10px] font-medium tracking-[0.3em] text-blue-100 opacity-90 uppercase italic">Jakarta Barat</span>
                    </div>
                </a>
                
                <p class="max-w-sm text-[15px] leading-relaxed text-blue-50/80 italic tracking-normal">
                    "Membentuk generasi cerdas, berkarakter, dan siap menghadapi tantangan masa depan dengan integritas tinggi."
                </p>

                <div class="space-y-4 text-[14px] tracking-wide">
                    <div class="flex items-center gap-4 opacity-90">
                        <div class="rounded-xl bg-white/10 p-2">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <span>+62 21 1234 5678</span>
                    </div>
                    <div class="flex items-center gap-4 opacity-90">
                        <div class="rounded-xl bg-white/10 p-2">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <span class="italic">info@pelitajakarta.sch.id</span>
                    </div>
                </div>
            </div>

            <div class="lg:pl-10">
                <h4 class="mb-10 inline-block border-b border-white/20 pb-2 text-xs font-bold uppercase tracking-[0.3em] text-blue-100">Eksplorasi</h4>
                <ul class="space-y-5">
                    @foreach(['Beranda' => '/', 'Profil Sekolah' => '/profil', 'Sarana & Prasarana' => '/sarana', 'Admisi' => '/admisi'] as $label => $url)
                    <li>
                        <a href="{{ $url }}" wire:navigate class="group flex items-center gap-3 text-[14px] transition-all hover:text-white">
                            <span class="h-1.5 w-1.5 scale-0 rounded-full bg-white transition-transform duration-300 group-hover:scale-100"></span>
                            <span class="opacity-80 group-hover:opacity-100">{{ $label }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="mb-10 inline-block border-b border-white/20 pb-2 text-xs font-bold uppercase tracking-[0.3em] text-blue-100">Jurusan</h4>
                <ul class="space-y-6">
                    @foreach(['DKV' => 'Visual Communication', 'MP' => 'Office Management', 'AK' => 'Accounting'] as $key => $val)
                    <li class="group cursor-pointer">
                        <span class="block text-[14px] font-bold tracking-widest transition-colors group-hover:text-blue-100">{{ $key }}</span>
                        <span class="text-[11px] font-light uppercase tracking-tighter opacity-60">{{ $val }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="mb-4 inline-block border-b border-white/20 pb-2 text-xs font-bold uppercase tracking-[0.3em] text-blue-100">Lokasi Kami</h4>
                <div class="group relative h-48 overflow-hidden rounded-2xl border border-white/20 shadow-2xl transition-all duration-500 hover:scale-[1.02]">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.824244431526!2d106.8016489!3d-6.1542867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6782294f92d%3A0xc3f982142279f92d!2sJl.%20Duri%20Utara%20No.22%2C%20Tambora%2C%20Jakarta%20Barat!5e0!3m2!1sid!2sid!4v1700000000000" 
                        class="absolute inset-0 h-full w-full transition-all duration-700 brightness-100 contrast-100"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
                <p class="text-[13px] font-medium leading-relaxed opacity-80">
                    Jl. Duri Utara No.22, RT.2/RW.6, Kec. Tambora, Jakarta Barat, 11270
                </p>
            </div>
        </div>

        <div class="mt-20 flex flex-col items-center justify-between gap-6 border-t border-white/10 pt-8 text-[10px] font-medium uppercase tracking-[0.2em] text-blue-100/50 md:flex-row">
            <p>© {{ date('Y') }} SMK PELITA. All rights reserved.</p>
            <div class="flex gap-8">
                <a href="#" class="transition-colors hover:text-white">Privacy Policy</a>
                <a href="#" class="transition-colors hover:text-white">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>