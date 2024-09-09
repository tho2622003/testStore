<x-layout>
    <x-flex>
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form action="/register" display="none" method="POST">
                @csrf
                <x-heading>Sign Up</x-heading>
                <x-field type="text" attribute="name">Full name</x-field>
                <x-field type="text" attribute="username">Username</x-field>
                <x-field type="email" attribute="email">Email</x-field>
                <x-field type="password" attribute="password">Password</x-field>
                <x-field type="password" attribute="password_confirmation">Reconfirm password</x-field>
                <x-button>Sign Up</x-button>
            </form>
        </div>
    </x-flex>
</x-layout>