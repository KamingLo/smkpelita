<section id="admission" class="py-24 bg-white px-6">
    <div class="max-w-7xl mx-auto">
        <div class="relative bg-blue-950 rounded-[3rem] overflow-hidden shadow-2xl">
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-400/10 rounded-full ml-20 mb-20 blur-2xl"></div>
            <div class="absolute top-0 right-0 w-48 h-48 bg-blue-600/10 rounded-full -mr-10 -mt-10 blur-xl"></div>

            <div class="relative z-10 grid lg:grid-cols-2 gap-12 p-8 md:p-16 lg:p-20 items-center">
                
                <div data-aos="fade-right">
                    <span class="inline-block px-4 py-2 bg-blue-500/20 text-blue-300 rounded-full text-xs font-bold uppercase tracking-widest mb-6">
                        Penerimaan Siswa Baru {{ date('Y') }}/{{ date('Y') + 1 }}
                    </span>
                    <h2 class="text-white text-4xl md:text-6xl font-bold tracking-tighter mb-6 leading-[1.1]">
                        Ingin Tahu Cara <br> Mendaftar?
                    </h2>
                    <p class="text-blue-100/80 text-lg md:text-xl font-light leading-relaxed mb-8">
                        Kami telah menyiapkan panduan lengkap mengenai prosedur pendaftaran, jadwal observasi, hingga rincian persyaratan untuk mempermudah langkah Anda bergabung bersama keluarga besar Pelita IV.
                    </p>
                    
                    <div class="space-y-4 mb-8 md:mb-0">
                        <div class="flex items-center text-blue-200">
                            <div class="w-6 h-6 rounded-full bg-blue-500/20 flex items-center justify-center mr-3">
                                <svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-sm md:text-base">Panduan Lengkap Alur Pendaftaran</span>
                        </div>
                        <div class="flex items-center text-blue-200">
                            <div class="w-6 h-6 rounded-full bg-blue-500/20 flex items-center justify-center mr-3">
                                <svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-sm md:text-base">Konsultasi Personal Tim Admisi</span>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-delay="200">
                    <a href="/admisi" wire:navigate class="group block relative bg-white p-8 md:p-12 rounded-[2.5rem] shadow-2xl transition-all duration-500 hover:-translate-y-2 hover:shadow-blue-500/20">

                        <h3 class="text-3xl font-bold text-slate-900 mb-2">Informasi Admisi</h3>
                        <p class="text-slate-500 mb-8 font-light">Lihat prosedur pendaftaran dan rincian biaya selengkapnya di sini.</p>
                        
                        <div class="flex items-center justify-between bg-slate-50 p-6 rounded-2xl border border-slate-100 group-hover:border-blue-200 group-hover:bg-blue-50/30 transition-all duration-500">
                            <span class="text-blue-600 font-bold uppercase tracking-widest text-sm">Pelajari Selengkapnya</span>
                            <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </div>
                        </div>

                        <div class="mt-8 flex items-center justify-center space-x-2 text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span>Konsultasi Online Tersedia</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>