<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('year');
        @endphp
        @foreach ($groupedProducts as $year => $yearProducts)
            <div class="col-span-full">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold mb-2">{{ $year }}</h2>
                    <h1 class="text-lg mb-4">{{count($yearProducts)}} entries</h1>
                </div>
            </div>
            @foreach ($yearProducts as $product)
                <x-card :product="$product"></x-card>
            @endforeach
        @endforeach
    </x-grid>
</x-layout>