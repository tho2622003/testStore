<x-layout>
    <x-flex>
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <x-form action="/create" method="POST">
                @csrf
                <x-heading>Add a New Release</x-heading> 
                <x-field type="text" attribute="title">Title</x-field>
                <x-field type="text" attribute="artist">Artist</x-field>
                <x-field type="date" attribute="date">Date of release</x-field>
                <div class="block">
                    <label class="text-sm font-medium mr-4" for="genre">Choose a genre</label>
                    <select class="p-2 pr-10 text-black text-sm font-medium rounded-md mt-4" name="genre" id="genre">
                        <option value="Pop">Pop</option>
                        <option value="Hip Hop">Hip Hop</option>
                        <option value="Rock">Rock</option>
                        <option value="Metal">Metal</option>
                        <option value="Electronics">Electronics</option>
                    </select>
                </div>
                <div class="block mb-5">
                    <label class="text-sm font-medium mr-4" for="format">Choose a format</label>
                    <select class="p-2 pr-10 text-black text-sm font-medium rounded-md mt-4" name="format" id="format">
                        <option value="CD">CD</option>
                        <option value="Vinyl">Vinyl</option>
                        <option value="Casette">Casette</option>
                        <option value="Digital download">Digital download</option>
                    </select>
                </div>
                <x-button>Add</x-button>
            </x-form>
        </div>
    </x-flex>
</x-layout>