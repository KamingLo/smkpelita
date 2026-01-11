<section class="mt-16 mb-32">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-20 text-center md:text-left" data-aos="fade-up">
            <h3 class="text-4xl font-bold text-slate-900 tracking-tight">Metode Pembelajaran</h3>
            <div class="w-20 h-1.5 bg-blue-600 mt-4 rounded-full mx-auto md:mx-0"></div>
            <p class="text-slate-600 mt-6 text-lg max-w-xl">Pendekatan harmonis untuk mencetak lulusan yang seimbang secara intelektual dan spiritual.</p>
        </div>

        @php
            $methodologies = [
                [
                    'title' => 'Iman & Karakter',
                    'desc' => 'Menjadikan nilai-nilai kristiani sebagai fondasi utama dalam setiap aspek kehidupan dan proses belajar mengajar.',
                    'color' => 'text-blue-600',
                    'delay' => '100',
                    'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'
                ],
                [
                    'title' => 'Akademik Holistik',
                    'desc' => 'Kurikulum nasional yang diperkaya dengan pengembangan minat dan bakat melalui kegiatan ekstrakurikuler yang beragam.',
                    'color' => 'text-blue-500',
                    'delay' => '200',
                    'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'
                ],
                [
                    'title' => 'Kesiapan Masa Depan',
                    'desc' => 'Membekali siswa dengan literasi digital dan keterampilan abad 21 agar siap menghadapi tantangan zaman.',
                    'color' => 'text-blue-400',
                    'delay' => '300',
                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'
                ]
            ];
        @endphp

        <div class="grid md:grid-cols-3 gap-16">
            @foreach($methodologies as $method)
                <div class="group flex flex-col items-start" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $method['delay'] }}">
                    
                    <div class="mb-6 transition-all duration-500 group-hover:scale-110">
                        <svg class="w-14 h-14 {{ $method['color'] }} opacity-90 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="{{ $method['icon'] }}" />
                        </svg>
                    </div>

                    <div class="relative mb-4">
                        <h4 class="text-2xl font-bold text-slate-900 tracking-tight transition-colors duration-300 group-hover:text-blue-600">
                            {{ $method['title'] }}
                        </h4>
                        <div class="absolute -bottom-1 left-0 w-8 h-0.5 bg-blue-600 transition-all duration-500 group-hover:w-full"></div>
                    </div>
                    
                    <p class="text-slate-600 font-normal leading-relaxed text-lg opacity-85 transition-opacity duration-300 group-hover:opacity-100">
                        {{ $method['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>