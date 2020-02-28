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
  <section class="flex -mx-4 items-start flex-col lg:flex-row">
    <div class="bg-white rounded shadow mx-4 lg:w-3/4">
      @livewire('tasks.table')
    </div>
    <div class="bg-white rounded shadow my-4 mx-4 lg:my-0 ">
      @livewire('filters.tasks')
    </div>
    @livewire('modals.tasks.edit')
    @livewire('modals.tasks.delete')
  </section>
@endsection
