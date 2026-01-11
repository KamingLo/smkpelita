<section class="py-24">
    <div class="grid lg:grid-cols-2 gap-20 items-center">
        
        <div data-aos="fade-right">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-[2px] bg-blue-600 rounded-full"></div>
                <span class="text-blue-600 text-xs font-bold">Future Aspirations</span>
            </div>
            
            <h2 class="text-5xl md:text-7xl font-black text-slate-900 tracking-tighter mb-8">
                Menjadi Versi Terbaik.
            </h2>
            
            <p class="text-slate-600 text-xl leading-relaxed mb-10 font-light">
                Kami percaya setiap anak memiliki panggilan unik. Di sini, murid tidak hanya belajar untuk ujian, tetapi dibentuk untuk memiliki ketajaman intelektual dan kedalaman karakter.
            </p>

            <div class="bg-white p-8 border-l-8 border-blue-600 shadow-sm rounded-2xl overflow-hidden">
                <p class="text-slate-800 italic text-lg">
                    "Harapan kami adalah setiap lulusan melangkah keluar dengan iman yang teguh, ilmu yang mumpuni, dan hati yang siap melayani sesama."
                </p>
            </div>
        </div>

        <div class="grid gap-6" data-aos="fade-left">
            @php
                $outcomes = [
                    [
                        'tag' => 'Spiritual',
                        'title' => 'Iman yang Berakar',
                        'desc' => 'Murid memiliki fondasi rohani yang kuat dan mampu menerapkan nilai kasih dalam kehidupan sehari-hari.'
                    ],
                    [
                        'tag' => 'Intellectual',
                        'title' => 'Pemikiran Kritis',
                        'desc' => 'Mampu menganalisis tantangan zaman dengan logika yang sehat dan solusi yang inovatif.'
                    ],
                    [
                        'tag' => 'Social',
                        'title' => 'Kepemimpinan Melayani',
                        'desc' => 'Menjadi pemimpin yang tidak mencari kuasa, melainkan menginspirasi melalui dedikasi dan empati.'
                    ]
                ];
            @endphp

            @foreach($outcomes as $item)
                <div class="group bg-white p-8 rounded-2xl transition-all duration-500 hover:shadow-xl hover:-translate-y-1">
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