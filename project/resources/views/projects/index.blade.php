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
  <section class="flex -mx-4 items-start flex-col lg:flex-row">
    <div class="bg-white  shadow mx-4 lg:w-3/4">
      @livewire('projects.table')
    </div>
    <div class="bg-white  shadow my-4 mx-4 lg:my-0 ">
      @livewire('filters.projects')
      @livewire('projects.add')
    </div>
    @livewire('modals.projects.edit')
    @livewire('modals.projects.delete')
    @livewire('modals.projects.add-task')
  </section>
@endsection
