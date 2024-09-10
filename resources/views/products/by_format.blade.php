<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('format');
        @endphp
        @foreach ($groupedProducts as $format => $formatProducts)
        <div class="col-span-full">
            <div class="flex justify-between">
                <x-heading>{{ $format }}</x-heading>
                <h1 class="text-lg">{{count($formatProducts)}} entries</h1>
            </div>
        </div>
        @foreach ($formatProducts as $product)
        <x-card :product="$product"></x-card>
        @endforeach
        @endforeach
    </x-grid>
</x-layout>