<x-layout>
    <x-flex>
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <span class="block">Title: {{$product->title}}</span>
            <span class="block">Artist: {{$product->artist}}</span>
            <span class="block">Date of Release: {{$product->date}}</span>
            <span class="block">Genre: {{$product->genre}}</span>
            <span class="block">Format: {{$product->format}}</span>
            @auth
            <x-anchor href="/{{$product->id}}/edit">Edit</x-anchor>
            @endauth
        </div>
    </x-flex>
</x-layout>