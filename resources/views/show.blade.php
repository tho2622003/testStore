<x-layout>
    <x-flex>
        <img class="rounded-lg" src="{{$product->cover_lg}}">
        <div class="flex flex-col">
            <div class="bg-gray-800 p-8 text-md shadow-lg w-full max-w-md">
                <span class="block">Title: {{$product->title}}</span>
                <span class="block">Artist: {{$product->artist}}</span>
                <span class="block">Date of Release: {{$product->date}}</span>
                <span class="block">Genre: {{$product->genre}}</span>
                <span class="block">Format: {{$product->format}}</span>
            </div>
            <div class="pt-8">
                @auth
                @can('update', $product)
                <x-anchor href="{{ route('product.edit', $product) }}">Edit</x-anchor>
                @endcan
                @endauth
            </div>
        </div>
    </x-flex>
</x-layout>