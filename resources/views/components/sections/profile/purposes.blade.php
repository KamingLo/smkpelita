<section class="py-24">
    <div class="grid lg:grid-cols-2 gap-20 items-center">
        
        <div data-aos="fade-right">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-[2px] bg-blue-600 rounded-full"></div>
                <span class="text-blue-600 text-xs font-bold uppercase tracking-widest">Masa Depan Vokasi</span>
            </div>
            
            <h2 class="text-5xl md:text-7xl font-black text-slate-900 tracking-tighter mb-8">
                Ahli di Bidang, <br><span class="text-blue-600">Santun di Hati.</span>
            </h2>
            
            <p class="text-slate-600 text-xl leading-relaxed mb-10 font-light">
                SMK Pelita IV berkomitmen menciptakan lingkungan <strong>Sekolah Ramah Anak (SRA)</strong>. Kami percaya bahwa keterampilan teknis akan berkembang maksimal saat siswa merasa aman, dihargai, dan tumbuh tanpa tekanan dalam atmosfer yang penuh kekeluargaan.
            </p>

            <div class="bg-white p-8 border-l-8 border-blue-600 shadow-sm rounded-2xl overflow-hidden">
                <p class="text-slate-800 italic text-lg">
                    "Tujuan kami bukan sekadar mencetak operator mesin atau ahli komputer, melainkan pribadi yang mandiri secara ekonomi dan memiliki kepekaan nurani terhadap sesama."
                </p>
            </div>
        </div>

        <div class="grid gap-6" data-aos="fade-left">
            @php
                $outcomes = [
                    [
                        'tag' => 'Safe Environment',
                        'title' => 'Sekolah Ramah Anak',
                        'desc' => 'Menjamin ruang belajar bebas perundungan (anti-bullying) di mana setiap bakat kejuruan diapresiasi dengan kasih.'
                    ],
                    [
                        'tag' => 'Professionalism',
                        'title' => 'Keahlian Teruji',
                        'desc' => 'Menguasai kompetensi sesuai standar industri melalui praktik nyata yang menantang namun tetap terbimbing.'
                    ],
                    [
                        'tag' => 'Career Ready',
                        'title' => 'Kesiapan Mandiri',
                        'desc' => 'Mempersiapkan lulusan yang siap langsung bekerja, melanjutkan kuliah, maupun berwirausaha secara etis.'
                    ]
                ];
            @endphp

            @foreach($outcomes as $item)
                <div class="group bg-white p-8 rounded-2xl transition-all duration-500 hover:shadow-xl hover:-translate-y-1 border border-slate-100">
                    <span class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-2 block">
                        {{ $item['tag'] }}
                    </span>
                    <h4 class="text-2xl font-bold text-slate-900 mb-3 tracking-tight">
                        {{ $item['title'] }}
                    </h4>
                    <p class="text-slate-500 leading-relaxed">
                        {{ $item['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>