<x-layout>
        <x-grid>
@foreach ($products as $product)
    <x-card :product="$product"></x-card>
@endforeach
    </x-grid>
</x-layout>