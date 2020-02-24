@extends('app')

@section('title')
  {{ $project->name }}
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
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
