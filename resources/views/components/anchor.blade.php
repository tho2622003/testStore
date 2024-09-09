@props(["href"=>"/"])

<div class="flex items-center justify-center mt-8">
    <a href="{{$href}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
        {{$slot}}
    </a>
</div>