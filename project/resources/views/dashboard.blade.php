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
          <div class="bg-gradient-greens h-full" style="width: 73%;"></div>
        </div>
      </div>
      <div class="bg-gradient-greens px-4 py-2">
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
    <div class="w-1/4 bg-white rounded shadow mx-4 px-4">
      <div class="h-4"></div>

      <div class="flex align-center">

        <div class="w-20 flex items-center justify-center mr-2">
          <span data-jam="book" data-width="48" data-height="48" class="text-teal-500 fill-current"></span>
        </div>

        <div>
          <p class="text-base text-gray-600">
            Total tickets traités
          </p>
          <p class="text-gray-800">
          <span class="text-lg">
            578
          </span>
          </p>
        </div>

      </div>

      <div class="h-4"></div>
    </div>

    <div class="w-1/4 bg-white rounded shadow mx-4 px-4">
      <div class="h-4"></div>

      <div class="flex align-center">

        <div class="w-20 flex items-center justify-center mr-2">
          <span data-jam="feather" data-width="48" data-height="48" class="text-green-500 fill-current"></span>
        </div>

        <div>
          <p class="text-base text-gray-600">
            Projets terminés
          </p>
          <p class="text-gray-800">
          <span class="text-lg">
            205
          </span>
          </p>
        </div>

      </div>

      <div class="h-4"></div>
    </div>

    <div class="w-1/4 bg-white rounded shadow mx-4 px-4">
      <div class="h-4"></div>

      <div class="flex align-center">

        <div class="w-20 flex items-center justify-center mr-2">
          <span data-jam="users" data-width="48" data-height="48" class="text-red-500 fill-current"></span>
        </div>

        <div>
          <p class="text-base text-gray-600">
            Clients satisfaits
          </p>
          <p class="text-gray-800">
          <span class="text-lg">
            25
          </span>
          </p>
        </div>

      </div>

      <div class="h-4"></div>
    </div>

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

  @comp('App\Http\View\Components\LastTickets')

@endsection

{{--
@section('content')
  @include('components.dashboard.forms.main')
  @if($resource)
    @include('components.schedule')
  @else
    <div class="bg-blue-100 border border-blue-400 p-4 my-4">
      <p>Vous ne semblez pas encore avoir de ressources,
        <a class="text-blue-500" href="{{ route('resources.create') }}">
          Ajoutez-en une !
        </a>
      </p>
    </div>
  @endif
@endsection
--}}

@section('scripts')
  <script src="{{ asset('vendor/codyhouse-schedule/js/util.js') }}"></script>
  <script src="{{ asset('vendor/codyhouse-schedule/js/main.js') }}"></script>
@endsection

