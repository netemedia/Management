@extends('app')

@section('title')
  Tickets
@endsection

@section('subtitle')
  Les trucs que l'équipe doit faire
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    @livewire('tasks.table')
    @livewire('modals.tasks.edit')
    @livewire('modals.tasks.delete')
  </section>
@endsection
