<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('format');
        @endphp
        @foreach ($groupedProducts as $format => $formatProducts)
        <div class="col-span-full">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold mb-2">{{ $format }}</h2>
                    <h1 class="text-lg mb-4">{{count($formatProducts)}} entries</h1>
                </div>
            </div>
            @foreach ($formatProducts as $product)
                <x-card :product="$product"></x-card>
            @endforeach
        @endforeach
    </x-grid>
</x-layout>