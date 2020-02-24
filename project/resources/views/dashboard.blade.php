@extends('app')

@section('head')
  <script>document.getElementsByTagName("html")[0].className += " js"</script>
@endsection

@section('title')
  Dashboard
@endsection

@section('subtitle')
  Welcome to Coruscant :)
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4">

    @livewire('tasks.month', 'Tickets du mois')

    <div class="w-1/4 bg-white rounded shadow mx-4 overflow-hidden">
      <div class="h-4"></div>

      <div class="px-4">
        <div>
          <p class="text-base font-semibold text-gray-800">
            Tickets terminés
          </p>
        </div>
        <div class="flex justify-end">
          <p class="text-gray-700">
          <span class="text-lg">
            35
          </span>
          </p>
        </div>
      </div>

      <div class="h-4"></div>

      <div>
        <div class="w-full bg-gray-300 h-1 overflow-hidden">
          <div class="bg-gradient-blues h-full" style="width: 12%;"></div>
        </div>
      </div>
      <div class="bg-gradient-blues px-4 py-2">
        <p class="text-sm text-gray-100">Total: 48</p>
      </div>

    </div>

    <div class="w-1/4 bg-white rounded shadow mx-4 overflow-hidden">
      <div class="h-4"></div>

      <div class="px-4">
        <div>
          <p class="text-base font-semibold text-gray-800">
            Tickets terminés
          </p>
        </div>
        <div class="flex justify-end">
          <p class="text-gray-700">
          <span class="text-lg">
            35
          </span>
          </p>
        </div>
      </div>

      <div class="h-4"></div>

      <div>
        <div class="w-full bg-gray-300 h-1 overflow-hidden">
          <div class="bg-gradient-reds h-full" style="width: 43%;"></div>
        </div>
      </div>
      <div class="bg-gradient-reds px-4 py-2">
        <p class="text-sm text-gray-100">Total: 48</p>
      </div>

    </div>

    <div class="w-1/4 bg-white rounded shadow mx-4 px-4">
      <div class="h-4"></div>

      <div>
        <p class="text-base font-semibold text-gray-800">
          Tickets terminés
        </p>
      </div>
      <div class="flex justify-end">
        <p class="text-gray-700">
          <span class="text-lg">
            35
          </span>
          <small class="text-xs text-gray-600">/ 48</small>
        </p>
      </div>

      <div class="h-4"></div>

      <div>
        <div class="w-full rounded-sm bg-gray-300 h-2 overflow-hidden">
          <div class="bg-orange-400 h-full" style="width: 73%;"></div>
        </div>
      </div>

      <div class="h-4"></div>
    </div>
  </section>

  <div class="h-8"></div>

  <section class="flex -mx-4">

    @livewire('tasks.year')

    @livewire('projects.year')

    @livewire('clients.satisfaction', 'Clients satisfaits')

    <div class="w-1/4 bg-white rounded shadow mx-4 px-4">
      <div class="h-4"></div>

      <div class="flex align-center">

        <div class="w-20 flex items-center justify-center mr-2">
          <span data-jam="battery-charging" data-width="48" data-height="48"
                class="text-orange-500 fill-current"></span>
        </div>

        <div>
          <p class="text-base text-gray-600">
            Innovations
          </p>
          <p class="text-gray-800">
          <span class="text-lg">
            13
          </span>
          </p>
        </div>

      </div>

      <div class="h-4"></div>
    </div>

  </section>

  <div class="h-8"></div>

  @livewire('tasks.recent', 'Tickets récents')

@endsection

@section('scripts')
  <script src="{{ asset('vendor/codyhouse-schedule/js/util.js') }}"></script>
  <script src="{{ asset('vendor/codyhouse-schedule/js/main.js') }}"></script>
@endsection

