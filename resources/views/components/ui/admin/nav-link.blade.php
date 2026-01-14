@props(['active', 'href'])

<a href="{{ $href }}" 
   {{ $attributes->merge(['class' => 'flex items-center px-4 py-3.5 text-[11px] font-bold uppercase tracking-widest rounded-xl transition-all duration-300 group ' . 
   ($active 
        ? 'bg-white text-blue-600 shadow-sm border border-gray-200' 
        : 'text-gray-500 hover:bg-gray-200 hover:text-gray-900')]) }}>
    
    {{ $slot }}
</a>