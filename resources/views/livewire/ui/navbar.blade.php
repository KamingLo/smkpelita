<nav x-data="{ 
        scrolled: false, 
        mobileMenu: false 
    }" 
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    class="fixed top-0 w-full z-[100] font-light text-white transition-all duration-500"
>
    <div :class="(scrolled || mobileMenu) ? 'bg-blue-600/70 backdrop-blur-2xl py-2' : 'bg-transparent py-6'"
         class="absolute inset-0 transition-all duration-700 ease-in-out -z-10"></div>

    <div class="max-w-[1500px] mx-auto px-6 lg:px-10 relative">
        <div :class="(scrolled || mobileMenu) ? 'py-1' : 'py-4'" class="flex justify-between items-center relative transition-all duration-700">
            
            <a href="/" wire:navigate class="flex items-center gap-5 group relative z-[150]">
                <img src="{{ asset('image/logo/logo_pelita.png') }}" 
                     class="h-12 lg:h-16 w-auto transition-transform duration-700 group-hover:scale-105">
                
                <div class="hidden xl:flex flex-col border-l-2 border-white/20 pl-5 space-y-0.5">
                    <span class="text-xl font-medium leading-none">SMK Pelita IV</span>
                    <span class="text-base font-base text-blue-100 opacity-90">Jakarta Barat</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center space-x-8 xl:space-x-10">
                @foreach($navItems as $label => $url)
                    @php
                        $isActive = ($url === '/' && request()->is('/')) || (request()->is(trim($url, '/').'*') && $url !== '/');
                    @endphp
                    <a href="{{ $url }}" wire:navigate 
                       class="relative text-[13px] xl:text-[15px] uppercase tracking-[0.1em] group transition-all duration-500 {{ $isActive ? 'text-white font-semibold' : 'text-blue-50/80' }}">
                        <span class="group-hover:text-white transition-all">{{ $label }}</span>
                        
                        <span class="absolute -bottom-2 left-0 h-[2px] bg-white transition-all duration-500 {{ $isActive ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                @endforeach
                
                <a href="/admisi" wire:navigate class="ml-4 px-8 py-2.5 rounded-full border border-white/40 bg-white/10 text-[11px] uppercase tracking-[0.2em] font-bold hover:bg-white hover:text-blue-600 transition-all duration-500 shadow-lg">
                    Admisi
                </a>
            </div>

            <div class="lg:hidden relative z-[200]">
                <button type="button" @click="mobileMenu = !mobileMenu" class="focus:outline-none p-2 text-white">
                    <div class="w-8 h-5 relative flex flex-col justify-between">
                        <span :class="mobileMenu ? 'rotate-45 translate-y-[9px]' : ''" class="w-full h-[2px] bg-white transition-all duration-500"></span>
                        <span :class="mobileMenu ? 'opacity-0' : ''" class="w-full h-[2px] bg-white transition-all duration-500"></span>
                        <span :class="mobileMenu ? '-rotate-45 -translate-y-[9px]' : ''" class="w-full h-[2px] bg-white transition-all duration-500"></span>
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
         class="fixed inset-0 z-[160] lg:hidden bg-blue-600 flex flex-col items-center justify-center p-8">
        
        <div class="flex flex-col space-y-10 text-center w-full">
            @foreach($navItems as $label => $url)
                <a href="{{ $url }}" wire:navigate @click="mobileMenu = false" 
                   class="text-3xl font-medium tracking-[0.1em] text-white hover:text-blue-100 transition-all uppercase">
                    {{ $label }}
                </a>
            @endforeach
            
            <div class="pt-10 border-t border-white/20">
                <a href="/admisi" wire:navigate @click="mobileMenu = false" class="inline-block px-10 py-4 border-2 border-white/50 rounded-full text-sm tracking-widest uppercase text-white font-bold">
                    Admisi
                </a>
            </div>
        </div>
    </div>
</nav>