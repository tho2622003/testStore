<x-layout>
    <x-heading>Admin Dashboard</x-heading>
    @php
    $currentView = session('admin_view', 'products');
    $spanText = $currentView === 'products' ? 'Products table' : 'Users table';
    @endphp
    <h5 class="text-center my-2">{{ $spanText }}</h5>
    @if ($currentView === "products")
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
                <td class="px-3 py-1 border-r border-gray-700 text-md truncate max-w-96">{{ $product->title }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">{{ $product->artist }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">{{ $product->date }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">{{ $product->genre }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">{{ $product->format }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md space-x-2 flex flex-row">
                    <x-anchor href=" {{ route('product.show', $product) }} ">Show</x-anchor>
                    <x-anchor href=" {{ route('admin.product.edit', $product) }} ">Edit</x-anchor>
                    <form method="POST" action="{{ route('admin.product.destroy', $product) }}" class="delete_form">
                        @csrf
                        @method('DELETE')
                        <x-button >Delete</x-button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <table>
        <thead>
            <tr>
                <th class="text-xl font-bold">Name</th>
                <th class="text-xl font-bold">Username</th>
                <th class="text-xl font-bold">Email</th>
                <th class="text-xl font-bold">Admin?</th>
                <th class="text-xl font-bold">Created At</th>
                <th class="text-xl font-bold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $user)
            <tr>
                <td class="px-3 py-1 border-r border-gray-700 text-md truncate max-w-96">{{ $user->name }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">{{ $user->username }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">{{ $user->email }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">
                    @php
                    echo $user->is_admin ? "Yes" : "No";
                    @endphp
                </td>
                <td class="px-3 py-1 border-r border-gray-700 text-md">{{ $user->created_at }}</td>
                <td class="px-3 py-1 border-r border-gray-700 text-md space-x-2 flex flex-row">
                    <x-anchor href="{{ route('admin.user.edit', $user) }}">Edit</x-anchor>
                    <form method="POST" class="delete_form" action="{{ route('admin.user.destroy', $user) }}">
                        @csrf
                        @method('DELETE')
                        <x-button>Delete</x-button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</x-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('.delete_form');
    
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (confirm('Are you sure you want to delete this entry?')) {
                this.submit();
            }
        });
    });
});
</script>