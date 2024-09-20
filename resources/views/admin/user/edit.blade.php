<x-layout>
    <x-flex>
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <x-form action="{{ route('admin.user.update', $user) }}" method="POST"> 
                @csrf
                @method('PATCH')
                <x-heading>Edit this User: {{$user->name}}</x-heading>
                <x-field type="text" value="{{$user->name}}" attribute="name">Name</x-field>
                <x-field type="text" value="{{$user->username}}" attribute="username">Username</x-field>
                <x-field type="datetime-local" value="{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d h:m:s') }}" attribute="created_at">Created Date</x-field>

                <div class="block mb-5">
                    <label class="text-sm font-medium mr-4" for="is_admin">Is an admin?</label>
                    <select class="p-2 pr-10 text-black text-sm font-medium rounded-md mt-4" name="is_admin" id="is_admin">
                        <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
                <x-button>Update</x-button>
            </x-form>
        </div>
    </x-flex>
</x-layout>