@extends('app')

@section('title')
  {{ $client->name }}
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.projects', $client->id)
      @livewire('projects.add', $client->id)
    </div>
    @livewire('projects.table', $client->id)
    @livewire('modals.projects.edit', $client->id)
    @livewire('modals.projects.delete', $client->id)
    @livewire('modals.projects.add-task', $client->id)
  </section>
@endsection

@section('note')
  <div>
    {!! $client->note !!}
  </div>
@endsection
