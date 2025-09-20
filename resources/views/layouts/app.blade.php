<!DOCTYPE html>
<html lang="en" class="{{ session('theme','light') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','KolabDok')</title>
    @vite('resources/css/app.css')
</head>
<body class="flex bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 h-screen">
    @auth
        @include('partials.sidebar')
        <div class="flex-1 flex flex-col">
            @include('partials.topbar')
            <main class="p-4 overflow-auto flex-1">
                @yield('content')
            </main>
        </div>
    @else
        <main class="p-4">
            @yield('content')
        </main>
    @endauth
</body>
</html>
