<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>@yield('title') - Coruscant</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/codyhouse-schedule/css/style.css') }}">
  @yield('head')
</head>
<body class="mx-auto bg-gray-200">

<header class="bg-white h-12 shadow-md overflow-hidden fixed w-full">
  <div class="h-12 w-64 bg-gray-800 text-white text-bold py-2 px-8">
    <span>
      Coruscant
    </span>
  </div>
</header>

<div class="flex pt-12">
  <aside class="min-h-screen w-64 bg-gray-700 text-gray-600">
    {{ $menu }}
  </aside>
  <main class="p-8 flex-1">
    <header>
      <h1 class="text-lg">@yield('title', 'Page Title')</h1>
      <div class="h-1"></div>
      <div class="pl-1 flex justify-between">
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

<script src="https://unpkg.com/jam-icons/js/jam.min.js"></script>
@yield('scripts')
</body>
</html>