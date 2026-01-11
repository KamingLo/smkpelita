<nav x-data="{ 
        scrolled: false, 
        mobileMenu: false 
    }" 
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    class="fixed top-0 w-full z-[100] font-light tracking-widest text-white transition-all duration-500"
>
    <div :class="(scrolled || mobileMenu) ? 'bg-blue-950/95 backdrop-blur-xl py-3' : 'bg-transparent py-8'"
         class="absolute inset-0 transition-all duration-700 ease-in-out -z-10"></div>

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16 relative">
        <div :class="(scrolled || mobileMenu) ? 'py-3' : 'py-8'" class="flex justify-between items-center relative transition-all duration-700">
            
            <a href="/" wire:navigate class="flex items-center gap-6 group relative z-[150]">
                <img src="{{ asset('image/logo/logo_pelita.png') }}" class="h-10 w-auto transition-transform duration-700 group-hover:scale-105">
                <div class="hidden sm:flex flex-col border-l border-white/10 pl-6 space-y-1">
                    <span class="text-xl font-medium tracking-[0.3em] leading-none uppercase">PELITA</span>
                    <span class="text-[9px] font-extralight tracking-[0.5em] text-blue-400 opacity-70 uppercase italic">Jakarta Barat</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center space-x-12">
                @foreach($navItems as $label => $url)
                    <a href="{{ $url }}" wire:navigate class="relative text-base font-light uppercase group transition-all duration-500">
                        <span class="opacity-70 group-hover:opacity-100 group-hover:text-blue-300 transition-all">{{ $label }}</span>
                        <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-1 h-1 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500"></span>
                    </a>
                @endforeach
                
                <a href="/admisi" wire:navigate class="px-8 py-3 rounded-full border border-white/20 text-sm uppercase tracking-[0.3em] hover:bg-white hover:text-blue-950 transition-all duration-500 ">
                    Daftar Sekarang
                </a>
            </div>

            <div class="lg:hidden relative z-[200]">
                <button type="button" @click="mobileMenu = !mobileMenu" class="focus:outline-none p-4 -mr-4 bg-transparent touch-manipulation">
                    <div class="w-8 h-4 relative flex flex-col justify-between pointer-events-none">
                        <span :class="mobileMenu ? 'rotate-45 translate-y-[7.5px]' : ''" class="w-full h-[2px] bg-white transition-all duration-500"></span>
                        <span :class="mobileMenu ? 'opacity-0' : ''" class="w-full h-[2px] bg-white transition-all duration-500"></span>
                        <span :class="mobileMenu ? '-rotate-45 -translate-y-[7.5px]' : ''" class="w-full h-[2px] bg-white transition-all duration-500"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <template x-if="mobileMenu">
        <div x-show="mobileMenu" 
             x-transition:enter="transition opacity duration-300"
             x-transition:leave="transition opacity duration-300"
             class="fixed inset-0 z-[160] lg:hidden bg-blue-950 flex flex-col items-center justify-center p-8">
            
            <div class="flex flex-col space-y-10 text-center w-full">
                @foreach($navItems as $label => $url)
                    <a href="{{ $url }}" wire:navigate @click="mobileMenu = false" class="text-4xl font-medium text-white hover:text-blue-400 transition-all ease-in-out">
                        {{ $label }}
                    </a>
                @endforeach
                
                <div class="pt-10 border-t border-white/10">
                    <a href="/admisi" wire:navigate @click="mobileMenu = false" class="inline-block px-10 py-4 border border-white/20 rounded-full text-lg tracking-[0.3em] uppercase font-bold italic text-white hover:bg-white hover:text-blue-950 transition-all">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </template>
</nav>