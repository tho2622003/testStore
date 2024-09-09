@props(["product"])

<div class="bg-gray-700 w-[185px] h-[300px] flex flex-col items-center justify-center rounded-xl shadow-lg">
    <div class="flex flex-col items-center space-y-2">
        <img src="https://picsum.photos/seed/{{rand(1, 1000)}}/150" class="mb-1 rounded-xl">
        <div class="flex flex-col items-center">
            <a class="font-bold line-clamp-1" href="/{{$product->id}}">{{$product->title}}</a>
            <a class="text-sm" href="">{{$product->artist}}</a>
        </div>
        <div class="flex flex-col items-center text-xs">
            <span>Date: {{$product->date}}</span>
            <span>Genre: {{$product->genre}}</span>
            <span>Format: {{$product->format}}</span>
            <span>ID: {{$product->id}}</span>
        </div>
    </div>
</div>