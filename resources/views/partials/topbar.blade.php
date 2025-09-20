<header class="flex justify-between items-center p-4 bg-white shadow ml-64">
    <h1 class="text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
    <form method="POST" action="{{ route('theme.toggle') }}">
        @csrf
        <button type="submit" class="px-3 py-1 bg-gray-200 rounded-lg text-gray-700">
            {{ session('theme','light') === 'dark' ? 'Light' : 'Dark' }}
        </button>
    </form>
</header>
