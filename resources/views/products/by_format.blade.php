<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('format');
        @endphp
        @foreach ($groupedProducts as $format => $formatProducts)
            <h2 class="col-span-full text-2xl font-bold mb-4">{{ $format }}</h2>
            @foreach ($formatProducts as $product)
                <x-card :product="$product"></x-card>
            @endforeach
        @endforeach
    </x-grid>
</x-layout>