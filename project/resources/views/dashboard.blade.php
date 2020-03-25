@extends('app')

@section('head')
  <script>document.getElementsByTagName("html")[0].className += " js"</script>
@endsection

@section('title')
  Dashboard
@endsection

@section('subtitle')
  Welcome to Westeros :)
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4">

    @livewire('tasks.month', 'Tickets du mois')
    @livewire('tasks.day', Date::date($date))
    @livewire('tasks.week', Date::date($date) . " | " . Date::date($next))

  </section>

  <div class="h-8"></div>

  <section class="flex -mx-4">

    @livewire('tasks.year')

    @livewire('projects.year')

    @livewire('clients.satisfaction', 'Clients satisfaits')

    @livewire('projects.innovations', 'Innovations')

  </section>

  <div class="h-8"></div>

  @livewire('tasks.recent', 'Tickets récents')

@endsection

@section('scripts')
  <script src="{{ asset('vendor/codyhouse-schedule/js/util.js') }}"></script>
  <script src="{{ asset('vendor/codyhouse-schedule/js/main.js') }}"></script>
@endsection

