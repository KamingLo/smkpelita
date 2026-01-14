<nav x-data="{ 
        scrolled: false, 
        mobileMenu: false 
    }" 
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    class="fixed top-0 w-full z-[100] font-light text-white transition-all duration-500"
>
    <div :class="(scrolled || mobileMenu) ? 'bg-blue-950/95 backdrop-blur-xl py-3' : 'bg-transparent py-6'"
         class="absolute inset-0 transition-all duration-700 ease-in-out -z-10"></div>

    <div class="max-w-[1500px] mx-auto px-6 lg:px-10 relative">
        <div :class="(scrolled || mobileMenu) ? 'py-2' : 'py-5'" class="flex justify-between items-center relative transition-all duration-700">
            
            <a href="/" wire:navigate class="flex items-center gap-4 group relative z-[150]">
                <img src="{{ asset('image/logo/logo_pelita.png') }}" class="h-10 w-auto transition-transform duration-700 group-hover:scale-105">
                <div class="hidden xl:flex flex-col border-l border-white/10 pl-4 space-y-0.5">
                    <span class="text-lg font-medium tracking-[0.2em] leading-none uppercase">PELITA</span>
                    <span class="text-[8px] font-extralight tracking-[0.3em] text-blue-400 opacity-70 uppercase italic">Jakarta Barat</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center space-x-6 xl:space-x-8">
                @foreach($navItems as $label => $url)
                    <a href="{{ $url }}" wire:navigate 
                       class="relative text-[11px] xl:text-[13px] uppercase tracking-[0.15em] group transition-all duration-500 {{ request()->is(trim($url, '/').'*') ? 'text-blue-300' : '' }}">
                        <span class="opacity-80 group-hover:opacity-100 group-hover:text-blue-300 transition-all">{{ $label }}</span>
                        
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-blue-400 transition-all duration-500 group-hover:w-full {{ request()->is(trim($url, '/').'*') ? 'w-full' : '' }}"></span>
                    </a>
                @endforeach
                
                <a href="/admisi" wire:navigate class="ml-4 px-6 py-2.5 rounded-full border border-white/20 text-[10px] uppercase tracking-[0.2em] font-medium hover:bg-white hover:text-blue-950 transition-all duration-500 shadow-lg shadow-black/5">
                    Admisi
                </a>
            </div>

            <div class="lg:hidden relative z-[200]">
                <button type="button" @click="mobileMenu = !mobileMenu" class="focus:outline-none p-2">
                    <div class="w-7 h-4 relative flex flex-col justify-between">
                        <span :class="mobileMenu ? 'rotate-45 translate-y-[7px]' : ''" class="w-full h-[1.5px] bg-white transition-all duration-500"></span>
                        <span :class="mobileMenu ? 'opacity-0' : ''" class="w-full h-[1.5px] bg-white transition-all duration-500"></span>
                        <span :class="mobileMenu ? '-rotate-45 -translate-y-[7px]' : ''" class="w-full h-[1.5px] bg-white transition-all duration-500"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <div x-show="mobileMenu" 
         x-transition:enter="transition transform duration-500"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform duration-500"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed inset-0 z-[160] lg:hidden bg-blue-950 flex flex-col items-center justify-center p-8">
        
        <div class="flex flex-col space-y-8 text-center w-full">
            @foreach($navItems as $label => $url)
                <a href="{{ $url }}" wire:navigate @click="mobileMenu = false" class="text-2xl font-light tracking-widest text-white hover:text-blue-400 transition-all">
                    {{ $label }}
                </a>
            @endforeach
            
            <div class="pt-8 border-t border-white/10">
                <a href="/admisi" wire:navigate @click="mobileMenu = false" class="inline-block px-8 py-3 border border-white/20 rounded-full text-sm tracking-widest uppercase text-white">
                    Admisi
                </a>
            </div>
        </div>
    </div>
</nav>