<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('genre');
        @endphp
        @foreach ($groupedProducts as $genre => $genreProducts)
            <h2 class="col-span-full text-2xl font-bold mb-4">{{ $genre }}</h2>
            @foreach ($genreProducts as $product)
                <x-card :product="$product"></x-card>
            @endforeach
        @endforeach
    </x-grid>
</x-layout>