<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0"
    >
    <title>@yield('title') - Westeros</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link
        rel="stylesheet"
        href="{{ asset('vendor/codyhouse-schedule/css/style.css') }}"
    >
    <link
        rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    >
    @livewireStyles

    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    @yield('head')
</head>
<body class="mx-auto bg-gray-200">

<header class="bg-white h-12 shadow-md overflow-hidden fixed w-full flex justify-between">
    <div class="h-12 text-bold py-2 px-8">
        <div>
            Westeros
        </div>
    </div>

    <div class="py-2 px-8 flex">
        <div class="mr-2">
            {{ Auth::user()->name }}
        </div>

        <a class="no-underline text-gray-500 font-light" href="{{ route
        ('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Déconnexion') }}
        </a>

        <form class="hidden" id="logout-form" action="{{ route('logout') }}"
              method="POST">
            @csrf
        </form>
    </div>

</header>

<div class="flex pt-12">
    <aside class="min-h-screen bg-gray-700 text-gray-600 hidden xl:block">
        {{ $menu }}
    </aside>
    <main class="p-8 flex-1">
        <header>
            <h1 class="text-lg">@yield('title', 'Page Title')</h1>
            <div class="h-1"></div>
            <div class="pl-1 flex justify-between flex-col md:flex-row">
                <div class="text-sm text-gray-600">@yield('subtitle')</div>
                <div class="text-sm text-gray-600">
                    @yield('breadcrumb')
                </div>
            </div>
        </header>

        <div class="h-8"></div>

        @if (session('success'))
            <div class="p-4 bg-green-100 text-green-700">
                {{ session('success') }}
            </div>

            <div class="h-8"></div>
        @endif

        <div>
            @yield('content')
        </div>
    </main>
</div>

@livewireScripts
<script src="https://unpkg.com/jam-icons/js/jam.min.js"></script>

@yield('scripts')
</body>
</html>
