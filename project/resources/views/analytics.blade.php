@extends('app')

@section('head')
@endsection

@section('title')
  Analytics
@endsection

@section('subtitle')
  Des chiffres et des chiffres
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')

  <section class="flex -mx-4">
    @livewire('tasks.day', Date::date($date))
    @livewire('tasks.week', Date::date($date) . " | " . Date::date($next))
    @livewire('tasks.month')
  </section>

  <div class="h-8"></div>

  <section class="flex -mx-4 items-start flex-col lg:flex-row">
    <div class="bg-white  shadow mx-4 lg:w-3/4">
      @livewire('tasks.table')
    </div>
    <div class="bg-white  shadow my-4 mx-4 lg:my-0 ">
      @livewire('filters.tasks')
    </div>
    @livewire('modals.tasks.edit')
    @livewire('modals.tasks.delete')
  </section>

@endsection

