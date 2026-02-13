<section class="mb-32" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">
        <h4 class="text-center text-slate-500 font-bold uppercase tracking-widest text-sm mb-12">
            Bekerja Sama Dengan
        </h4>
        
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
            @php
                $partners = ['bca.png', 
                            'bjb.png', 
                            'nestle.png', 
                            'tsm.png', 
                            'wings.png',
                            'amazone.png',
                            'podomoro.png',
                            'ukrida.png',
                            'newton.png',
                            'bri.png'];
            @endphp

            @foreach($partners as $logo)
                <div class="group flex items-center justify-center w-32 h-20 md:w-48 md:h-24">
                    <img 
                        src="{{ asset('image/logo/partner/' . $logo) }}" 
                        alt="Partner Logo" 
                        class="max-h-full max-w-full
                            grayscale opacity-30
                            group-hover:grayscale-0 group-hover:opacity-100
                            transition-all duration-500 ease-in-out"
                        loading="lazy"
                    >
                </div>
            @endforeach
        </div>
    </div>
</section>