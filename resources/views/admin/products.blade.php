<x-layout>
    <x-heading>Admin Dashboard</x-heading>
    @php
    $currentView = session('admin_view', 'products');
    $spanText = $currentView === 'products' ? 'Products table' : 'Users table';
    @endphp
    <h5 class="text-center my-2">{{ $spanText }}</h5>
    <table>
        <thead>
            <tr>
                <th class="text-xl font-bold">Title</th>
                <th class="text-xl font-bold">Artist</th>
                <th class="text-xl font-bold">Date</th>
                <th class="text-xl font-bold">Genre</th>
                <th class="text-xl font-bold">Format</th>
                <th class="text-xl font-bold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $product)
            <tr>
                <td class="px-2 py-1 text-lg truncate max-w-96">{{ $product->title }}</td>
                <td class="px-2 py-1 text-lg">{{ $product->artist }}</td>
                <td class="px-2 py-1 text-lg">{{ $product->date }}</td>
                <td class="px-2 py-1 text-lg">{{ $product->genre }}</td>
                <td class="px-2 py-1 text-lg">{{ $product->format }}</td>
                <td class="px-2 py-1 text-lg flex flex-row">
                    <a class="mr-4" href="{{ route('admin.edit', $product) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>