<x-layout>
    <x-flex>
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <x-form action="/login" method="POST">
                <x-heading>Log In</x-heading>
                <x-field type="text" attribute="username">Username</x-field>
                <x-field type="password" attribute="password">Password</x-field>
                <x-button>Log In</x-button>
            </x-form>
        </div>
    </x-flex>
</x-layout>