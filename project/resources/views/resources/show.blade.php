@extends('app')

@section('title')
  {{ $resource->name }}
@endsection

@section('content')
  <section class="flex -mx-4 items-start flex-col lg:flex-row">
    <div class="bg-white rounded shadow mx-4 lg:w-3/4">
      @livewire('resources.tasks', $resource->id)
    </div>
    <div class="bg-white rounded shadow my-4 mx-4 lg:my-0 ">
      @livewire('filters.resources.tasks', $resource->id)
    </div>
    @livewire('modals.tasks.edit')
    @livewire('modals.tasks.delete')
  </section>
@endsection

@section('note')
  <div>
    {!! $resource->note !!}
  </div>
@endsection
