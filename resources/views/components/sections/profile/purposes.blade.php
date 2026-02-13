<div class="mb-32 mt-16" data-aos="fade-up">
        
    <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 max-w-7xl mx-auto px-6 items-start">
        
        <div class="lg:col-span-6">
            <span class="text-blue-600 font-bold tracking-[0.2em] uppercase text-[11px] mb-4 block">Filosofi Pendidikan</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight mb-8">
                Keahlian Profesional,<br>
                Kematangan Karakter
            </h2>
            
            <div class="space-y-6">
                <p class="text-xl md:text-xl text-slate-800 leading-relaxed">
                    SMK Pelita IV berkomitmen menghadirkan ekosistem Sekolah Ramah Anak (SRA) yang terintegrasi. Kami meyakini bahwa penguasaan teknologi dan keterampilan vokasi akan mencapai titik optimal saat siswa bertumbuh dalam lingkungan yang aman, dihargai, dan suportif.
                </p>
                <div class="pt-6 border-l-2 border-blue-600 pl-6">
                    <p class="text-slate-500 italic text-lg leading-relaxed">
                        "Misi kami melampaui sekadar mencetak tenaga kerja; kami membentuk pribadi mandiri yang memiliki kecerdasan ekonomi sekaligus kepekaan nurani terhadap sesama."
                    </p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-6 pt-2">
            @php
                $outcomes = [
                    [
                        'tag' => 'Inclusion & Safety',
                        'title' => 'Ekosistem Belajar Inklusif',
                        'desc' => 'Mewujudkan ruang edukasi bebas perundungan (anti-bullying) di mana setiap bakat kejuruan diapresiasi melalui pendekatan disiplin positif dan kasih.'
                    ],
                    [
                        'tag' => 'Industry Excellence',
                        'title' => 'Kompetensi Terstandardisasi',
                        'desc' => 'Menyelaraskan keahlian teknis siswa dengan standar industri global terkini melalui praktik nyata yang terukur, sistematis, dan terbimbing.'
                    ],
                    [
                        'tag' => 'Empowered Future',
                        'title' => 'Kesiapan Karier & Mandiri',
                        'desc' => 'Membekali lulusan dengan kesiapan mental dan keterampilan untuk berkarier profesional, melanjutkan studi ke jenjang tinggi, maupun membangun wirausaha etis.'
                    ]
                ];
            @endphp

            @foreach($outcomes as $item)
                <div class="group mb-10">
                    <div class="flex flex-col gap-2 mb-3">
                        <span class="text-blue-500 text-[10px] font-bold uppercase tracking-widest">
                            {{ $item['tag'] }}
                        </span>
                        <h4 class="text-xl font-bold text-slate-900 tracking-tight">
                            {{ $item['title'] }}
                        </h4>
                    </div>
                    <p class="text-slate-600 leading-relaxed text-base md:text-lg font-normal">
                        {{ $item['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</div>