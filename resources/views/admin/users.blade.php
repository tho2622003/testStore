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
                <td class="px-2 py-1 text-lg truncate max-w-96">{{ $user->name }}</td>
                <td class="px-2 py-1 text-lg">{{ $user->username }}</td>
                <td class="px-2 py-1 text-lg">{{ $user->email }}</td>
                <td class="px-2 py-1 text-lg">
                    @php
                    echo $user->is_admin ? "Yes" : "No";
                    @endphp
                </td>
                <td class="px-2 py-1 text-lg">{{ $user->created_at }}</td>
                <td class="px-2 py-1 text-lg flex flex-row">
                    <a class="mr-4" href="{{ route('admin.edit', $user) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.destroy', $user) }}">
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