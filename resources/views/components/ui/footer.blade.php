<footer class="relative overflow-hidden border-t border-white/10 bg-blue-800 font-normal text-white backdrop-blur-3xl">
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-blue-500/20 blur-[120px]"></div>
    <div class="absolute -bottom-24 -right-24 h-96 w-96 rounded-full bg-indigo-500/20 blur-[120px]"></div>

    <div class="relative z-10 mx-auto max-w-[1500px] px-6 py-20 lg:px-10">
        <div class="grid grid-cols-1 gap-16 md:grid-cols-2 lg:grid-cols-4 lg:gap-12">
            
            <div class="space-y-8">
                <a href="/" wire:navigate class="flex items-center gap-5 group inline-flex">
                    <img src="{{ asset('image/logo/logo_pelita.webp') }}" 
                         class="h-16 w-auto">
                    
                    <div class="flex flex-col border-l-2 border-white/30 pl-5 space-y-0.5 transition-colors group-hover:border-white/60">
                        <span class="text-2xl font-semibold">SMK Pelita IV</span>
                        <span class="text-md text-blue-300">Jakarta Barat</span>
                    </div>
                </a>
                
                <p class="max-w-sm text-base leading-relaxed text-blue-50/90 italic">
                    "Membentuk generasi cerdas, berkarakter, dan siap menghadapi tantangan masa depan dengan integritas tinggi."
                </p>

                <div class="space-y-4">
                    <div class="group flex items-center gap-4 transition-colors hover:text-blue-300">
                        <div class="rounded-xl bg-white/10 p-2.5 transition-all duration-300 group-hover:bg-white/20 group-hover:scale-110">
                            <svg class="h-5 w-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <span class="text-sm font-semibold">+62 216 314 072</span>
                    </div>
                    <div class="group flex items-center gap-4 transition-colors hover:text-blue-300">
                        <div class="rounded-xl bg-white/10 p-2.5 transition-all duration-300 group-hover:bg-white/20 group-hover:scale-110">
                            <svg class="h-5 w-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <span class="text-sm font-medium">pelitaschool4@gmail.com</span>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="mb-10 inline-block border-b-2 border-blue-400 pb-2 text-lg font-bold text-white">Eksplorasi</h4>
                <ul class="space-y-4">
                    @foreach(['Beranda' => '/', 'Profil Sekolah' => '/profil', 'Sarana & Prasarana' => '/sarana', 'Admisi' => '/admisi'] as $label => $url)
                    <li>
                        <a href="{{ $url }}" wire:navigate class="group flex items-center gap-3 text-sm font-medium text-blue-100 transition-all duration-300 hover:translate-x-2 hover:text-white">
                            <span class="h-1.5 w-0 rounded-full bg-blue-400 transition-all duration-300 group-hover:w-4"></span>
                            <span>{{ $label }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="mb-10 inline-block border-b-2 border-blue-400 pb-2 text-lg font-bold   text-white">Program Keahlian</h4>
                @php
                    $listJurusan = [
                        ['slug' => 'desain-komunikasi-visual', 'nama' => 'Desain Komunikasi Visual'],
                        ['slug' => 'manajemen-perkantoran', 'nama' => 'Manajemen Perkantoran'],
                        ['slug' => 'akuntansi-keuangan', 'nama' => 'Akuntansi Keuangan'],
                    ];
                @endphp
                <ul class="space-y-4">
                    @foreach($listJurusan as $jurusan)
                    <li>
                        <a href="/jurusan/{{ $jurusan['slug'] }}" wire:navigate class="group flex items-center gap-3 text-sm font-medium text-blue-100 transition-all duration-300 hover:translate-x-2 hover:text-white">
                            <span class="h-1.5 w-0 rounded-full bg-blue-400 transition-all duration-300 group-hover:w-4"></span>
                            <span>{{ $jurusan['nama'] }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="mb-4 inline-block border-b-2 border-blue-400 pb-2 text-lg font-bold text-white">Lokasi Kami</h4>
                <div class="group relative h-48 overflow-hidden rounded-2xl border-2 border-white/20 shadow-2xl">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.4059977853215!2d106.80084899650618!3d-6.155928998738957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f613397df46d%3A0x46f8864ca14a91e4!2sSmks%20Pelita%20Iv!5e0!3m2!1sen!2sus!4v1769052638915!5m2!1sen!2sus" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="flex gap-3">
                    <svg class="h-6 w-6 flex-shrink-0 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <p class="text-sm leading-relaxed text-blue-50 font-medium">
                        Jl. Duri Utara No.22, Kec. Tambora, Jakarta Barat, 11270
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-20 flex flex-col items-center justify-between gap-6 border-t border-white/20 pt-8 text-lg text-blue-200/80 md:flex-row">
            <p>© {{ date('Y') }} SMK PELITA. <span class="hidden sm:inline">All rights reserved.</span></p>
            <div class="flex gap-8">
                <a href="#" class="transition-colors hover:text-white hover:underline">Privacy Policy</a>
                <a href="#" class="transition-colors hover:text-white hover:underline">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>