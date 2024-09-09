<nav class="fixed top-0 bg-blue-800 p-5 flex flex-col space-y-4 justify-between w-52 h-full">
    <div>
        <a href="/" class="text-xl font-bold block">Musique Store</a>
        @auth
        <span>Welcome, {{Auth::user()->name}}</span>
        @endauth
    </div>
    <div>
        <form action="/search" method="GET" class="flex flex-col space-y-2">
            <input type="text" name="query" placeholder="Search..." value="{{ request('query') }}" class="p-2 rounded text-black">
            <button type="submit" class="bg-blue-600 text-white p-2 rounded">Search</button>
        </form>
    </div>
    <div class="space-y-2">
        <a href="" class="block">By Year</a>
        <a href="" class="block">By Genre</a>
        <a href="" class="block">By Format</a>
    </div>
    @guest
    <div class="space-y-2">
        <a href="/login" class="block">Sign In</a>
        <a href="/register" class="block">Sign Up</a>
    </div>
    @endguest
    @auth
    <div class="space-y-2">
        <a href="/create" class="block">Add New Release</a>
        <form action="{{route('logout')}}" method="POST" class="block">
            @csrf
            @method('DELETE')
            <button type="submit" class="block">Sign Out</button>
        </form>
    </div>
    @endauth
    <span>Copyright 2024</span>
</nav>