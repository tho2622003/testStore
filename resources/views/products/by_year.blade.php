<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('year');
        @endphp
        @foreach ($groupedProducts as $year => $yearProducts)
            <h2 class="col-span-full text-2xl font-bold mb-4">{{ $year }}</h2>
            @foreach ($yearProducts as $product)
                <x-card :product="$product"></x-card>
            @endforeach
        @endforeach
    </x-grid>
</x-layout>