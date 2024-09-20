@props(["href"=>"/"])

<div class="flex items-center justify-center">
    <a href="{{$href}}" class="inline-flex justify-center rounded-md bg-[#1976d2] p-3 font-medium text-white hover:bg-[#4188d6] focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75 transition-color duration-300">
        {{$slot}}
    </a>
</div>