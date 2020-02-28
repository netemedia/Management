@extends('app')

@section('title')
  {{ $project->name }}
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.tasks', $project->id)
      @livewire('tasks.add', $project->id)
    </div>
    @livewire('tasks.table', $project->id)
    @livewire('modals.tasks.edit', $project->id)
    @livewire('modals.tasks.delete', $project->id)
  </section>
@endsection

@section('note')
  <div>
    {!! $project->note !!}
  </div>
@endsection
