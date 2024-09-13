<x-layout>
    <x-heading>Search Results:</x-heading>
    <div class="mt-4">
        @if (count($products)==0)
            <h1 class="flex justify-center">No product match your search query.</h1>
        @endif
        <x-grid>
            @foreach ($products as $product)
            <x-card :product="$product"></x-card>
            @endforeach
        </x-grid>
    </div>
</x-layout>