@props([
    "attribute",
    "value" => '',
    "type" => "text"
])

<div class="mb-4">
    <label for="{{ $attribute }}" class="block text-sm font-medium mb-2">{{ $slot }}</label>
    <input 
        type="{{ $type }}"
        value="{{ old($attribute, $value) }}"
        id="{{ $attribute }}"
        name="{{ $attribute }}"
        class="w-full px-3 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 
            @error($attribute) border-red-500 @enderror"
    >
    @error($attribute)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>