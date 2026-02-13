<nav x-data="{ 
        scrolled: false, 
        mobileMenu: false,
        mobileDropdown: null 
    }" 
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    class="fixed top-0 w-full z-[100] font-light text-white transition-all duration-500"
>
    <div :class="(scrolled || mobileMenu) ? 'bg-blue-600/70 backdrop-blur-2xl py-2 shadow-lg' : 'bg-transparent py-6'"
         class="absolute inset-0 transition-all duration-700 ease-in-out -z-10"></div>

    <div class="max-w-[1500px] mx-auto px-6 md:px-10 relative">
        <div :class="(scrolled || mobileMenu) ? 'py-2' : 'py-6'" class="flex justify-between items-center relative transition-all duration-700">
            
            <a href="/" wire:navigate class="flex items-center gap-3 md:gap-5 group relative z-[150]">
                <!-- v1 -->
                <img src="{{ asset('image/logo/logo_pelita.webp') }}" 
                     class="h-10 md:h-12 lg:h-16 w-auto transition-transform duration-700 group-hover:scale-105">
                
                <div class="hidden sm:flex flex-col border-l-2 border-white/20 pl-3 md:pl-5 space-y-0.5">
                    <span class="text-lg md:text-xl font-medium leading-none">SMK Pelita IV</span>
                    <span class="text-xs md:text-base font-base text-blue-100 opacity-90">Jakarta Barat</span>
                </div>

                <!-- v2 -->
                <!-- <img src="{{ asset('image/logo/logo_pelita_project.webp') }}" 
                     class="h-6 md:h-8 w-auto transition-transform duration-700 group-hover:scale-105"> -->
            </a>

            <div class="hidden lg:flex items-center space-x-6 xl:space-x-10">
                @foreach($navItems as $label => $url)
                    @if(is_array($url))
                        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative py-4">
                            <button class="relative text-[13px] xl:text-[15px] uppercase tracking-[0.1em] group flex items-center gap-1 transition-all duration-500 text-blue-50/80 hover:text-white">
                                <span>{{ $label }}</span>
                                <svg class="w-3 h-3 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                <span class="absolute -bottom-1 left-0 h-[2px] bg-white transition-all duration-500 w-0 group-hover:w-full"></span>
                            </button>

                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 -translate-y-4"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-4"
                                 class="absolute left-0 mt-1 w-64 bg-blue-600/95 backdrop-blur-xl rounded-xl shadow-2xl overflow-hidden py-2 border border-white/10"
                                 style="display: none;">
                                @foreach($url as $subLabel => $subUrl)
                                    <a href="{{ $subUrl }}" wire:navigate class="block px-6 py-3 text-[13px] uppercase tracking-wider text-blue-50 hover:bg-white/10 hover:text-white transition-all">
                                        {{ $subLabel }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        @php $isActive = ($url === '/' && request()->is('/')) || (request()->is(trim($url, '/').'*') && $url !== '/'); @endphp
                        <a href="{{ $url }}" wire:navigate 
                           class="relative text-[13px] xl:text-[15px] uppercase tracking-[0.1em] group transition-all duration-500 {{ $isActive ? 'text-white font-semibold' : 'text-blue-50/80' }}">
                            <span class="group-hover:text-white transition-all">{{ $label }}</span>
                            <span class="absolute -bottom-1 left-0 h-[2px] bg-white transition-all duration-500 {{ $isActive ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                        </a>
                    @endif
                @endforeach
                
                <a href="/admisi" wire:navigate class="ml-4 px-6 xl:px-8 py-2.5 rounded-full bg-white text-blue-600 text-[11px] uppercase tracking-[0.2em] font-bold border border-white hover:bg-transparent hover:text-white transition-all duration-500 shadow-lg">
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
         x-transition:enter-start="opacity-0 -translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition transform duration-500"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 -translate-x-full"
         class="fixed inset-0 z-[160] lg:hidden bg-blue-600 flex flex-col p-8 md:p-20 pt-10 overflow-y-auto"
         style="display: none;">
        
        <div class="flex items-center gap-4 mb-12 border-b border-white/10 pb-8">
            <img src="{{ asset('image/logo/logo_pelita.png') }}" class="h-16 md:h-20 w-auto">
            <div class="flex flex-col">
                <span class="text-2xl md:text-3xl font-bold leading-tight uppercase tracking-tight">SMK Pelita IV</span>
                <span class="text-sm md:text-lg text-blue-100 opacity-80 uppercase tracking-[0.2em]">Jakarta Barat</span>
            </div>
        </div>

        <div class="flex flex-col space-y-6 w-full">
            @foreach($navItems as $label => $url)
                @if(is_array($url))
                    <div class="flex flex-col items-start w-full border-b border-white/10 pb-4">
                        <button @click="mobileDropdown === '{{ $label }}' ? mobileDropdown = null : mobileDropdown = '{{ $label }}'" 
                                class="text-3xl md:text-5xl font-medium tracking-[0.1em] text-white flex items-center justify-between w-full uppercase">
                            <span>{{ $label }}</span>
                            <svg class="w-6 h-6 md:w-10 md:h-10 transition-transform duration-300" :class="mobileDropdown === '{{ $label }}' ? 'rotate-180 text-white' : 'text-white/40'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="mobileDropdown === '{{ $label }}'" x-collapse class="mt-6 flex flex-col space-y-6 border-l-2 border-white/20 ml-1 pl-8 w-full text-left">
                            @foreach($url as $subLabel => $subUrl)
                                <a href="{{ $subUrl }}" wire:navigate @click="mobileMenu = false" class="text-xl md:text-3xl text-blue-100 uppercase tracking-widest hover:text-white transition-colors">
                                    {{ $subLabel }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $url }}" wire:navigate @click="mobileMenu = false" 
                       class="text-3xl md:text-5xl font-medium tracking-[0.1em] text-white hover:text-blue-100 transition-all uppercase text-left border-b border-white/10 pb-4 w-full block">
                        {{ $label }}
                    </a>
                @endif
            @endforeach
            
            <div class="pt-8">
                <a href="/admisi" wire:navigate @click="mobileMenu = false" 
                   class="inline-block w-full px-12 py-5 bg-white text-center text-blue-600 border-2 uppercase rounded-full md:text-xl font-bold border-white hover:bg-transparent hover:text-white transition-all duration-300">
                    Admisi Sekarang
                </a>
            </div>
        </div>
    </div>
</nav>