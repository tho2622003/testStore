<x-layout>
    <x-flex>
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <x-form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <x-heading>Add a new User</x-heading>
                <x-field type="text" attribute="name">Full name</x-field>
                <x-field type="text" attribute="username">Username</x-field>
                <x-field type="text" attribute="email">E-mail</x-field>
                <x-field type="text" attribute="password">Password</x-field>
                <div class="block mb-5">
                    <label class="text-sm font-medium mr-4" for="is_admin">Is an admin?</label>
                    <select class="p-2 pr-10 text-black text-sm font-medium rounded-md mt-4" name="is_admin" id="is_admin">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <x-button>Create</x-button>
            </x-form>
        </div>
    </x-flex>
</x-layout>