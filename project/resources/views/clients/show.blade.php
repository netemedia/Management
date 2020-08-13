@extends('app')

@section('title')
  {{ $client->name }}
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start flex-col lg:flex-row">
    <div class="bg-white  shadow mx-4 lg:w-3/4">
      @livewire('projects.table', $client->id)
    </div>
    <div class="bg-white  shadow my-4 mx-4 lg:my-0 ">
      @livewire('filters.projects', $client->id)
      @livewire('projects.add', $client->id)
    </div>
    @livewire('modals.projects.edit', $client->id)
    @livewire('modals.projects.delete', $client->id)
    @livewire('modals.projects.add-task')
  </section>
@endsection

@section('note')
  <div>
    {!! $client->note !!}
  </div>
@endsection
