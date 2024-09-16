<x-layout>
    <x-flex>
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <x-form action="/{{ $product->id }}/edit" method="POST"> 
                @csrf
                @method('PATCH')
                <x-heading>Edit this Release: {{$product->title}}</x-heading>
                <x-field type="text" value="{{$product->title}}" attribute="title">Title</x-field>
                <x-field type="text" value="{{$product->artist}}" attribute="artist">Artist</x-field>
                <x-field type="date" value="{{ \Carbon\Carbon::parse($product->date)->format('Y-m-d') }}" attribute="date">Date of release</x-field>
                <div class="block">
                    <label class="text-sm font-medium mr-4" for="genre">Choose a genre</label>
                    <select class="p-2 pr-10 text-black text-sm font-medium rounded-md mt-4" name="genre" id="genre">
                        <option value="Pop" {{ $product->genre == 'Pop' ? 'selected' : '' }}>Pop</option>
                        <option value="Hip Hop" {{ $product->genre == 'Hip Hop' ? 'selected' : '' }}>Hip Hop</option>
                        <option value="Rock" {{ $product->genre == 'Rock' ? 'selected' : '' }}>Rock</option>
                        <option value="Metal" {{ $product->genre == 'Metal' ? 'selected' : '' }}>Metal</option>
                        <option value="Electronics" {{ $product->genre == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                    </select>
                </div>
                <div class="block mb-5">
                    <label class="text-sm font-medium mr-4" for="format">Choose a format</label>
                    <select class="p-2 pr-10 text-black text-sm font-medium rounded-md mt-4" name="format" id="format">
                        <option value="CD" {{ $product->format == 'CD' ? 'selected' : '' }}>CD</option>
                        <option value="Vinyl" {{ $product->format == 'Vinyl' ? 'selected' : '' }}>Vinyl</option>
                        <option value="Casette" {{ $product->format == 'Casette' ? 'selected' : '' }}>Casette</option>
                        <option value="Digital download" {{ $product->format == 'Digital download' ? 'selected' : '' }}>Digital download</option>
                    </select>
                </div>
                <x-button>Update</x-button>
            </x-form>
        </div>
    </x-flex>
</x-layout>