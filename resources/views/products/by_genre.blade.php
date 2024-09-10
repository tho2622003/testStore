<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('genre');
        @endphp
        @foreach ($groupedProducts as $genre => $genreProducts)
        <div class="col-span-full">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold mb-2">{{ $genre }}</h2>
                    <h1 class="text-lg mb-4">{{count($genreProducts)}} entries</h1>
                </div>
            </div>
            @foreach ($genreProducts as $product)
                <x-card :product="$product"></x-card>
            @endforeach
        @endforeach
    </x-grid>
</x-layout>