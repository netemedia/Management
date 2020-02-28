<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>@yield('title') - Westeros</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/codyhouse-schedule/css/style.css') }}">
  <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  @livewireStyles
  @yield('head')
</head>
<body class="mx-auto bg-gray-200">

<header class="bg-white h-12 shadow-md overflow-hidden fixed w-full">
  <div class="h-12 w-64 bg-gray-800 text-white text-bold py-2 px-8">
    <span>
      Westeros
    </span>
  </div>
</header>

<div class="flex pt-12">
  <aside class="min-h-screen w-64 bg-gray-700 text-gray-600 hidden xl:block">
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