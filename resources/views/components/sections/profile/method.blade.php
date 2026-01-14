<section class="mt-16 mb-32">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-20 text-center md:text-left" data-aos="fade-up">
            <h3 class="text-4xl font-bold text-slate-900 tracking-tight">Metode Pembelajaran SMK</h3>
            <div class="w-20 h-1.5 bg-blue-600 mt-4 rounded-full mx-auto md:mx-0"></div>
            <p class="text-slate-600 mt-6 text-lg max-w-xl">
                Pendekatan inovatif yang menggabungkan kompetensi teknis industri dengan lingkungan belajar yang inklusif dan ramah anak.
            </p>
        </div>

        @php
            $methodologies = [
                [
                    'title' => 'Project-Based Learning',
                    'desc' => 'Siswa belajar melalui praktik nyata yang relevan dengan kebutuhan industri, didampingi guru yang berperan sebagai mentor yang sabar dan membimbing.',
                    'color' => 'text-blue-600',
                    'delay' => '100',
                    // Icon: Briefcase/Tools
                    'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745V20a2 2 0 002 2h14a2 2 0 002-2v-6.745zM16 8V5a2 2 0 00-2-2H10a2 2 0 00-2 2v3m4 7v2m-2-2H6.5a1 1 0 01-1-1V8.5a1 1 0 011-1h11a1 1 0 011 1V14a1 1 0 01-1 1H12z'
                ],
                [
                    'title' => 'Disiplin Positif',
                    'desc' => 'Menerapkan lingkungan ramah anak dengan kedisiplinan tanpa kekerasan, membangun karakter profesional melalui dialog dan saling menghargai.',
                    'color' => 'text-blue-500',
                    'delay' => '200',
                    // Icon: Heart/Shield
                    'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'
                ],
                [
                    'title' => 'Link & Match Industri',
                    'desc' => 'Penyelarasan kurikulum dengan mitra dunia kerja, memastikan setiap materi yang diajarkan siap diaplikasikan saat siswa lulus nanti.',
                    'color' => 'text-blue-400',
                    'delay' => '300',
                    // Icon: Connection/Links
                    'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1'
                ]
            ];
        @endphp

        <div class="grid md:grid-cols-3 gap-16">
            @foreach($methodologies as $method)
                <div class="group flex flex-col items-start" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $method['delay'] }}">
                    
                    <div class="mb-6 transition-all duration-500 group-hover:scale-110">
                        <svg class="w-14 h-14 {{ $method['color'] }} opacity-90 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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