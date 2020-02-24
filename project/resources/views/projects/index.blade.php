@extends('app')

@section('title')
  Projets
@endsection

@section('subtitle')
  Bah... là, c'est les projets quoi
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.projects')
      @livewire('projects.add')
    </div>
    @livewire('projects.table')
    @livewire('modals.projects.edit')
    @livewire('modals.projects.delete')
    @livewire('modals.projects.add-task')
  </section>
@endsection
