<nav class="fixed top-0 left-0 bg-blue-800 p-5 flex flex-col space-y-4 justify-between w-56 h-full">
    <div class="flex flex-col">
        @guest
        <a href="/" class="text-2xl font-bold block">Musique Store</a>
        @endguest
        @auth
        @if (Auth::user()->is_admin)
        <a href="{{ route('admin.index') }}" class="text-2xl font-bold block">Admin View</a>
        <span>Welcome, {{Auth::user()->name}}</span>
        <span class="font-bold text-sm">{{'@'.Auth::user()->username}}</span>
        @else
        <a href="/" class="text-2xl font-bold block">Musique Store</a>
        <span>Welcome, {{Auth::user()->name}}</span>
        <span class="font-bold text-sm">{{'@'.Auth::user()->username}}</span>
        @endif
        @endauth
    </div>
    <div>
        <form action="/search" method="GET">
            <div class="flex items-center">
                <input
                    type="text"
                    name="query"
                    placeholder="Search..."
                    value="{{ request('query') }}"
                    class="px-3 py-2 mr-3 w-[70%] h-10 rounded text-black border border-gray-300 focus:outline-none focus:border-blue-500">
                <x-button type="submit" class="h-10 px-3 rounded bg-blue-500 hover:bg-blue-600 text-white flex items-center justify-center">
                    <i class="q-icon material-icons" aria-hidden="true">search</i>
                </x-button>
            </div>
        </form>
    </div>
    @auth
    @if (Auth::user()->is_admin)
    @php
    $currentView = session('admin_view', 'products');
    $buttonText = $currentView == 'products' ? 'SWITCH TO USERS TABLE' : 'SWITCH TO PRODUCTS TABLE';
    @endphp
    <x-form action="{{ route('switch') }}" method="POST">
        <x-button>{{ $buttonText }}</x-button>
    </x-form>
    @endif
    @endauth
    <div id="app">
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <a href="{{ route('products.by_year') }}" class="block">By Year</a>
                <custom-filter filter-type="year"></custom-filter>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('products.by_genre') }}" class="block">By Genre</a>
                <custom-filter filter-type="genre" :valid-options='@json($validGenres)'></custom-filter>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('products.by_format') }}" class="block">By Format</a>
                <custom-filter filter-type="format" :valid-options='@json($validFormats)'></custom-filter>
            </div>
        </div>
    </div>
    @guest
    <div class="space-y-2">
        <a href="/login" class="block">Sign In</a>
        <a href="/register" class="block">Sign Up</a>
    </div>
    @endguest
    @auth
    <div class="space-y-2">
        @if (Auth::user()->is_admin)
            <a href="{{ route('admin.user.create') }}" class="block">Add New User</a>
        @endif
        <a href="{{ route('product.create') }}" class="block">Add New Release</a>
        <form action="{{route('logout')}}" method="POST" class="block">
            @csrf
            @method('DELETE')
            <button type="submit" class="block">Sign Out</button>
        </form>
    </div>
    @endauth
    <span>Copyright 2024</span>
</nav>