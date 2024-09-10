<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('genre');
        @endphp
        @foreach ($groupedProducts as $genre => $genreProducts)
        <div class="col-span-full">
            <div class="flex justify-between">
                <x-heading>{{ $genre }}</x-heading>
                <h1 class="text-lg">{{count($genreProducts)}} entries</h1>
            </div>
        </div>
        @foreach ($genreProducts as $product)
        <x-card :product="$product"></x-card>
        @endforeach
        @endforeach
    </x-grid>
</x-layout>