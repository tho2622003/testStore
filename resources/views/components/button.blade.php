@php
    $defaultClasses = "inline-flex justify-center rounded-md bg-[#1976d2] p-3 font-medium text-white hover:bg-[#4188d6] focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75 transition-color duration-300";
    $mergedClasses = $attributes->merge(['class' => $defaultClasses]);
@endphp
<div class="flex items-center justify-center">
    <button type="submit" {{ $mergedClasses }}>
        {{ $slot }}
    </button>
</div>