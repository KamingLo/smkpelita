<x-layouts.app>
    <x-slot:title>Pendaftaran SMK Pelita IV | Sekolah Ramah Anak & Berprestasi</x-slot:title>
    <x-slot:description>Informasi pendaftaran dan admisi SMK Pelita IV. Mari bergabung menjadi generasi yang terampil, mandiri, dan berkarakter.</x-slot:description>

    <x-ui.hero-banner
        img="image/assets/school.jpg"
        title="Admisi & Masa Depan"
        desc="Menyambut calon profesional muda dalam lingkungan belajar yang ramah, aman, dan siap membimbing setiap potensi hingga menjadi ahli."
    />

    <section class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="text-center max-w-4xl mx-auto mb-24" data-aos="fade-up">
                <div class="flex justify-center items-center gap-4 mb-6">
                    <span class="h-px w-8 bg-blue-200"></span>
                    <span class="text-blue-600 text-sm font-bold uppercase tracking-[0.2em]">Penerimaan Siswa Baru</span>
                    <span class="h-px w-8 bg-blue-200"></span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold text-slate-900 tracking-tight mb-8">
                    Rancang Masa Depan <span class="text-blue-600 italic">Bersama Kami.</span>
                </h1>
                <p class="text-slate-600 text-xl leading-relaxed font-light">
                    Memasuki jenjang SMK adalah langkah penting menuju kemandirian. Di SMK Pelita IV, kami menyediakan lingkungan Ramah Anak yang memastikan setiap siswa didukung secara emosional sembari mengasah keterampilan teknisnya.
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-16 items-start">
                
                <div class="lg:col-span-8" data-aos="fade-right">
                    <h3 class="text-3xl font-bold text-slate-900 mb-12 flex items-center gap-4">
                        Alur Pendaftaran Humanis
                        <span class="h-px flex-1 bg-slate-100"></span>
                    </h3>
                    
                    @php
                        $steps = [
                            ['01', 'Konsultasi Karat & Minat', 'Bincang santai dengan guru BK kami untuk menentukan jurusan yang paling sesuai dengan passion dan impian karier Anda.'],
                            ['02', 'Kelengkapan Berkas', 'Pengumpulan dokumen pendukung. Kami menghargai setiap latar belakang dan siap mendampingi proses administrasi Anda.'],
                            ['03', 'Eksplorasi & Wawancara Ramah', 'Bukan ujian yang menegangkan, melainkan dialog untuk mengenal potensi dan memastikan sekolah kami bisa menjadi tempat tumbuh yang nyaman bagi Anda.'],
                            ['04', 'Konfirmasi Penerimaan', 'Hasil seleksi dan pemetaan kelas akan diinformasikan secara personal melalui portal pendaftaran atau pesan resmi.'],
                            ['05', 'Inisiasi & Orientasi', 'Masa pengenalan sekolah yang edukatif, menyenangkan, dan bebas dari senioritas maupun perundungan.']
                        ];
                    @endphp

                    <div class="space-y-4">
                        @foreach($steps as $step)
                            <div class="group flex gap-8 p-8 rounded-3xl hover:bg-slate-50 transition-all duration-500">
                                <div class="shrink-0">
                                    <div class="w-14 h-14 bg-white border-2 border-slate-100 text-blue-600 rounded-2xl flex items-center justify-center text-xl font-bold group-hover:bg-blue-600 group-hover:border-blue-600 group-hover:text-white transition-all duration-500 shadow-sm">
                                        {{ $step[0] }}
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <h4 class="text-2xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">{{ $step[1] }}</h4>
                                    <p class="text-slate-600 leading-relaxed text-lg font-light">{{ $step[2] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="lg:col-span-4 sticky top-32" data-aos="fade-up">
                    <div class="bg-blue-50 p-10 rounded-[2.5rem] relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-100 rounded-full opacity-50"></div>
                        
                        <div class="relative">
                            <h3 class="text-2xl font-bold text-slate-900 mb-4">Butuh Bantuan?</h3>
                            <p class="text-slate-600 mb-8 leading-relaxed">
                                Jangan ragu untuk bertanya mengenai beasiswa, rincian biaya, atau fasilitas bengkel praktik kami.
                            </p>
                            
                            <div class="space-y-4">
                                <a href="#" class="flex items-center justify-center gap-3 w-full bg-blue-600 hover:bg-blue-700 text-white py-5 rounded-2xl font-bold transition-all shadow-lg shadow-blue-200">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.891 11.891-11.891 3.181 0 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.402 0 6.556-5.332 11.89-11.892 11.89-2.011 0-3.987-.506-5.741-1.466l-6.154 1.686zm5.95-10.138c.41 1.012.928 1.577 1.577 2.221l.303.303c2.513 2.583 5.702 3.854 9.081 3.854 6.701 0 12.039-5.339 12.039-12.031 0-3.135-1.226-6.084-3.452-8.311-2.226-2.227-5.171-3.45-8.307-3.45-6.699 0-12.037 5.338-12.037 12.03 0 2.22.601 4.389 1.741 6.271l-1.129 4.125 4.172-1.141z"/></svg>
                                    Hubungi Panitia PPDB
                                </a>
                                <a href="#" class="flex items-center justify-center gap-3 w-full bg-white text-slate-900 py-5 rounded-2xl font-bold transition-all hover:bg-slate-50 border border-slate-100">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Unduh Katalog Jurusan
                                </a>
                            </div>

                            <div class="mt-8 p-6 bg-white/50 rounded-2xl border border-white/80">
                                <p class="text-xs text-slate-500 italic text-center">
                                    "Setiap anak berhak mendapatkan pendidikan kejuruan yang bermartabat dan bebas dari intimidasi."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <livewire:ui.faq>
</x-layouts.app>