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
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.tasks')
    </div>
    @livewire('tasks.table')
    @livewire('modals.tasks.edit')
    @livewire('modals.tasks.delete')
  </section>
@endsection
