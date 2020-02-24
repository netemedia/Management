@extends('app')

@section('head')
@endsection

@section('title')
  Agenda
@endsection

@section('subtitle')
  Comment on s'organise
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

  <section class="flex -mx-4 items-start">
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.tasks')
    </div>
    @livewire('tasks.table')
    @livewire('modals.tasks.edit')
    @livewire('modals.tasks.delete')
  </section>

@endsection

