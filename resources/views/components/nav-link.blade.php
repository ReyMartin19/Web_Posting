@props(['active' => false])
<a 
    {{ $attributes->merge([
        'class' => $active 
            ? 'bg-gray-950/50 text-white' 
            : 'text-gray-300 hover:bg-white/5 hover:text-white']) }}
    >{{ $slot }}    
</a>    